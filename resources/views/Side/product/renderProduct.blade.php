
@if (isset($products))
    <div style="background-color: #fff;" class="grid wide info-content">
        <div class="">
            <div style="height: 80px; padding: 0 20px; margin-top: 18px;"
                class="d-flex justify-content-between align-items-center ">
                <h3 class="">Sản phẩm đã xem</h3>
                <a href="{{route('all', ['orderBy'=>'ordering'])}}">
                    <div = class="d-flex  align-items-center">
                        <h4 style="color: orangered; margin: 0;">Xem tất cả</h4>
                        <i style="color: orangered" class="ml-4 fas fa-chevron-right"></i>
                    </div>
                </a>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="news-slider6" class="owl-carousel">

                        @foreach ($products as $p)
                        <div class="">
                            <a href="" class="thumb-wrapper">
                                <div class="img-box">
                                    <img style="height: 133px" src="{{ asset('upload/image/product') . '/' . $p->image }}" class="img-fluid"
                                        alt="lỗi" />

                                </div>
                                <div class="thumb-content">
                                    <p class="procduct-name-selling">{{ $p->name }}</p>
                                    <p class="item-price">
                                        <strike>{{ number_format(sale(20, $p)) }}đ</strike>
                                        <span>{{ number_format($p->price) }}đ</span>
                                    </p>


                                </div>
                            </a>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

@else
    <div class=""></div>
@endif
<?php function sale($percent, $flashsales)
{
$str_sale = explode(',', $flashsales->price);
$sale = '';
foreach ($str_sale as $s) {
$sale = $sale . $s;
}
return $sale = floatval($sale) / ((100 - $percent) / 100);
} ?>
<script>
    $(document).ready(function() {
        $("#news-slider").owlCarousel({
            items: 2,
            itemsDesktop: [1199, 2],
            itemsMobile: [600, 1],
            pagination: true,
            autoPlay: true
        });

        $("#news-slider6").owlCarousel({
            items: 7,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [980, 2],
            itemsMobile: [600, 1],
            pagination: false,
            navigationText: false
        });
    });
</script>
