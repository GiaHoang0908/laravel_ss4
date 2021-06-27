<div class="sidebar  l-3 " style="margin: 0; position: inherit;">
    <form action="{{ route('tintuc') }}" class="form-search-cat">
        <button style="border: none; outline: none; background: #fff"><i class="fas fa-search"></i></button>
        <input type="text" name="s" placeholder="Nhập từ khóa..">
    </form>
    <ul>
        <li class="mt-4">
            <h3><b>Danh mục tin tức</b></h3>
        </li>
        @foreach ($menu as $m)
            <li class="category">
                <a href="{{ route('tintuc.danhmuc', ['slug' => $m->slug]) }}">{{ $m->name }}</a>
            </li>
        @endforeach


    </ul>
    <ul>
        <li>

            <h3><b>Tin tức mới nhất</b></h3>

        </li>
        @foreach($news as $n)
        <li class="category">
            <div>
                <div class="d-flex product-grid">
                    <a>
                        <a href="{{ route('tintuc.detail', ['slug' => $n->slug]) }}">
                            <img style="width: 50px; margin-right: 12px;" src="{{ asset('upload/image/news').'/'.$n->image }}" />
                        </a>
                    </a>
                    <div>
                        <div>
                            <a href="{{ route('tintuc.detail', ['slug' => $n->slug]) }}">
                                <p style="font-weight: 400;" class="home-product-item__name">
                                    {{ $n->title }}
                                </p>
                            </a>
                        </div>

                    </div>

                </div>

        </li>
        @endforeach
    </ul>

</div>
