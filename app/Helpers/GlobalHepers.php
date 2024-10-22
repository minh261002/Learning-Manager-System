<?php
use App\Models\Payment;
use App\Services\Notify;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Carbon;
use Owenoj\LaravelGetId3\GetId3;
use App\Models\Order;

function setSidebarActive(array $routes): ?string
{
    foreach ($routes as $route) {
        if (request()->routeIs($route)) {
            return 'page-active';
        }
    }

    return null;
}

function adminSetSidebarActive(array $routes): ?string
{
    foreach ($routes as $route) {
        if (request()->routeIs($route)) {
            return 'active';
        }
    }

    return null;
}

function categoryMultiLevelOption($categories, $parentId = 0, $space = ' ', $selectedId = null, $currentCategoryId = null)
{
    foreach ($categories as $category) {
        if ($category->parent_id == $parentId) {
            $isSelected = ($selectedId != null && $selectedId == $category->id) || ($currentCategoryId != null && $currentCategoryId == $category->id);
            $selected = $isSelected ? 'selected' : '';
            echo '<option value="' . $category->id . '" ' . $selected . '>' . $space . $category->name . '</option>';
            categoryMultiLevelOption($categories, $category->id, $space . '--', $selectedId, $currentCategoryId);
        }
    }
}


function createSlug($model, $name)
{
    $slug = SlugService::createSlug($model, 'slug', $name);
    return $slug;
}

function formatTime($time)
{
    $hours = floor($time / 3600);
    $minutes = floor(($time / 60) % 60);
    $seconds = $time % 60;

    return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
}

function formatDate($date)
{
    $date = new DateTime($date);
    $date->setTimezone(new DateTimeZone('Asia/Ho_Chi_Minh'));
    return $date->format('H:i:s \N\g\à\y d/m/Y');
}

function renderBoxCourses($courses)
{
    $html = '';

    if ($courses->isEmpty()) {
        $html .= '<div class="col-12 alert alert-info text-center">
        Không có khóa học nào
        </div>';
    } else {
        foreach ($courses as $course) {

            if (checkNewCourse($course->created_at)) {
                $new = ' <div class="course-badge blue">Mới</div>';
            } else {
                $new = '';
            }

            if (checkBestSeller($course->id) > 0) {
                $bestSeller = ' <div class="course-badge green">Bán Chạy</div>';
            } else {
                $bestSeller = '';
            }

            if ($course->discount > 0) {
                $disount = '<div class="course-badge red">-' . $course->discount . '%</div>';
            } else {
                $disount = '';
            }

            $averageRating = $course->reviews->avg('rating');

            if ($averageRating > 0) {
                $rating = renderStarRating($course->reviews->avg('rating'));
            } else {
                $rating = 'Chưa có đánh giá';
            }

            $html .= '
        <div class="col-lg-4 responsive-column-half">
            <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_' . $course->id . '">
                <div class="card-image">
                    <a href="' . route('course.detail', $course->slug) . '">
                        <img class="card-img-top lazy" src="' . asset('frontend/images/img-loading.png') . '" data-src="' . $course->image . '" alt="Card image cap">
                    </a>
                    <div class="course-badge-labels">
                        ' . $disount . '
                        ' . $bestSeller . '
                        ' . $new . '
                        </div>
                    <div class="course-badge-labels">';
            $html .= '
                    </div>
                </div><!-- end card-image -->
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="' . route('course.detail', $course->slug) . '" class="overflow_title">
                            ' . $course->name . '
                        </a>
                    </h5>
                    <p class="card-text"><a href="teacher-detail.html">
                        ' . $course->instructor->name . '
                    </a></p>

                    <div class="star-rating">
                        ' . $rating . '
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-price text-black font-weight-bold">';

            if ($course->price == 0) {
                $html .= 'Miễn Phí';
            } elseif ($course->discount > 0) {
                $html .= number_format($course->price - ($course->price * $course->discount) / 100, 0, '.', ',') . ' VNĐ';
            } else {
                $html .= number_format($course->price, 0, '.', ',') . ' VNĐ';
            }

            $html .= '
                        </p>';

            if (auth()->check()) {
                $html .= '
                        <div class="d-flex align-items-center gap-2">
                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" id="' . $course->id . '" title="Yêu Thích" onclick="addToWishList(this.id)">
                                <i class="la la-heart-o"></i>
                            </div>
                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" id="' . $course->id . '" title="Thêm Vào Giỏ Hàng" onclick="addToCart(this.id)">
                                <i class="la la-shopping-cart"></i>
                            </div>
                        </div>';
            } else {
                $html .= '
                        <div>
                            <div class="icon-element icon-element-sm shadow-sm" style="cursor:not-allowed" title="Bạn Cần Đăng Nhập">
                                <i class="la la-heart-o"></i>
                            </div>
                            <div class="icon-element icon-element-sm shadow-sm" style="cursor:not-allowed" title="Bạn Cần Đăng Nhập">
                                <i class="la la-shopping-cart"></i>
                            </div>
                        </div>';
            }

            $html .= '
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>';
        }
    }

    return $html;
}

function renderBoxCoursesHome($courses)
{
    $html = '';

    if ($courses->isEmpty()) {
        $html .= '<div class="col-12 alert alert-info text-center">
        Không có khóa học nào
        </div>';
    } else {
        foreach ($courses as $course) {

            if (checkNewCourse($course->created_at)) {
                $new = ' <div class="course-badge blue">Mới</div>';
            } else {
                $new = '';
            }

            if (checkBestSeller($course->id) > 0) {
                $bestSeller = ' <div class="course-badge green">Bán Chạy</div>';
            } else {
                $bestSeller = '';
            }

            if ($course->discount > 0) {
                $disount = '<div class="course-badge red">-' . $course->discount . '%</div>';
            } else {
                $disount = '';
            }

            $averageRating = $course->reviews->avg('rating');

            if ($averageRating > 0) {
                $rating = renderStarRating($course->reviews->avg('rating'));
            } else {
                $rating = 'Chưa có đánh giá';
            }

            $html .= '
        <div class="col-lg-3 responsive-column-half">
            <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_' . $course->id . '">
                <div class="card-image">
                    <a href="' . route('course.detail', $course->slug) . '">
                        <img class="card-img-top lazy" src="' . asset('frontend/images/img-loading.png') . '" data-src="' . $course->image . '" alt="Card image cap">
                    </a>
                    <div class="course-badge-labels">
                        ' . $disount . '
                        ' . $bestSeller . '
                        ' . $new . '
                        </div>
                    <div class="course-badge-labels">';
            $html .= '
                    </div>
                </div><!-- end card-image -->
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="' . route('course.detail', $course->slug) . '" class="overflow_title">
                            ' . $course->name . '
                        </a>
                    </h5>
                    <p class="card-text"><a href="teacher-detail.html">
                        ' . $course->instructor->name . '
                    </a></p>

                    <div class="star-rating">
                        ' . $rating . '
                    </div>


                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-price text-black font-weight-bold">';

            if ($course->price == 0) {
                $html .= 'Miễn Phí';
            } elseif ($course->discount > 0) {
                $html .= number_format($course->price - ($course->price * $course->discount) / 100, 0, '.', ',') . ' VNĐ';
            } else {
                $html .= number_format($course->price, 0, '.', ',') . ' VNĐ';
            }

            $html .= '
                        </p>';

            if (auth()->check()) {
                $html .= '
                        <div class="d-flex align-items-center gap-2">
                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" id="' . $course->id . '" title="Yêu Thích" onclick="addToWishList(this.id)">
                                <i class="la la-heart-o"></i>
                            </div>
                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" id="' . $course->id . '" title="Thêm Vào Giỏ Hàng" onclick="addToCart(this.id)">
                                <i class="la la-shopping-cart"></i>
                            </div>
                        </div>';
            } else {
                $html .= '
                        <div>
                            <div class="icon-element icon-element-sm shadow-sm" style="cursor:not-allowed" title="Bạn Cần Đăng Nhập">
                                <i class="la la-heart-o"></i>
                            </div>
                            <div class="icon-element icon-element-sm shadow-sm" style="cursor:not-allowed" title="Bạn Cần Đăng Nhập">
                                <i class="la la-shopping-cart"></i>
                            </div>
                        </div>';
            }

            $html .= '
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>';
        }
    }

    return $html;
}

function checkNewCourse($created_at)
{
    $now = Carbon::now();
    $created = new Carbon($created_at);
    $diff = $now->diffInDays($created);

    return $diff <= 5;
}

function checkBestSeller($course_id)
{
    $orders = Order::where('course_id', $course_id)->get();
    $count = 0;

    foreach ($orders as $order) {
        $successfulPayment = $order->payment()->whereIn('status', ['success', 'pending'])->first();
        if ($successfulPayment) {
            $count++;
        }
    }

    return $count;
}

function vndToUsd($vnd)
{
    return round($vnd / 25463, 2);
}
function checkUserPaidCourse($user_id, $course_id)
{
    $orders = Order::where('user_id', $user_id)
        ->where('course_id', $course_id)
        ->get();

    foreach ($orders as $order) {
        $successfulPayment = $order->payment()->whereIn('status', ['success', 'pending'])->first();
        if ($successfulPayment) {
            return true;
        }
    }

    return false;
}

function formatPrice($price)
{
    return number_format($price, 0, '.', ',') . ' VNĐ';
}

function renderStarRating($rating)
{
    $rating = max(0, min(5, $rating));

    $fullStars = floor($rating);
    $halfStar = $rating - $fullStars >= 0.5;
    $html = '';

    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $fullStars) {
            $html .= '<i class="la la-star" style="color: #ffd700"></i>';
        } elseif ($i == $fullStars + 1 && $halfStar) {
            $html .= '<i class="la la-star-half" style="color: #ffd700"></i>';
        }
    }

    return $html;
}

function checkUserPendingPayment($user_id)
{
    $payments = Payment::where('user_id', $user_id)->get();

    foreach ($payments as $payment) {
        if ($payment->status == 'pending') {
            return true;
        }
    }

    return false;
}