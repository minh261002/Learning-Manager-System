<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use App\Models\SmtpSetting;
use App\Models\SiteSetting;

class SettingController extends Controller
{
    use FileUploadTrait;
    public function smtp()
    {
        $smtpSetting = SmtpSetting::first();
        return view('admin.settings.smtp', compact('smtpSetting'));
    }

    public function updateSmtp(Request $request)
    {
        $request->validate([
            'mailer' => 'required',
            'host' => 'required',
            'port' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $smtpSetting = SmtpSetting::first();
        $smtpSetting->update($request->all());

        Notify::success('Cập nhật cài đặt SMTP thành công');
        return redirect()->back();
    }

    public function siteSetting()
    {
        $settings = SiteSetting::first();
        return view('admin.settings.site', compact('settings'));
    }

    public function updateSiteSetting(Request $request)
    {
        $siteSetting = SiteSetting::first();

        $logo = $this->uploadImage($request, 'logo', $siteSetting->logo, 'avatar');

        if ($logo) {
            $siteSetting->logo = $logo;
        }

        $favicon = $this->uploadImage($request, 'favicon', $siteSetting->favicon, 'avatar');

        if ($favicon) {
            $siteSetting->favicon = $favicon;
        }

        $siteSetting->email = $request->email;
        $siteSetting->phone = $request->phone;
        $siteSetting->address = $request->address;

        $siteSetting->logo = $logo ?? $siteSetting->logo;
        $siteSetting->favicon = $favicon ?? $siteSetting->favicon;

        $siteSetting->facebook = $request->facebook;
        $siteSetting->behance = $request->behance;
        $siteSetting->github = $request->github;
        $siteSetting->linkedin = $request->linkedin;

        $siteSetting->save();

        Notify::success('Cập nhật cài đặt trang web thành công');
        return redirect()->back();
    }
}