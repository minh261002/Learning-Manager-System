<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Hoá Đơn #{{ $order->order_number }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 0;
            padding: 0;
            color: #555;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                {{ config('app.name') }}
                            </td>
                            <td>
                                Hoá Đơn #: {{ $order->order_number }}<br>
                                Ngày Mua: {{ $order->created_at->format('d-m-Y') }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                {{ $order->user->name }}<br>
                                {{ $order->user->email }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Phương Thức Thanh Toán
                </td>
                <td>
                    @if ($order->payment->payment_method == 'paypal')
                        <img src="{{ asset('frontend/img/paypal.png') }}" alt="paypal" style="width: 100px;">
                    @elseif($order->payment->payment_method == 'vnpay')
                        <img src="{{ asset('frontend/img/vnpay.png') }}" alt="vnpay" style="width: 100px;">
                    @endif
                </td>
            </tr>
            <tr class="details">
                <td>
                    {{ ucfirst($order->payment->payment_method) }}
                </td>
                <td>
                    ${{ number_format($order->payment->total) }}
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Khoá Học
                </td>
                <td>
                    Giá
                </td>
            </tr>
            <tr class="item">
                <td>
                    {{ $order->course->title }}
                </td>
                <td>
                    ${{ number_format($order->course->price, 2) }}
                </td>
            </tr>
            <tr class="total">
                <td></td>
                <td>
                    Total: ${{ number_format($order->course->price, 2) }}
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
