@extends('Layout.Backend.Master')

@section('title', 'Dashboard')
@section('style')
    <style>
        th {
            border-bottom: none !important;
            color: #333 !important;
            font-weight: 600 !important;

        }

        .message {
            z-index: 99;
            opacity: 0;
            visibility: hidden;
        }

        .message1 {
            z-index: 99;
            opacity: 0;
            visibility: hidden;

        }

        .btn-trash:hover+.message {
            opacity: 1;
            visibility: visible;
            transition: linear .3s;
        }

        .btn-delete:hover+.message1 {
            opacity: 1;
            visibility: visible;
            transition: linear .3s;
        }



        .message::before {
            position: absolute;
            content: "";
            left: 10%;
            transform: translateX(-50%) rotate(45deg);
            top: -6px;
            transform: rotate(45deg);
            width: 10px;
            height: 10px;
            border-top: 1px solid #e5e5e5;
            border-left: 1px solid #e5e5e5;
            background-color: #fff;
        }

        .message1::before {
            position: absolute;
            content: "";
            left: 10%;
            transform: translateX(-50%) rotate(45deg);
            top: -6px;
            transform: rotate(45deg);
            width: 10px;
            height: 10px;
            border-top: 1px solid #e5e5e5;
            border-left: 1px solid #e5e5e5;
            background-color: #fff;
        }

    </style>
@stop
@section('content')

    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Dashboard</h3>
            <p class="text-subtitle text-muted">Thống kê cơ bản</p>
        </div>
        <section class="section">
            <div class="row mb-2">
                <div class="col-12 col-md-6">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>Người dùng</h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p>{{ count($user) }} </p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas1" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>Doanh thu </h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p>{{ number_format($total) }}đ</p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas2" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>Đơn hàng</h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p>{{ count($get_all_sales_invoice) }} </p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas3" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>Tổng sản phẩm</h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p>{{count($products)}}</p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas4" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-8">
                    <div class="card " hidden>
                        <div class="card-header">
                            <h3 class='card-heading p-1 pl-3'>Sales</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="pl-3">
                                        <h1 class='mt-5'>$21,102</h1>
                                        <p class='text-xs'><span class="text-green"><i data-feather="bar-chart"
                                                    width="15"></i> +19%</span> than last month</p>
                                        <div class="legends">
                                            <div class="legend d-flex flex-row align-items-center">
                                                <div class='w-3 h-3 rounded-full bg-info mr-2'></div><span
                                                    class='text-xs'>Last Month</span>
                                            </div>
                                            <div class="legend d-flex flex-row align-items-center">
                                                <div class='w-3 h-3 rounded-full bg-blue mr-2'></div><span
                                                    class='text-xs'>Current Month</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <canvas id="bar"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Đơn hàng hôm nay</h4>

                        </div>
                        <div class="card-body px-0 pb-0">
                            <div class="table-responsive">
                                <table class='table table-bordered ' id="table1">
                                    @if(count($hoadon)>0)

                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Người nhận</th>
                                            <th>Địa chỉ</th>
                                            <th>Ngày Đặt Hàng</th>
                                            {{-- <th>Ngày Giao</th> --}}
                                            <th>Email</th>
                                            <th>Trạng thái</th>
                                            <th class="text-right"
                                                style="border-right: none; text-align: right; width: 10px;">Action
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>

                                        @foreach ($hoadon as $p)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $p->name }}</td>
                                                <td>{{ $p->address }}</td>
                                                <td>{{ $p->created_at }}</td>
                                                {{-- <td >{{ date('Y-m-d', strtotime($p->delivery_date)) }}</td> --}}
                                                <td>{{ $p->user->email }}</td>
                                                <td class="text-primary ">{{ $p->status }}</td>
                                                <td>
                                                    <a class="btn-trash"
                                                        href="{{ route('admin.salesinvoice.show', ['salesinvoice' => $p->id]) }}"><i
                                                            class="btn btn-primary far fa-edit"></i></a>
                                                    <div class="card mt-2 message" style="position:absolute;
                                                width: 8rem;">
                                                        <ul class="list-group list-group-flush">
                                                            <li class="list-group-item">Xem chi tiết</li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                        
                                    </tbody>
                                    @else
                                        <div class="mt-4 text-center">Chưa có đơn hàng nào.</div>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header">
                            <h4>Doanh thu của bạn:</h4>
                        </div>
                        <div class="card-body">
                            <div hidden id="radialBars"></div>
                            <div  class="d-flex justify-content-between align-items-center text-center mb-5">
                                <h6>Tháng trước:</h6>
                                <h1 class='text-green'>+{{number_format($total_last_month)}}đ</h1>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

@stop

