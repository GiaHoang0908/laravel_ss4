@extends('Layout.Backend.Master')

@section('title', 'Đơn hàng đã hủy')

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
            <h3>Danh sách đơn hàng</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-left">
                    <li class="breadcrumb-item"><a href="{{ route('admin.salesinvoice.index') }}">Quản lý đơn hàng</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách đơn hàng đã hủy</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="card">
                <div class=" card-header bg-white">
                    <u style="color: #0dcaf0; cursor: pointer;" class="font-italic"> Bảng danh sách đơn hàng đã
                        xóa</u>
                </div>
                <div class="mb-3 bg-white">
                    <a href="{{ route('admin.salesinvoice.index') }}">
                        <button type="button" class="ml-4 btn btn-success"><i class="mr-2  far fa-list-alt"></i><i>
                            Danh sách đơn hàng</i></button>
                    </a>

                </div>
                <div class="mt-2 card-body">
                    <table class='table table-bordered ' id="table1">
                        <thead>
                            <tr>
                                <th hidden>STT</th>
                                <th>Mã đơn hàng</th>
                                <th>Người nhận</th>
                                <th>Địa chỉ</th>
                                <th>Ngày Đặt Hàng</th>
                                <th>Email</th>
                                <th class="text-right" style="border-right: none; text-align: right; width: 10px;">Action
                                </th>
                                <th class="text-right" style="border-left: none; color: #fff !important; width: 10px;">
                                    action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt=1 ?>
                            @foreach ($hoadon as $p)
                                <tr>
                                    <td hidden>{{ $stt++ }}</td>
                                    <td>{{ $p->id}}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->address }}</td>
                                    <td >{{ $p->created_at }}</td>
                                    
                                    <td>{{ $p->user->email }}</td>
                                    <td>
                                        <a class="btn-trash"
                                            href="{{ route('admin.salesinvoice.untrash', ['id' => $p->id]) }}"><i
                                                class="btn btn-info fas fa-trash-restore-alt"></i></a>
                                        <div class="card mt-2 message" style="position:absolute; width: 8rem;">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Khôi phục</li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn-delete" href="" data-id="{{ $p->id }}" data-toggle="modal"
                                            data-target="#delete-category"><i
                                                class="btn btn-danger fas fa-times"></i></a>
                                        <div class="card mt-2 message1" style="position:absolute; width: 6rem;">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Xóa vĩnh viễn</li>
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
    <div class="modal fade" id="delete-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    Sau khi xóa bản ghi sẽ bị xóa vĩnh viễn không thể khôi phục. Bạn có chắc không???
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button id="deleted-category" type="button" class="btn btn-danger">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
    <form class="delete-form" action="" method="POST">  
    @csrf
    @method('DELETE')
       
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
            var btnDelete = document.querySelector('#deleted-category');
            var formDelete = document.querySelector('.delete-form');
            $('#delete-category').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                getId = button.data('id')
            })

            btnDelete.onclick = function() {
                formDelete.action = '/admin/salesinvoice/' + getId;
                formDelete.submit();
            }

        });

    </script>

@stop
