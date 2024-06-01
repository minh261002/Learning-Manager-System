@php

@endphp

@extends('frontend.master')

@section('title', 'Đăng ký')

@section('content')
    <section class="feature-area section--padding bg-gray">
        <div class="container">
            <div class="feature-heading-content-wrap text-center">
                <div class="section-heading">
                    <h2 class="section__title">
                        Tạo Khoá Học Video Trực Tuyến<br>
                    </h2>
                </div><!-- end section-heading -->
            </div>
            <div class="row pt-60px">
                <div class="col-lg-4 responsive-column-half">
                    <div class="info-box before-none">
                        <div class="icon-element mx-auto shadow-sm">
                            <svg class="svg-icon-color-1" width="40" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                x="0px" y="0px" viewBox="0 0 512.001 512.001" xml:space="preserve">
                                <g>
                                    <path
                                        d="M400.003,152H256.001c-5.523,0-10,4.477-10,10s4.477,10,10,10h144.002c5.523,0,10-4.477,10-10S405.526,152,400.003,152z" />
                                </g>
                                <g>
                                    <path
                                        d="M365.011,202.931c-1.86-1.86-4.44-2.93-7.07-2.93s-5.21,1.07-7.07,2.93c-1.86,1.86-2.93,4.44-2.93,7.07 s1.07,5.21,2.93,7.07s4.44,2.93,7.07,2.93s5.21-1.07,7.07-2.93c1.86-1.86,2.93-4.44,2.93-7.07S366.871,204.791,365.011,202.931z" />
                                </g>
                                <g>
                                    <path
                                        d="M263.061,45.931c-1.86-1.86-4.44-2.93-7.07-2.93s-5.21,1.07-7.07,2.93c-1.86,1.86-2.93,4.44-2.93,7.07
                                                                                                s1.07,5.21,2.93,7.07c1.86,1.86,4.44,2.93,7.07,2.93s5.21-1.07,7.07-2.93c1.86-1.86,2.93-4.44,2.93-7.07
                                                                                                S264.921,47.791,263.061,45.931z" />
                                </g>
                                <g>
                                    <path
                                        d="M315.878,200h-59.877c-5.523,0-10,4.477-10,10s4.477,10,10,10h59.877c5.523,0,10-4.477,10-10S321.401,200,315.878,200z" />
                                </g>
                                <g>
                                    <path
                                        d="M400.003,260H256.001c-5.523,0-10,4.477-10,10s4.477,10,10,10h144.002c5.523,0,10-4.477,10-10S405.526,260,400.003,260z" />
                                </g>
                                <g>
                                    <path
                                        d="M365.011,310.931c-1.86-1.86-4.44-2.93-7.07-2.93s-5.21,1.07-7.07,2.93c-1.86,1.86-2.93,4.44-2.93,7.07
                                                                                                s1.07,5.21,2.93,7.07s4.44,2.93,7.07,2.93s5.21-1.07,7.07-2.93c1.86-1.86,2.93-4.44,2.93-7.07S366.871,312.791,365.011,310.931z" />
                                </g>
                                <g>
                                    <path
                                        d="M315.878,308h-59.877c-5.523,0-10,4.477-10,10s4.477,10,10,10h59.877c5.523,0,10-4.477,10-10S321.401,308,315.878,308z" />
                                </g>
                                <g>
                                    <path
                                        d="M400.003,368H256.001c-5.523,0-10,4.477-10,10s4.477,10,10,10h144.002c5.523,0,10-4.477,10-10S405.526,368,400.003,368z" />
                                </g>
                                <g>
                                    <path
                                        d="M365.011,418.931c-1.86-1.86-4.44-2.93-7.07-2.93s-5.21,1.07-7.07,2.93c-1.86,1.86-2.93,4.44-2.93,7.07
                                                                                                s1.07,5.21,2.93,7.07s4.44,2.93,7.07,2.93s5.21-1.07,7.07-2.93c1.86-1.86,2.93-4.44,2.93-7.07S366.871,420.791,365.011,418.931z" />
                                </g>
                                <g>
                                    <path
                                        d="M315.878,416h-59.877c-5.523,0-10,4.477-10,10s4.477,10,10,10h59.877c5.523,0,10-4.477,10-10S321.401,416,315.878,416z" />
                                </g>
                                <g>
                                    <path
                                        d="M419.243,39.001h-76.379C331.823,28.48,316.898,22,300.479,22h-8.76C285.022,8.742,271.263,0,256,0
                                                                                                s-29.021,8.742-35.719,22H211.5c-16.419,0-31.343,6.48-42.384,17.001H92.759c-26.885,0-48.758,21.873-48.758,48.758v375.484
                                                                                                c0,26.885,21.873,48.758,48.758,48.758h326.483c26.885,0,48.758-21.873,48.758-48.758V87.759
                                                                                                C468.001,60.874,446.128,39.001,419.243,39.001z M211.501,42h15.586c4.498,0,8.442-3.003,9.639-7.338
                                                                                                C239.111,26.029,247.037,20,256.001,20c8.964,0,16.89,6.029,19.274,14.662c1.197,4.335,5.142,7.338,9.639,7.338h15.565
                                                                                                c21.705,0,39.571,16.75,41.354,38.001H170.147C171.93,58.75,189.797,42,211.501,42z M448.001,463.244
                                                                                                c0,15.857-12.901,28.758-28.758,28.758H92.759c-15.857,0-28.758-12.901-28.758-28.758V87.759
                                                                                                c0-15.857,12.901-28.758,28.758-28.758h62.347c-3.276,7.512-5.105,15.794-5.105,24.5v6.5c0,5.523,4.477,10,10,10H351.98
                                                                                                c5.523,0,10-4.477,10-10v-6.5c0-8.705-1.829-16.988-5.105-24.5h62.368c15.857,0,28.758,12.901,28.758,28.758V463.244z" />
                                </g>
                                <g>
                                    <path
                                        d="M192.41,149.596c-3.905-3.905-10.237-3.905-14.142-0.001l-42.762,42.763l-13.173-13.174
                                                                                                c-3.905-3.904-10.237-3.904-14.143,0c-3.905,3.905-3.905,10.237,0,14.143l20.245,20.245c1.953,1.953,4.512,2.929,7.071,2.929
                                                                                                c2.559,0,5.119-0.976,7.071-2.929l49.833-49.833C196.315,159.834,196.315,153.502,192.41,149.596z" />
                                </g>
                                <g>
                                    <path
                                        d="M168.001,368h-48c-5.523,0-10,4.477-10,10v48c0,5.523,4.477,10,10,10h48c5.523,0,10-4.477,10-10v-48
                                                                                                C178.001,372.477,173.524,368,168.001,368z M158.001,416h-28v-28h28V416z" />
                                </g>
                                <g>
                                    <path
                                        d="M168.001,260h-48c-5.523,0-10,4.477-10,10v48c0,5.523,4.477,10,10,10h48c5.523,0,10-4.477,10-10v-48
                                                                                                C178.001,264.477,173.524,260,168.001,260z M158.001,308h-28v-28h28V308z" />
                                </g>
                            </svg>
                        </div>
                        <h3 class="info__title">01.Lên Kế Hoạc Cho Khoá Học Của Bạn</h3>
                        <p class="info__text">Whether you want to develop as a professional or discover a new hobby, there's
                            an online course for that.</p>
                    </div><!-- end info-box -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-4 responsive-column-half">
                    <div class="info-box before-none">
                        <div class="icon-element mx-auto shadow-sm">
                            <svg class="svg-icon-color-2" width="40" viewBox="0 -48 496 496"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="m472 0h-448c-13.230469 0-24 10.769531-24 24v352c0 13.230469 10.769531 24 24 24h448c13.230469 0 24-10.769531 24-24v-352c0-13.230469-10.769531-24-24-24zm8 376c0 4.414062-3.59375 8-8 8h-448c-4.40625 0-8-3.585938-8-8v-352c0-4.40625 3.59375-8 8-8h448c4.40625 0 8 3.59375 8 8zm0 0">
                                </path>
                                <path d="m448 32h-400v240h400zm-16 224h-368v-208h368zm0 0"></path>
                                <path
                                    d="m328 200.136719c0-17.761719-11.929688-33.578125-29.007812-38.464844l-26.992188-7.703125v-2.128906c9.96875-7.511719 16-19.328125 16-31.832032v-14.335937c0-21.503906-16.007812-39.726563-36.449219-41.503906-11.183593-.96875-22.34375 2.800781-30.574219 10.351562-8.25 7.550781-12.976562 18.304688-12.976562 29.480469v16c0 12.503906 6.03125 24.328125 16 31.832031v2.128907l-26.992188 7.710937c-17.078124 4.886719-29.007812 20.703125-29.007812 38.464844v39.863281h160zm-16 23.863281h-128v-23.863281c0-10.664063 7.160156-20.152344 17.40625-23.082031l38.59375-11.023438v-23.070312l-3.976562-2.3125c-7.527344-4.382813-12.023438-12.105469-12.023438-20.648438v-16c0-6.703125 2.839844-13.160156 7.792969-17.695312 5.007812-4.601563 11.496093-6.832032 18.382812-6.207032 12.230469 1.0625 21.824219 12.285156 21.824219 25.566406v14.335938c0 8.542969-4.496094 16.265625-12.023438 20.648438l-3.976562 2.3125v23.070312l38.59375 11.023438c10.246094 2.9375 17.40625 12.425781 17.40625 23.082031zm0 0">
                                </path>
                                <path
                                    d="m32 364.945312 73.886719-36.945312-73.886719-36.945312zm16-48 22.113281 11.054688-22.113281 11.054688zm0 0">
                                </path>
                                <path d="m152 288h16v80h-16zm0 0"></path>
                                <path d="m120 288h16v80h-16zm0 0"></path>
                                <path d="m336 288h-48v32h-104v16h104v32h48v-32h128v-16h-128zm-16 64h-16v-48h16zm0 0"></path>
                            </svg>
                        </div>
                        <h3 class="info__title">02. Thực Hiện Quay Video Nội Dung Khoá Học</h3>
                        <p class="info__text">Whether you want to develop as a professional or discover a new hobby, there's
                            an online course for that.</p>
                    </div><!-- end info-box -->
                </div><!-- end col-lg-3 -->
                <div class="col-lg-4 responsive-column-half">
                    <div class="info-box before-none">
                        <div class="icon-element mx-auto shadow-sm">
                            <svg class="svg-icon-color-3" width="41" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                x="0px" y="0px" viewBox="0 0 490.667 490.667" xml:space="preserve">
                                <g>
                                    <g>
                                        <path
                                            d="M245.333,85.333c-41.173,0-74.667,33.493-74.667,74.667s33.493,74.667,74.667,74.667S320,201.173,320,160
                                                                                                        C320,118.827,286.507,85.333,245.333,85.333z M245.333,213.333C215.936,213.333,192,189.397,192,160
                                                                                                        c0-29.397,23.936-53.333,53.333-53.333s53.333,23.936,53.333,53.333S274.731,213.333,245.333,213.333z" />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M394.667,170.667c-29.397,0-53.333,23.936-53.333,53.333s23.936,53.333,53.333,53.333S448,253.397,448,224
                                                                                                        S424.064,170.667,394.667,170.667z M394.667,256c-17.643,0-32-14.357-32-32c0-17.643,14.357-32,32-32s32,14.357,32,32
                                                                                                        C426.667,241.643,412.309,256,394.667,256z" />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M97.515,170.667c-29.419,0-53.333,23.936-53.333,53.333s23.936,53.333,53.333,53.333s53.333-23.936,53.333-53.333
                                                                                                        S126.933,170.667,97.515,170.667z M97.515,256c-17.643,0-32-14.357-32-32c0-17.643,14.357-32,32-32c17.643,0,32,14.357,32,32
                                                                                                        C129.515,241.643,115.157,256,97.515,256z" />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M245.333,256c-76.459,0-138.667,62.208-138.667,138.667c0,5.888,4.779,10.667,10.667,10.667S128,400.555,128,394.667
                                                                                                        c0-64.704,52.629-117.333,117.333-117.333s117.333,52.629,117.333,117.333c0,5.888,4.779,10.667,10.667,10.667
                                                                                                        c5.888,0,10.667-4.779,10.667-10.667C384,318.208,321.792,256,245.333,256z" />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M394.667,298.667c-17.557,0-34.752,4.8-49.728,13.867c-5.013,3.072-6.635,9.621-3.584,14.656
                                                                                                        c3.093,5.035,9.621,6.635,14.656,3.584C367.637,323.712,380.992,320,394.667,320c41.173,0,74.667,33.493,74.667,74.667
                                                                                                        c0,5.888,4.779,10.667,10.667,10.667c5.888,0,10.667-4.779,10.667-10.667C490.667,341.739,447.595,298.667,394.667,298.667z" />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path
                                            d="M145.707,312.512c-14.955-9.045-32.149-13.845-49.707-13.845c-52.928,0-96,43.072-96,96
                                                                                                        c0,5.888,4.779,10.667,10.667,10.667s10.667-4.779,10.667-10.667C21.333,353.493,54.827,320,96,320
                                                                                                        c13.675,0,27.029,3.712,38.635,10.752c5.013,3.051,11.584,1.451,14.656-3.584C152.363,322.133,150.741,315.584,145.707,312.512z" />
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <h3 class="info__title">03. Xây Dựng Cộng Đồng Của Riêng Bạn</h3>
                        <p class="info__text">Whether you want to develop as a professional or discover a new hobby, there's
                            an online course for that.</p>
                    </div><!-- end info-box -->
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <section class="register-area my-5 dot-bg overflow-hidden">
        <div class="container">
            <form action="" class="row">
                <div class="col-12 mb-4 alert alert-info">
                    Vui lòng kiểm tra và điền đầy đủ thông tin của bạn
                </div>

                <div class="col-12  mb-4 media media-card align-items-center">
                    <div class="media-img media-img-lg mr-4 bg-gray">
                        <img class="mr-3" src="{{ Auth::user()->photo ?? asset('uploads/no_image.jpg') }}"
                            id="previewImg">
                    </div>
                    <div class="media-body">
                        <div class="file-upload-wrap file-upload-wrap-2">
                            <div class="MultiFile-wrap" id="MultiFile2">
                                <input type="file" name="photo"
                                    class="multi file-upload-input with-preview MultiFile-applied" id="MultiFile2">
                                <div class="MultiFile-list" id="MultiFile2_list"></div>
                            </div>
                            <span class="file-upload-text"><i class="la la-photo mr-2"></i>Chọn Ảnh</span>
                        </div><!-- file-upload-wrap -->

                    </div>
                </div>

                <div class="col-12 col-md-6 mb-4">
                    <div class="input-box">
                        <label class="label-text">Họ Và Tên</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="name"
                                value="{{ Auth::user()?->name }}">
                            <span class="la la-user input-icon"></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-4">
                    <div class="input-box">
                        <label class="label-text">Email</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="email" name="email"
                                value="{{ Auth::user()?->email }}">
                            <span class="la la-envelope input-icon"></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-4">
                    <div class="input-box">
                        <label class="label-text">Số Điện Thoại</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="number" name="phone"
                                value="{{ Auth::user()?->phone }}">
                            <span class="la la-phone input-icon"></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-4">
                    <div class="input-box">
                        <label class="label-text">Mô Tả Ngắn</label>
                        <div class="form-group">
                            <input class="form-control form--control" type="text" name="sort_desc"
                                value="{{ Auth::user()?->sort_desc }}">
                            <span class="la la-user input-icon"></span>
                        </div>
                    </div>
                </div>

                <div class="input-box col-lg-4 mb-4">
                    <label class="label-text">Tỉnh / Thành Phố</label>
                    <select class="form-control form--control select2" name="province" style="padding-left: 12px !important"
                        id="province">
                        <option value="">Chọn Tỉnh / Thành Phố</option>
                        @if ($provinces)
                            @foreach ($provinces as $province)
                                <option value="{{ $province->code }}"
                                    {{ Auth::user()?->province_id == $province->code ? 'selected' : '' }}>
                                    {{ $province->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div><!-- end input-box -->

                <div class="input-box col-lg-4 mb-4">
                    <label class="label-text">Quận / Huyện</label>
                    <select class="form-control form--control select2" name="district" id="district"
                        style="padding-left: 12px !important">
                        <option value="">Chọn Quận / Huyện</option>
                        @if ($districts)
                            @foreach ($districts as $district)
                                <option value="{{ $district->code }}"
                                    {{ Auth::user()?->district_id == $district->code ? 'selected' : '' }}>
                                    {{ $district->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div><!-- end input-box -->


                <div class="input-box col-lg-4 mb-4">
                    <label class="label-text">Phường / Xã</label>
                    <select class="form-control form--control select2" name="ward"
                        style="padding-left: 12px !important" id="ward">
                        <option value="">Chọn Phường / Xã</option>

                        @if ($wards)
                            @foreach ($wards as $ward)
                                <option value="{{ $ward->code }}"
                                    {{ Auth::user()?->ward_id == $ward->code ? 'selected' : '' }}>
                                    {{ $ward->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div><!-- end input-box -->

                <div class="input-box col-lg-12">
                    <label class="label-text">Địa Chỉ</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="address"
                            value="{{ Auth::user()?->address }}">
                        <span class="la la-map-marker-alt input-icon"></span>
                    </div>
                </div><!-- end input-box -->


                <div class="input-box col-12 mb-4">
                    <label for="bio">TIểu Sử</label>
                    <textarea name="bio" id="bio" class="form-control form--control" rows="3">{{ Auth::user()?->bio }}</textarea>
                </div>

                <div class="col-12 mb-4">
                    <button type="button" class="btn theme-btn" onclick="warning()">Gửi Yêu Cầu</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#bio'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
