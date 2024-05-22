<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận Đơn Hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
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
            <p>Xin chào {{ $order->user->name }},</p>
            <p>
                Cảm ơn bạn đã mua hàng tại cửa hàng chúng tôi. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.
            </p>
        </div>
        <div class="order-details">
            <h2>Thông tin Đơn Hàng</h2>
            <p><strong>Đơn Hàng:</strong> {{ $order->order_number }}</p>
            <p><strong>Ngày Đặt Hàng:</strong> {{ formatDate($order->created_at) }}</p>
            <p><strong>Phương Thức Thanh Toán:</strong> {{ $order->payment->payment_method }}</p>
            <p><strong>Trạng Thái Đơn Hàng:</strong> {{ $order->payment->status }}</p>
        </div>
        <div class="footer">
            <p>Chúng tôi sẽ tiếp tục cập nhật trạng thái của đơn hàng và sẽ thông báo cho bạn khi đơn hàng được gửi đi.
                Nếu bạn có bất kỳ câu hỏi hoặc yêu cầu nào, vui lòng liên hệ với chúng tôi qua email này.</p>
            <p>Xin cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi!</p>
        </div>
    </div>
</body>

</html>
