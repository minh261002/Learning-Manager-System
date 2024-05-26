<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
    function getNotification()
    {
        $user = Auth::user();
        $notifications = $user->unreadNotifications;

        $user->unreadNotifications->markAsRead();

        if ($notifications->isEmpty()) {
            usleep(5000000); // 5 giây
        }

        return response()->json([
            'notifications' => $notifications
        ]);
    }
}
