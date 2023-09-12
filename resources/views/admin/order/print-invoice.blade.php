<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print-invoice</title>
    <style>
        .invoice-box {
            width: 88%;
            margin: 0 auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
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

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="invoice-box mb-3">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{asset('/')}}upload/img3.jpg" style="width: 100px; max-width: 300px" />
                            </td>

                            <td>
                                Invoice #: 00{{$order->id}}<br />
                                Order Date: {{$order->order_date}}<br />
                                Invoice Date: {{date('Y-m-d')}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                            <td>
                                <h4>Delivery Information</h4>
                                <hr/>
                                {{$order->customer->name}}<br />
                                {{$order->customer->mobile}}<br />
                                {{$order->delivary_address}}
                            </td>

                            <td>
                                <h4>Company Information</h4>
                                <hr/>
                                Acme Corp.<br />
                                John Doe<br />
                                john@example.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td colspan="3">Payment Method</td>

                <td>Amount #</td>
            </tr>

            <tr class="details">
                <td colspan="3">{{$order->payment_type == 1 ?'Cash' : 'Online'}}</td>

                <td>{{$order->order_total}}</td>
            </tr>

            <tr class="heading">
                <td>Item</td>
                <td style="text-align: center;">Price</td>
                <td style="text-align: center;">Quantity</td>
                <td style="text-align: right;">Total</td>
            </tr>
            @php($sum=0)

            @foreach($order->orderDetails as $orderDetail)
            <tr class="item">
                <td>{{$orderDetail->product_name}}</td>
                <td style="text-align: center;">{{$orderDetail->product_price}}</td>
                <td style="text-align: center;">{{$orderDetail->product_qty}}</td>
                <td style="text-align: right;"> {{$orderDetail->product_price * $orderDetail->product_qty}}</td>
            </tr>
            @php($sum= $sum + ($orderDetail->product_price * $orderDetail->product_qty))
            @endforeach
            <tr>
                <td colspan="4"><hr/></td>
            </tr>
            <tr class="total">
                <td colspan="3"> Oder Sub Total</td>
                <td>{{$sum}}</td>
            </tr>
            <tr class="total">
                <td colspan="3"> Tax Total</td>
                <td>{{$order->tax_total}}</td>
            </tr>
            <tr class="total">
                <td colspan="3"> Shipping Total</td>
                <td>{{$order->shipping_total}}</td>
            </tr>
            <tr>
                <td colspan="4"><hr/></td>
            </tr>
            <tr class="total">
                <td colspan="3">Total Payable</td>
                <td>{{$sum+$order->tax_total+$order->shipping_total}}</td>
            </tr>
            <tr>
                <td style="width: 20px">
                    <br/>
                    <br/>
                    <hr>
                    <h5>Prepared By</h5>
                </td>
                <td colspan="2" ></td>
                <td style="width: 20px">
                    <br/>
                    <br/>
                    <hr>
                    <h5>Received By</h5>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
