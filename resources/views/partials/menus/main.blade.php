<!-- Main Nav Menu -->

{{--<div class="main_nav_menu ml-auto">--}}
    {{--<ul class="standard_dropdown main_nav_dropdown">--}}
        {{--<li><a href="/">Home<i class="fas fa-chevron-down"></i></a></li>--}}
        {{--<li><a href="{{route('shop.index')}}">Shop<i class="fas fa-chevron-down"></i></a></li>--}}
        {{--<li><a href="/">Home<i class="fas fa-chevron-down"></i></a></li>--}}
        {{--<li><a href="/">Home<i class="fas fa-chevron-down"></i></a></li>--}}
        {{--<li><a href="#">Blog<i class="fas fa-chevron-down"></i></a></li>--}}
        {{--<li><a href="#">Contact<i class="fas fa-chevron-down"></i></a></li>--}}
    {{--</ul>--}}
{{--</div>--}}

<div class="main_nav_menu ml-auto">
    <ul class="standard_dropdown main_nav_dropdown">
        @foreach($items as $menu_item)
            <li><a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a></li>
        @endforeach
    </ul>
</div>