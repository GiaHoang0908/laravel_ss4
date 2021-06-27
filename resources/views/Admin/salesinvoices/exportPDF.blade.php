<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Voler Admin Dashboard</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">


    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">


    <link rel="stylesheet" href="assets/css/app.css">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        .page-break {
            page-break-after: always;
        }

    </style>


</head>

<body>
    <div class="main-content container-fluid">

        <section class="section">
            <div class="card">
                <div class="container">
                    <div class="card-body">
                        <h5 class="mb-4">Thông tin khách hàng:</h5>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="">Người nhận hàng:</td>
                                    <td>{{ $cthoadon[0]->salesInvoice->name }}</td>
                                </tr>
                                <tr>
                                    <td class="">Ngày đặt hàng:</td>
                                    <td>{{ $cthoadon[0]->salesInvoice->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="">Số điện thoại:</td>
                                    <td>{{ $cthoadon[0]->salesInvoice->phone_number }}</td>
                                </tr>
                                <tr>
                                    <td class="">Địa chỉ:</td>
                                    <td>{{ $cthoadon[0]->salesInvoice->address }}</td>
                                </tr>
                                <tr>
                                    <td class="">Email:</td>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                                <tr>
                                    <td class="">Ghi chú:</td>
                                    <td>{{ $cthoadon[0]->salesInvoice->note }}</td>
                                </tr>
                            </tbody>
                        </table>


                    </div>

                    <div class=" card-body">
                        <table class='page-break table table-bordered' id="table1">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Gia tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; ?>
                                @foreach ($cthoadon as $p)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $p->product[0]->name }}</td>
                                        <td>{{ $p->quantity }}</td>
                                        <td>{{ number_format($p->price) }}đ</td>

                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <td colspan="3"><b>Tổng tiền</b></td>
                                <td>{{ number_format($cthoadon[0]->salesInvoice->total_price) }}đ</td>
                            </tfoot>
                        </table>
                    </div>



                </div>

            </div>

        </section>
    </div>
    <script src="assets/js/app.js"></script>

    <script src="assets/js/vendors.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>
