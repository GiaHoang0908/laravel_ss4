@extends('Layout.Backend.Master')

@section('title', 'Nhà cung cấp')


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/app.css">
    <link rel="shortcut icon" href="{{ asset('admin') }}/assets/images/favicon.svg" type="image/x-icon">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
@stop

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
            <h3>Danh sách nhà cung cấp</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-left">
                    <li class="breadcrumb-item"><a href="#">Quản lý nhà cung cấp</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách nhà cung cấp</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="card">
                <div class=" card-header bg-white">
                    <u style="color: #0dcaf0; cursor: pointer;" class="font-italic"> Bảng danh sách nhà cung cấp</u>
                </div>
                <div class="mb-3 bg-white">
                    <a href="{{ route('admin.supplier.create') }}">
                        <button type="button" class="ml-4 btn btn-success"><i class="mr-2  fas fa-plus"></i>Thêm nhà cung
                            cấp
                        </button>
                    </a>
                    {{-- <a href="{{ route('admin.supplier.trash') }}">
                        <button type="button" class="ml-4 btn btn-secondary"><i class="mr-2 far fa-trash-alt"></i>Thùng
                            rác</button>
                    </a>
                    @if (Session::has('error-supplier_delete'))
                        <div style="margin: 0 15px;" class="alert alert-danger" role="alert">
                            {{ Session()->get('error-supplier_delete') }}
                        </div>
                    @endif --}}
                </div>
                <div class="mt-2 card-body">
                    <table class='table table-bordered ' id="table1">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Nhà Cung Cấp</th>
                                <th>Địa Chỉ</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th class="text-right" style="border-right: none; text-align: right; width: 10px;">Action
                                </th>
                                <th class="text-right" style="border-left: none; color: #fff !important; width: 10px;">
                                    action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($models as $c)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $c->address }}</td>
                                    <td>{{ $c->email }}</td>
                                    <td>{{ $c->phone_number }}</td>
                                    <td>
                                        <a class='btn-edit' data-toggle="modal" data-id="{{ $c->id }}"
                                            data-target="#edit-supplier"><i class="btn btn-primary far fa-edit"></i></a>
                                        <div class="card mt-2 message" style="position:absolute; width: 8rem;">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Chỉnh sửa</li>
                                            </ul>
                                        </div>
                                    </td>

                                    <td>
                                        <a class="btn-delete" href="" data-id="{{ $c->id }}" data-toggle="modal"
                                            data-target="#delete-supplier"><i
                                                class="btn btn-danger fas fa-trash-alt"></i></a>
                                        <div class="card mt-2 message1" style="position:absolute; width: 6rem;">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Xóa </li>
                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

    <div class="modal fade" id="edit-supplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa thông tin:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Nhập tên nhà cung cấp:</label>
                        <div class="">
                            <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                                placeholder="Nhập tên nhà cung cấp...">
                        </div>
                        <div class=" mt-2 text-danger text-message"></div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Địa chỉ:</label>
                        <div class="">
                            <input type="text" class="form-control" name="address" id="address" autocomplete="off"
                                placeholder="Nhập địa chỉ nhà cung cấp...">
                        </div>
                        <div class=" mt-2 text-danger text-message"></div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Email:</label>
                        <div class="">
                            <input type="email" class="form-control" name="email" id="email" autocomplete="off"
                                placeholder="Nhập email...">
                        </div>
                        <div class=" mt-2 text-danger text-message"></div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Số điện thoại:</label>
                        <div class="">
                            <input type="number" class="form-control phone_number" name="phone_number" id="phone_number"
                                autocomplete="off" placeholder="Nhập số điện thoại...">
                        </div>
                        <div class=" mt-2 text-danger text-message"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button id="save-supplier" type="button" class="btn btn-danger">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-supplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Sau khi xóa bạn có thể vào thùng rác để khôi phục lại !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button id="deleted-supplier" type="button" class="btn btn-danger">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
    <form class="trash-form" action="" method="POST">
        @method('DELETE')
        @csrf
    </form>
@stop

@section('script')
    <script>
        $(document).ready(function() {
            $('#table1').DataTable({
                "lengthMenu": [
                    [5, 10, 25, -1],
                    [5, 10, 25, "All"]
                ],
                "language": {
                    "search": "Tìm kiếm: ",
                    "searchPlaceholder": "Nhập từ khóa...",
                    "lengthMenu": "Hiển thị _MENU_ bản ghi",
                    "info": "Trang hiện tại _PAGE_ / _PAGES_",
                    "infoEmpty": "Không có bản ghi trả về!",
                    "zeroRecords": "Không tìm thấy bản ghi",
                    "infoFiltered": "(tìm kiếm trong _MAX_ bản ghi)",
                    "paginate": {
                        "first": "Đầu trang",
                        "last": "Cuối trang",
                        "previous": "<i class='fas fa-angle-left'  color: orangered;'></i>",
                        "next": "<i class='fas fa-angle-right'  color: orangered;'></i>"
                    }
                },
                "pagingType": "full_numbers",
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [-1, -2]
                }]

            });

            var getId;
            var btnDelete = document.querySelector('#deleted-supplier');
            var formDelete = document.querySelector('.trash-form');
            $('#delete-supplier').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                getId = button.data('id')
            })
            $('#edit-supplier').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                getId = button.data('id')
            })

            btnDelete.onclick = function() {
                formDelete.action = '/admin/supplier/' + getId;
                formDelete.submit();
            }



            var btn_edit = document.querySelector('.btn-edit');
            btn_edit.onclick = function() {
                $.ajax({
                    method: 'GET',
                    url: `/admin/supplier/${getId} `,
                }).done(function(data) {
                    if (data) {
                        document.querySelector('input[name="name"]').value = data.name;
                        document.querySelector('input[name="address"]').value = data.address;
                        document.querySelector('input[name="email"]').value = data.email;
                        document.querySelector('input[name="phone_number"]').value = data.phone_number;
                    }
                })
            }
            var btn_save = document.querySelector('#save-supplier');
            btn_save.onclick = function() {
                var validate_name = validate('input[name="name"]');
                var validate_address = validate('input[name="address"]');
                var validate_email = validate('input[name="email"]');
                var validate_phone_number = validate('input[name="phone_number"]');
                if (validate_name && validate_address && validate_email && validate_phone_number) {
                    var data = {
                        name: document.querySelector('input[name="name"]').value,
                        address: document.querySelector('input[name="address"]').value,
                        email: document.querySelector('input[name="email"]').value,
                        phone_number: document.querySelector('input[name="phone_number"]').value,
                    }
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        },
                        url: `/admin/supplier/${getId}`,
                        method: "PUT",
                        data: data,
                    }).done(function(response) {
                        if (response) {
                            location.href = "{{ route('admin.supplier.index') }}"
                        }
                    })


                }
            }
        });

    </script>

@stop
