@extends('frontend.master')

@section('title', 'Thanh toán thành công')

@section('content')
    <section class="breadcrumb-area pt-50px pb-50px bg-white pattern-bg">
        <style>
            #check-group {
                animation: 0.32s ease-in-out 1.03s check-group;
                transform-origin: center;
            }

            #check-group #check {
                animation: 0.34s cubic-bezier(0.65, 0, 1, 1) 0.8s forwards check;
                stroke-dasharray: 0, 75px;
                stroke-linecap: round;
                stroke-linejoin: round;
            }

            #check-group #outline {
                animation: 0.38s ease-in outline;
                transform: rotate(0deg);
                transform-origin: center;
            }

            #check-group #white-circle {
                animation: 0.35s ease-in 0.35s forwards circle;
                transform: none;
                transform-origin: center;
            }

            .box-animation {
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            #info {
                display: none;
            }

            @keyframes outline {
                from {
                    stroke-dasharray: 0, 345.576px;
                }

                to {
                    stroke-dasharray: 345.576px, 345.576px;
                }
            }

            @keyframes circle {
                from {
                    transform: scale(1);
                }

                to {
                    transform: scale(0);
                }
            }

            @keyframes check {
                from {
                    stroke-dasharray: 0, 75px;
                }

                to {
                    stroke-dasharray: 75px, 75px;
                }
            }

            @keyframes check-group {
                from {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.09);
                }

                to {
                    transform: scale(1);
                }
            }
        </style>

        <div class='box-animation'>
            <div class="item-animation">
                <svg width="100%" viewBox="0 0 133 133" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="check-group" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <circle id="filled-circle" fill="#07b481" cx="66.5" cy="66.5" r="54.5" />
                        <circle id="white-circle" fill="#FFFFFF" cx="66.5" cy="66.5" r="55.5" />
                        <circle id="outline" stroke="#07b481" stroke-width="4" cx="66.5" cy="66.5" r="54.5" />
                        <polyline id="check" stroke="#FFFFFF" stroke-width="5.5" points="41 70 56 85 92 49" />
                    </g>
                </svg>
            </div>

            <div class="info d-none flex-column row-gap-4" id="info">
                <h2 class="text-center">Thanh toán thành công</h2>
                <p class="text-center my-3">Cảm ơn bạn đã mua hàng tại cửa hàng của chúng tôi. <br />Chúng tôi sẽ liên hệ
                    với bạn
                    trong thời gian sớm nhất.</p>
                <div class="text-center">
                    <a href="{{ route('orders') }}" class="btn btn-outline-danger">Kiểm tra đơn hàng</a>
                    <a href="{{ route('home') }}" class="btn btn-outline-primary">Tiếp tục mua hàng</a>
                </div>
            </div>
        </div>
    </section>

    <script>
        setTimeout(() => {
            document.getElementById('info').classList.remove('d-none');
            document.getElementById('info').classList.add('d-flex');

        }, 1300);
    </script>
@endsection
