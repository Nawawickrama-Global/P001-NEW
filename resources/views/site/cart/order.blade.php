@extends('site.layout.main-2')
@section('content')
<!-- ======= product Section ======= -->
<main id="main">
    <section class="cart mt-5 pt-5">
        <div class="mt-5" style="margin-bottom:150px"></div>
        <div class="container justify-content-center">
            <div class="alert alert-success mt-5" role="alert">
                <center>
                    <h1>Thank You!</h1>
                    <p>
                        Thank you for your order! We appreciate your purchase and we're excited to get started on
                        fulfilling
                        your request. Our team is working diligently to prepare your order for shipment and we'll send
                        you a
                        confirmation email with tracking information as soon as it's on its way. If you have any
                        questions
                        or concerns about your order, please don't hesitate to contact us. We're always here to help and
                        ensure your complete satisfaction.
                    </p>
                    <h5>Your Order ID is: {{ str_pad($order->order_id, 5, '0', STR_PAD_LEFT) }}</h5>
                </center>
            </div>
        </div>
        <div class="mt-5" style="margin-bottom:150px"></div>
    </section>
</main>
<!-- End product Section -->
@endsection