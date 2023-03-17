<div class="menu-desktop">
    <ul class="main-menu">
        <li class="active-menu"><a href="{{ route('home') }}">Home</a></li>
        @foreach ($categorys as $categoryParent)
            <li class="dropdown"><a
                    href="{{ route('category.product', ['id' => $categoryParent->id]) }}">{{ $categoryParent->name }}</a>
                @if ($categoryParent->menuChildren->count())
                    <ul class="sub-menu">
                        @foreach ($categoryParent->menuChildren as $categoryChild)
                            <li><a href="#">{{ $categoryChild->name }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
        <li>
            <a href="">Blog</a>
        </li>



        @php
            $customer_id = Session::get('customer_id');
            $customer_name = Session::get('customer_name');
        @endphp
        @if ($customer_id != null)
            <li>
                <a href="{{ Route('customer.logout') }}">Logout</a>
            </li>
        @else
            <li>
                <a href="{{ Route('customer.register') }}">Register</a>
            </li>
            <li>
                <a href="{{ Route('customer.login') }}">Login</a>
            </li>
        @endif
        @if ($customer_name != null)
            <div class="customer_name d-flex py-2">
                <i class="fa fa-user-circle-o mr-3" aria-hidden="true"></i>
                <h5>{{ $customer_name }}</h5>
            </div>
        @endif
    </ul>
</div>
