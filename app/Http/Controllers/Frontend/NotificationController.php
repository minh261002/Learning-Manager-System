<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{

    function getNotification(): JsonResponse
    {
        // Đảm bảo người dùng đã đăng nhập
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Lấy thông báo chưa đọc của người dùng và sắp xếp theo thời gian tạo
        $latestNotification = $user->unreadNotifications()->latest()->first();

        // Đảm bảo chỉ trả về thông báo mới nhất và đánh dấu đã đọc
        if ($latestNotification) {
            $latestNotification->markAsRead();
            // Trả về thông báo mới nhất dưới dạng JSON
            return response()->json([
                'notifications' => $latestNotification
            ]);
        }

        // Trả về JSON rỗng nếu không có thông báo mới
        return response()->json([]);
    }

}