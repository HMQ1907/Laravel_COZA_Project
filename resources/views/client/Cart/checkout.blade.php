@extends('client.layoutClient');
@section('content')
    <form method="post" action="{{ route('order.save') }}">
        @csrf
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="container nicocheckout">
                        <div>
                            <div>
                                <div class="error"></div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Checkout</h3>
                                    </div>
                                </div>

                                <div class="row box checkout_form">
                                    <div class="col-md-6 register_block">
                                        <div class="row">
                                            <div class="form-group" style="display: none">
                                                <label class="form-control-label">Customer Group</label>
                                                <div class="radio">
                                                    <label>
                                                        <input name="customer_group_id" value="1" checked="checked"
                                                            type="radio" />
                                                        Default</label>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <br />
                                                <strong class="clearfix">Your Personal Details</strong>
                                            </div>
                                            <div class="form-group required col-md-12">
                                                <label class="form-control-label" for="input-payment-lastname">Full
                                                    Name</label>
                                                <input required name="name" placeholder="Full Name"
                                                    id="input-payment-lastname" class="form-control" type="text" />
                                            </div>
                                            <div class="form-group required col-md-12">
                                                <label class="form-control-label" for="input-payment-email">E-Mail</label>
                                                <input required name="email" placeholder="E-Mail" id="input-payment-email"
                                                    class="form-control" type="text" />
                                            </div>
                                            <div class="form-group required col-md-6">
                                                <label class="form-control-label"
                                                    for="input-payment-telephone">Telephone</label>
                                                <input required name="phone_number" placeholder="Telephone"
                                                    id="input-payment-telephone" class="form-control" type="text" />
                                            </div>
                                            <div class="form-group col-md-12">
                                                <br />
                                                <strong class="clearfix">Your Address</strong>
                                            </div>
                                            <div class="form-group required col-md-12">
                                                <label class="form-control-label" for="input-payment-address-1">Address
                                                    1</label>
                                                <input required name="address" placeholder="Address 1"
                                                    id="input-payment-address-1" class="form-control" type="text" />
                                            </div>
                                            <div class="form-group required col-md-6">
                                                <label class="form-control-label" for="input-payment-city">City</label>
                                                <input required name="city" placeholder="City" id="input-payment-city"
                                                    class="form-control" type="text" />
                                            </div>

                                            <div class="form-group required col-md-6">
                                                <label class="form-control-label" for="input-payment-postcode">Post
                                                    Code</label>
                                                <input name="postcode" placeholder="Post Code" id="input-payment-postcode"
                                                    class="form-control" type="text" />
                                            </div>
                                        </div>
                                        <div class="card card-default">
                                            <div class="card-header">
                                                <strong class="card-title"><a href="#collapse-voucher"
                                                        data-toggle="collapse" data-parent="#accordion"
                                                        class="accordion-toggle">Use Gift Certificate
                                                        <i class="la la-caret-down"></i></a></strong>
                                            </div>
                                            <div id="collapse-voucher" class="card-collapse collapse">
                                                <div class="card-block">
                                                    <label class="form-control-label" for="input-voucher">Enter your gift
                                                        certificate code here</label>
                                                    <div class="input-group">
                                                        <input name="voucher"
                                                            placeholder="Enter your gift certificate code here"
                                                            id="input-voucher" class="form-control" type="text" />
                                                        <span class="input-group-btn">
                                                            <input value="Apply Gift Certificate" id="button-voucher"
                                                                data-loading-text="Loading..." class="btn btn-primary"
                                                                type="submit" />
                                                        </span>
                                                    </div>
                                                    <script type="text/javascript">
                                                        <!--
                                                        $("#button-voucher").on("click", function() {
                                                            $.ajax({
                                                                url: "index.php?route=checkout/nicocheckout/voucher",
                                                                type: "post",
                                                                data: "voucher=" +
                                                                    encodeURIComponent(
                                                                        $("input[name='voucher']").val()
                                                                    ),
                                                                dataType: "json",
                                                                beforeSend: function() {
                                                                    $("#button-voucher").button("loading");
                                                                },
                                                                complete: function() {
                                                                    $("#button-voucher").button("reset");
                                                                },
                                                                success: function(json) {
                                                                    $(".alert").remove();

                                                                    if (json["error"]) {
                                                                        $(".breadcrumb").after(
                                                                            '<div class="alert alert-danger"><i class="la la-exclamation-circle"></i> ' +
                                                                            json["error"] +
                                                                            '<button type="button" class="close" data-dismiss="alert">&times;</button></div>'
                                                                        );

                                                                        //$('html, body').animate({ scrollTop: 0 }, 'slow');
                                                                    } else
                                                                        $(
                                                                            "select[name='country_id']"
                                                                        ).trigger("change");

                                                                    if (json["redirect"]) {
                                                                        location = json["redirect"];
                                                                    }
                                                                },
                                                            });
                                                        });
                                                        //
                                                        -->
                                                    </script>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-default">
                                            <div class="card-header">
                                                <strong class="card-title"><a href="#collapse-coupon"
                                                        class="accordion-toggle" data-toggle="collapse"
                                                        data-parent="#accordion">Use Coupon Code
                                                        <i class="la la-caret-down"></i></a></strong>
                                            </div>
                                            <div id="collapse-coupon" class="card-collapse collapse">
                                                <div class="card-block">
                                                    <label class="form-control-label" for="input-coupon">Enter your coupon
                                                        here</label>
                                                    <div class="input-group">
                                                        <input name="coupon" placeholder="Enter your coupon here"
                                                            id="input-coupon" class="form-control" type="text" />
                                                        <span class="input-group-btn">
                                                            <input value="Apply Coupon" id="button-coupon"
                                                                data-loading-text="Loading..." class="btn btn-primary"
                                                                type="button" />
                                                        </span>
                                                    </div>
                                                    <script type="text/javascript">
                                                        <!--
                                                        $("#button-coupon").on("click", function() {
                                                            $.ajax({
                                                                url: "index.php?route=checkout/nicocheckout/coupon",
                                                                type: "post",
                                                                data: "coupon=" +
                                                                    encodeURIComponent(
                                                                        $("input[name='coupon']").val()
                                                                    ),
                                                                dataType: "json",
                                                                beforeSend: function() {
                                                                    $("#button-coupon").button("loading");
                                                                },
                                                                complete: function() {
                                                                    $("#button-coupon").button("reset");
                                                                },
                                                                success: function(json) {
                                                                    $(".alert").remove();

                                                                    if (json["error"]) {
                                                                        $(".breadcrumb").after(
                                                                            '<div class="alert alert-danger"><i class="la la-exclamation-circle"></i> ' +
                                                                            json["error"] +
                                                                            '<button type="button" class="close" data-dismiss="alert">&times;</button></div>'
                                                                        );

                                                                        //$('html, body').animate({ scrollTop: 0 }, 'slow');
                                                                    } else
                                                                        $(
                                                                            "select[name='country_id']"
                                                                        ).trigger("change");

                                                                    if (json["redirect"]) {
                                                                        location = json["redirect"];
                                                                    }
                                                                },
                                                            });
                                                        });
                                                        //
                                                        -->
                                                    </script>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-default">
                                            <div class="card-header">
                                                <strong class="card-title"><a href="#collapse-reward"
                                                        class="accordion-toggle" data-toggle="collapse"
                                                        data-parent="#accordion">Use Reward Points (Available )
                                                        <i class="la la-caret-down"></i></a></strong>
                                            </div>
                                            <div id="collapse-reward" class="card-collapse collapse">
                                                <div class="card-block">
                                                    <label class="form-control-label" for="input-reward">Points to use
                                                        (Max )</label>
                                                    <div class="input-group">
                                                        <input name="reward" placeholder="Points to use (Max )"
                                                            id="input-reward" class="form-control" type="text" />
                                                        <span class="input-group-btn">
                                                            <input value="Apply Points" id="button-reward"
                                                                data-loading-text="Loading..." class="btn btn-primary"
                                                                type="submit" />
                                                        </span>
                                                    </div>
                                                    <script type="text/javascript">
                                                        <!--
                                                        $("#button-reward").on("click", function() {
                                                            $.ajax({
                                                                url: "index.php?route=checkout/nicocheckout/reward",
                                                                type: "post",
                                                                data: "reward=" +
                                                                    encodeURIComponent(
                                                                        $("input[name='reward']").val()
                                                                    ),
                                                                dataType: "json",
                                                                beforeSend: function() {
                                                                    $("#button-reward").button("loading");
                                                                },
                                                                complete: function() {
                                                                    $("#button-reward").button("reset");
                                                                },
                                                                success: function(json) {
                                                                    $(".alert").remove();

                                                                    if (json["error"]) {
                                                                        $(".breadcrumb").after(
                                                                            '<div class="alert alert-danger"><i class="la la-exclamation-circle"></i> ' +
                                                                            json["error"] +
                                                                            '<button type="button" class="close" data-dismiss="alert">&times;</button></div>'
                                                                        );

                                                                        //$('html, body').animate({ scrollTop: 0 }, 'slow');
                                                                    } else
                                                                        $(
                                                                            "select[name='country_id']"
                                                                        ).trigger("change");

                                                                    if (json["redirect"]) {
                                                                        location = json["redirect"];
                                                                    }
                                                                },
                                                            });
                                                        });
                                                        //
                                                        -->
                                                    </script>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="payment-methods mt-3">
                                            <h2 class="mb-2">Payment method</h2>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                    value="1" id="cod">
                                                <label class="form-check-label" for="cod">Cash on delivery</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                    value="2" id="online">
                                                <label class="form-check-label" for="online">Online Payment</label>
                                            </div>
                                        </div>

                                        <p><strong>Add Comments About Your Order</strong></p>
                                        <p>
                                            <textarea name="note" rows="3" class="form-control"></textarea>
                                        </p>
                                        <div class="buttons clearfix">
                                            <div class="float-xs-right">
                                                I have read and agree to the
                                                <a href="http://agency.nicolette.ro/index.php?route=information/information/agree&amp;information_id=5"
                                                    class="agree"><b>Terms &amp; Conditions</b></a>
                                                <input name="agree" value="1" type="checkbox" />
                                                &nbsp;
                                            </div>
                                        </div>

                                        <div class="mb-3 payment float-xs-right clearfix">
                                            <input style="cursor: pointer" class="btn btn-primary"
                                                data-loading-text="Loading..." id="button-register" value="Checkout"
                                                type="submit" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="shipping-method">
                                            <p>
                                                Please select the preferred shipping method to use
                                                on this order.
                                            </p>
                                            <p><strong>Flat Rate</strong></p>
                                            <div class="radio">
                                                <label class="custom-control custom-radio">
                                                    <input id="radio1" class="custom-control-input"
                                                        name="shipping_method" value="flat.flat"
                                                        title="Flat Shipping Rate" checked="checked"
                                                        type="radio" /><span class="custom-control-label"></span>
                                                    <span class="custom-control-description">Flat Shipping Rate -
                                                        $8.00</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="your_order">
                                            <strong>Shopping Cart</strong>
                                            <table id="cart_table" class="table table-hover table-bordered" data-cart>
                                                <thead>
                                                    <tr>
                                                        <th class="text-xs-left">Product Name</th>
                                                        <th class="text-xs-left hidden-xs">Thumb</th>
                                                        <th class="text-xs-right hidden-xs">
                                                            Quantity
                                                        </th>
                                                        <th class="text-xs-right hidden-xs">
                                                            Unit Price
                                                        </th>
                                                        <th class="text-xs-right">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (Cart::content() as $item)
                                                        <tr data-product>
                                                            <td class="text-xs-left">
                                                                {{ $item->name }}
                                                            </td>
                                                            <td class="text-xs-left hidden-xs">
                                                                <img width="80px"
                                                                    src="{{ asset($item->options->thumb) }}"
                                                                    alt="">
                                                            </td>
                                                            <td class="text-xs-right hidden-xs">{{ $item->qty }}</td>
                                                            <td class="text-xs-right hidden-xs">
                                                                ${{ number_format($item->price) }}</td>
                                                            <td class="text-xs-right">
                                                                ${{ number_format($item->price * $item->qty) }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="3" class="text-xs-right hidden-xs-down">
                                                            <strong>Sub-Total:</strong>
                                                        </td>
                                                        <td colspan="1" class="text-xs-right hidden-sm-up">
                                                            <strong>Sub-Total:</strong>
                                                        </td>
                                                        <td class="text-xs-right">${{ Cart::subTotal() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-xs-right hidden-xs-down">
                                                            <strong>Flat Shipping Rate:</strong>
                                                        </td>
                                                        <td colspan="1" class="text-xs-right hidden-sm-up">
                                                            <strong>Flat Shipping Rate:</strong>
                                                        </td>
                                                        <td class="text-xs-right">$5.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-xs-right hidden-xs-down">
                                                            <strong>Eco Tax (-2.00):</strong>
                                                        </td>
                                                        <td colspan="1" class="text-xs-right hidden-sm-up">
                                                            <strong>Eco Tax (-2.00):</strong>
                                                        </td>
                                                        <td class="text-xs-right">$4.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-xs-right hidden-xs-down">
                                                            <strong>VAT (20%):</strong>
                                                        </td>
                                                        <td colspan="1" class="text-xs-right hidden-sm-up">
                                                            <strong>VAT (20%):</strong>
                                                        </td>
                                                        <td class="text-xs-right">$
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="text-xs-right hidden-xs-down">
                                                            <strong>Total:</strong>
                                                        </td>
                                                        <td colspan="1" class="text-xs-right hidden-sm-up">
                                                            <strong>Total:</strong>
                                                        </td>
                                                        <td class="text-xs-right">${{ Cart::Total() }}</td>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                            <br />

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
