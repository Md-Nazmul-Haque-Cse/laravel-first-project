<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{--<h3> Your order submitted successfully. Please wait we will contact you soon.Thank you for shopping with us.</h3>--}}

<p class="fa-font-awesome text-justify">Dear, {{ $customer->name}}, Your order submitted successfully. Please wait we will contact you soon.
Your Order No: {{ $order->id }},Total Price: TK. {{$order->order_total }}, Order date: {{$order->order_date  }}, Delivery Address: {{$order->delivery_address }}.Thank you for shopping with us.
</p>

</body>
</html>
