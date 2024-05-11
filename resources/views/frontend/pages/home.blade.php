@extends('frontend.master')

@section('title', 'LearnHub - Hệ thống giáo dục trực tuyến')
@section('content')

    <!--====================================== START HERO AREA ======================================-->
    @include('frontend.components.home.hero')
    <!--====================================== END HERO AREA ======================================-->


    <!--====================================== START FEATURE AREA ======================================-->
    @include('frontend.components.home.feature')
    <!--====================================== END FEATURE AREA ======================================-->


    <!--====================================== START CATEGORY AREA ======================================-->
    @include('frontend.components.home.category')
    <!--====================================== END CATEGORY AREA ======================================-->


    <!--====================================== START COURSE AREA ======================================-->
    @include('frontend.components.home.course')
    <!--====================================== END COURSE AREA ======================================-->


    <!--====================================== START COURSE-2 AREA ======================================-->
    @include('frontend.components.home.course-2')
    <!--====================================== END COURSE AREA ======================================-->


    <!--====================================== START FUNFACT AREA ======================================-->
    @include('frontend.components.home.funfact')
    <!--====================================== END FUNFACT AREA ======================================-->


    <!--====================================== START CTA AREA ======================================-->
    @include('frontend.components.home.cta')
    <!--====================================== END CTA AREA ======================================-->


    <!--================================ START TESTIMONIAL AREA =================================-->
    @include('frontend.components.home.testimonial')
    <!--================================ END TESTIMONIAL AREA =================================-->


    <div class="section-block"></div>

    <!--====================================== START ABOUT AREA ======================================-->
    @include('frontend.components.home.about')
    <!--====================================== END ABOUT AREA ======================================-->

    <div class="section-block"></div>

    <!--====================================== START REGISTER AREA ======================================-->
    @include('frontend.components.home.register')
    <!--====================================== END REGISTER AREA ======================================-->

    <div class="section-block"></div>

    <!-- ================================ START CLIENT-LOGO AREA ================================= -->
    @include('frontend.components.home.client-logo')
    <!-- ================================ END CLIENT-LOGO AREA ================================= -->


    <!-- ================================ START BLOG AREA ================================= -->
    @include('frontend.components.home.blog')
    <!-- ================================ END BLOG AREA ================================= -->


    <!--====================================== START GET STARTED AREA ======================================-->
    @include('frontend.components.home.get-started')
    <!--====================================== END GET STARTED AREA ======================================-->
@endsection
