<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Notify;
use Illuminate\Http\Request;
use App\Models\SmtpSetting;

class SettingController extends Controller
{
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
}