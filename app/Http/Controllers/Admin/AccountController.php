<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    use FileUploadTrait;
    private Province $province;
    private District $district;
    private Ward $ward;

    public function __construct(Province $province, District $district, Ward $ward)
    {
        $this->province = $province;
        $this->district = $district;
        $this->ward = $ward;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->has('role')) {
            $accounts = User::where('role', request('role'))->orderBy('id', 'desc')->get();
        } else {
            $accounts = User::orderBy('id', 'desc')->get();
        }
        return view('admin.accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = $this->province->getAll();
        return view('admin.accounts.create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'unique:users,username',
            'password' => 'required|confirmed',
        ]);

        $user = new User();

        $imagePath = $this->uploadImage($request, 'photo', null, 'avatar');

        if ($imagePath) {
            $user->photo = $imagePath;
        }

        $user->name = $request->name;

        if (!$request->username) {
            $user->username = explode('@', $request->email)[0];
        } else {
            $user->username = $request->username;
        }

        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->province_id = $request->province;
        $user->district_id = $request->district;
        $user->ward_id = $request->ward;
        $user->password = Hash::make($request->password);
        $user->bio = $request->bio;
        $user->role = $request->role;

        $user->save();

        Notify::success('Thêm tài khoản thành công!');
        return redirect()->route('admin.accounts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('admin.accounts.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $account = User::findOrFail($id);
        $provinces = $this->province->getAll();
        $districts = $this->district->getByProvince($account->province_id);
        $wards = $this->ward->getByDistrict($account->district_id);

        return view('admin.accounts.edit', compact('provinces', 'districts', 'wards', 'account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'username' => 'unique:users,username,' . $id,
        ]);

        $user = User::findOrFail($id);

        $imagePath = $this->uploadImage($request, 'photo', $user->photo, 'avatar');

        if ($imagePath) {
            $user->photo = $imagePath;
        }

        $user->name = $request->name;

        if (!$request->username) {
            $user->username = explode('@', $request->email)[0];
        } else {
            $user->username = $request->username;
        }

        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->province_id = $request->province;
        $user->district_id = $request->district;
        $user->ward_id = $request->ward;
        $user->bio = $request->bio;
        $user->role = $request->role;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        Notify::success('Cập nhật tài khoản thành công!');
        return redirect()->route('admin.accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);

            if ($user->role === 'admin') {
                Notify::error('Không thể xóa tài khoản admin!');
                return response()->json([
                    'status' => 'error'
                ]);
            }

            if ($user->orders->count() > 0) {
                Notify::error('Tài khoản đã có đơn hàng. Bạn không thể xóa!');
                return response()->json([
                    'status' => 'error'
                ]);
            }

            $user->delete();

            Notify::success('Xóa tài khoản thành công!');
            return response()->json([
                'status' => 'success'
            ]);
        } catch (\Exception $e) {
            Notify::error('Xóa tài khoản thất bại!');
            return response()->json([
                'status' => 'error'
            ]);
        }
    }

    public function changeStatus(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->status = $request->status;
        $user->save();

        Notify::success('Thay đổi trạng thái tài khoản thành công!');
        return response()->json([
            'status' => 'success'
        ]);
    }
}