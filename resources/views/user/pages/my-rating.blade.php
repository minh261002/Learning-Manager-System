@extends('user.master')

@section('title', 'Đánh Giá Của Tôi')

@section('content')
    <div class="dashboard-content-wrap mb-5">
        <div class="row">
            <div class="review-wrap col-8">
                @forelse($reviews as $item)
                    <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                        <div class="media-img mr-4 rounded-full">
                            <img class="rounded-full" src="{{ $item->users->photo ?? asset('uploads/no_image.jpg') }}"
                                alt="User image">
                        </div>
                        <div class="media-body">
                            <div class="d-flex flex-wrap align-items-baseline justify-content-between pb-1">
                                <h5>
                                    {{ $item->course->name }}
                                </h5>
                            </div>
                            <div class="d-flex flex-wrap align-items-center pb-1">
                                <div class="review-stars">
                                    <style>
                                        .review-stars i {
                                            color: #f9a825;
                                        }

                                        .review-stars i.active {
                                            color: #f9a825;
                                        }
                                    </style>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="la la-star {{ $i <= $item->rating ? 'active' : '' }}"></i>
                                    @endfor
                                </div>
                                <p class="fs-14 pl-1"><a href="#" class="text-color mx-1 hover-underline"></a>
                                    {{ formatDate($item->created_at) }}
                                </p>
                            </div>
                            <p class="pb-3">
                                {{ $item->comment }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        Bạn Chưa Có Đánh Giá Nào
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
