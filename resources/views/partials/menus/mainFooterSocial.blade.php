{{--<ul>--}}
    {{--<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>--}}
    {{--<li><a href="#"><i class="fab fa-twitter"></i></a></li>--}}
    {{--<li><a href="#"><i class="fab fa-youtube"></i></a></li>--}}
    {{--<li><a href="#"><i class="fab fa-google"></i></a></li>--}}
    {{--<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>--}}
{{--</ul>--}}

<ul class="footer_list">
    @foreach($items as $menu_item)
        <li><a href="{{ $menu_item->link() }}"><i class="fab {{ $menu_item->title }}"></i></a></li>
    @endforeach
</ul>