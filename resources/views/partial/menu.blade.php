<div ng-controller="DanhMucontroller" class="sidebar">
    <h4>Danh mục</h4>
    <ul>
        <li><a class="@if (Request::path() == 'all') {!! 'active-color' !!} @endif " href="{{ route('all') }}"> Tất cả sản phẩm </a></li>
        @foreach ($menus as $menu)
            <li class="category">
                <a href="{{ route('danhmuc', ['slug' => $menu->slug]) }}" class=" @if ($menu->slug == Request('slug')) {!! 'active-color' !!} @endif 
                    @foreach ($menu->children as $children)
                        @if($children->slug == Request('slug'))
                            {!! 'active-color' !!} 
                        @endif
                    @endforeach
                    ">
                   {{ $menu->name }}
                </a>
                <ul class="categories">
                    @foreach ($menu->children as $children)
                        <li class="category-item "><a class=" @if ($children->slug ==
                                Request('slug')) {!! 'active-color' !!} @endif "
                                href="{{ route('danhmuc', ['slug' => $children->slug]) }}">{{ $children->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
        <li><a href="#">Set mini</a></li>
        <li><a href="#">Thực phẩm chức năng</a></li>
        <li><a href="#">Dịch vụ</a></li>
    </ul>
</div>
