<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>s
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                @foreach (Cart::content() as $item)
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="{{ $item->options->thumb }}" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                {{ $item->name }}
                            </a>

                            <span class="header-cart-item-info">
                                {{ $item->qty }} x {{ number_format($item->price) }}$
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Total: ${{ Cart::subtotal() }}
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="{{ route('cart.show') }}"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>

                    <a href="shoping-cart.html"
                        class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
{{--  <div class="dropdown float-right" id="mini-cart" data-component-cart>
    <a class="btn btn-link dropdown-toggle bg-faded p-0 chevron-big" href="https://example.com" id="dropdownMenuLink"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="la la-shopping-cart d-inline-block" style="font-size:42px"><span class="cart-items"
                data-total_items>3</span></i>&ensp; <div class="d-inline-block text-dark"><span
                class="small d-block text-left">Your cart</span><span class="font-weight-bold"
                data-total>$3500.05</span></div>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">


        <table class="table table-sm table-striped">
            <tbody>
                <tr>
                    <td class="text-center"> <a
                            href="http://opencart3100.givan.ro/index.php?route=product/product&amp;language=en-gb&amp;product_id=40"><img
                                src="http://opencart3100.givan.ro/image/cache/catalog/demo/iphone_1-47x47.jpg"
                                alt="iPhone" title="iPhone" class="img-thumbnail"></a> </td>
                    <td class="text-left"><a
                            href="http://opencart3100.givan.ro/index.php?route=product/product&amp;language=en-gb&amp;product_id=40">iPhone</a>
                    </td>
                    <td class="text-right">x 1</td>
                    <td class="text-right">$123.20</td>
                    <td class="text-center"><button type="button" onclick="cart.remove('1');" data-toggle="tooltip"
                            title="" class="btn btn-danger btn-sm" data-original-title="Remove"><i
                                class="la la-times"></i></button></td>
                </tr>
                <tr>
                    <td class="text-center"> <a
                            href="http://opencart3100.givan.ro/index.php?route=product/product&amp;language=en-gb&amp;product_id=43"><img
                                src="http://opencart3100.givan.ro/image/cache/catalog/demo/macbook_1-47x47.jpg"
                                alt="MacBook" title="MacBook" class="img-thumbnail"></a> </td>
                    <td class="text-left"><a
                            href="http://opencart3100.givan.ro/index.php?route=product/product&amp;language=en-gb&amp;product_id=43">MacBook</a>
                    </td>
                    <td class="text-right">x 1</td>
                    <td class="text-right">$602.00</td>
                    <td class="text-center"><button type="button" onclick="cart.remove('2');" data-toggle="tooltip"
                            title="" class="btn btn-danger btn-sm" data-original-title="Remove"><i
                                class="la la-times"></i></button></td>
                </tr>
                <tr>
                    <td class="text-center"> <a
                            href="http://opencart3100.givan.ro/index.php?route=product/product&amp;language=en-gb&amp;product_id=30"><img
                                src="http://opencart3100.givan.ro/image/cache/catalog/demo/canon_eos_5d_1-47x47.jpg"
                                alt="Canon EOS 5D" title="Canon EOS 5D" class="img-thumbnail"></a> </td>
                    <td class="text-left"><a
                            href="http://opencart3100.givan.ro/index.php?route=product/product&amp;language=en-gb&amp;product_id=30">Canon
                            EOS 5D</a>
                        <br>
                        - <small>Select Red</small>
                    </td>
                    <td class="text-right">x 1</td>
                    <td class="text-right">$98.00</td>
                    <td class="text-center"><button type="button" onclick="cart.remove('3');" data-toggle="tooltip"
                            title="" class="btn btn-danger btn-sm" data-original-title="Remove"><i
                                class="la la-times"></i></button></td>
                </tr>
            </tbody>
        </table>

        <div>
            <table class="table table-sm table-bordered">
                <tbody>
                    <tr>
                        <td class="text-right"><strong>Sub-Total</strong></td>
                        <td class="text-right">$681.00</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
                        <td class="text-right">$6.00</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>VAT (20%)</strong></td>
                        <td class="text-right">$136.20</td>
                    </tr>
                    <tr>
                        <td class="text-right"><strong>Total</strong></td>
                        <td class="text-right">$823.20</td>
                    </tr>
                </tbody>
            </table>
            <p class="text-right"><a
                    href="http://opencart3100.givan.ro/index.php?route=checkout/cart&amp;language=en-gb"><strong><i
                            class="la la-shopping-cart"></i> View Cart</strong></a>&nbsp;&nbsp;&nbsp;<a
                    href="http://opencart3100.givan.ro/index.php?route=checkout/checkout&amp;language=en-gb"><strong><i
                            class="la la-share"></i> Checkout</strong></a></p>
        </div>


    </div>
</div>  --}}
