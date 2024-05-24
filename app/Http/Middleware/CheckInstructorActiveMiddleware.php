<?php

namespace App\Http\Middleware;

use App\Services\Notify;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckInstructorActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ins = auth()->user();
        //kiểm tra xem status là 1 hay không
        if ($ins->status != 1) {
            abort(403, 'Unauthorized action.');
        }

        //kiểm tra xem đã cập nhật thông tin chưa
        if (!$ins->sort_desc || !$ins->phone || !$ins->address || !$ins->province_id || !$ins->district_id || !$ins->ward_id || !$ins->bio || !$ins->photo) {
            Notify::warning('Vui lòng cập nhật đầy đủ thông tin !');
            return redirect()->route('instructor.profile');
        }
        return $next($request);
    }
}