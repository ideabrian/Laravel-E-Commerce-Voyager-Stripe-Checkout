{{--<ul class="footer_list">--}}
{{--<li><a href="#">My Account</a></li>--}}
{{--<li><a href="#">Order Tracking</a></li>--}}
{{--<li><a href="#">Wish List</a></li>--}}
{{--<li><a href="#">Customer Services</a></li>--}}
{{--<li><a href="#">Returns / Exchange</a></li>--}}
{{--<li><a href="#">FAQs</a></li>--}}
{{--<li><a href="#">Product Support</a></li>--}}
{{--</ul>--}}

<ul class="footer_list">
    @foreach($items as $menu_item)
        <li><a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a></li>
    @endforeach
</ul>