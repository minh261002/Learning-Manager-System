<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận Đơn Hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 200px;
        }

        .order-details {
            margin-top: 20px;
        }

        .order-details h2 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container p-5">
        <div class="logo my-4">
            <img src="{{ asset('frontend/img/logo.svg') }}" alt="Logo">
        </div>
        <div class="confirmation mt-5">
            <h2>Xác nhận Đơn Hàng</h2>
            <p>Xin chào {{ $payment->name }},</p>
            <p>
                Cảm ơn bạn đã mua hàng tại cửa hàng chúng tôi. Chúng tôi sẽ liên hệ với bạn <br /> trong thời gian sớm
                nhất.
            </p>
        </div>
        <div class="order-details">
            <h2>Thông tin Đơn Hàng</h2>
            <p><strong>Đơn Hàng:</strong> {{ $payment->payment_id }}</p>
            <p><strong>Ngày Đặt Hàng:</strong> {{ $payment->created_at->format('d/m/Y') }}</p>
            <p><strong>Phương Thức Thanh Toán:</strong>
                {{ $payment->payment_method === 'paypal' ? 'Cổng Thanh Toán PayPal' : 'Cổng Thanh Toán VNPAY' }}</p>
            <p>
                <strong>Trạng Thái Đơn Hàng:</strong>
                {{ $payment->status == 'success' ? 'Đã Thanh Toán' : 'Chưa Thanh Toán' }}
            </p>
        </div>
        <div class="order-details">
            <h2>Đơn Hàng</h2>
            <table class="table table-bordered table-borderless">
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>
                                <img src="{{ $order->course->image }}" alt="{{ $order->course->name }}" width="50px">
                            </td>
                            <td>{{ $order->course->name }}</td>
                            <td>{{ number_format($order->price, 0, ',', '.') }} VNĐ</td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    @if ($payment->discount > 0)
                        <tr>
                            <td colspan="2" class="text-end"><strong>Giảm Giá:</strong></td>
                            <td><strong>{{ number_format($payment->discount, 0, ',', '.') }} VNĐ</strong></td>
                        </tr>
                    @endif
                    <tr>
                        <td colspan="2" class="text-end"><strong>Thanh Toán:</strong></td>
                        <td><strong>{{ number_format($payment->total, 0, ',', '.') }} VNĐ</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="footer">
            <p>Chúng tôi sẽ tiếp tục cập nhật trạng thái của đơn hàng và sẽ thông báo cho bạn khi đơn hàng được thanh
                toán.
                Nếu bạn có bất kỳ câu hỏi hoặc yêu cầu nào, vui lòng liên hệ với chúng tôi .</p>
            <p>Cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi!</p>
        </div>
    </div>
</body>

</html>
