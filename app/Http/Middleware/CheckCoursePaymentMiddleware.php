<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Order;

class CheckCoursePaymentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $slug = $request->segment(3);

        if ($this->hasPaidForCourse($user->id, $slug)) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }

    private function hasPaidForCourse($userId, $slug)
    {
        $order = Order::where('user_id', $userId)
            ->whereHas('course', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->whereHas('payment', function ($query) {
                $query->where('status', 'success');
            })
            ->first();

        if ($order && $order->payment()->where('status', 'success')->first()) {
            return true;
        }

        return false;
    }
}