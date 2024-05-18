@extends('admin.master')

@section('title', $course->name)

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Quản Lý Khoá Học</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Thông Tin Khoá Học</h4>
                </div>
                <div class="card-body">
                    <div class="media">
                        <img class="mr-3" src="{{ $course->image }}" width="200px" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $course->name }}</h5>
                            <p class="mb-0">{{ $course->title }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-primary">
                <div class="card-body">
                    @forelse ($course->section as $section)
                        <!-- Đổi tên từ 'section' thành 'sections' để rõ ràng hơn -->
                        <div id="accordion{{ $course->id }}">
                            <div class="accordion">
                                <div class="accordion-header collapsed" role="button" data-toggle="collapse"
                                    data-target="#panel-body-{{ $section->id }}" aria-expanded="false">
                                    <h4>{{ $section->title }}</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-{{ $section->id }}"
                                    data-parent="#accordion{{ $course->id }}" style="">
                                    @forelse ($section->lectures as $lecture)
                                        <p>{{ $lecture->title }}</p>
                                    @empty
                                        <p>Không có bài giảng nào</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Không có bài giảng nào</p>
                    @endforelse
                </div>

            </div>
        </div>
        </div>
    </section>
@endsection
