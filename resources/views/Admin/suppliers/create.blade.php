@extends('Layout.Backend.Master')

@section('title', 'Thêm nhà cung cấp')


@section('style')
    <style>
        .select2-container--default .select2-search--inline .select2-search__field {
            min-height: 30px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            border-radius: 0px;
        }

        .select2-selection__choice {
            border-radius: 0px;
            color: #fff;
            background-color: #5a8dee !important;
            font-size: 1rem;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            background-color: #5a8dee;
            color: #fff;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            background-color: #5a8dee;
            color: #e5e5e5;
            font-weight: 300;
        }

    </style>
@stop

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Thêm bản ghi</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-left">
                    <li class="breadcrumb-item"><a href="{{ route('admin.supplier.index') }}">Quản lý nhà cung cấp</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm nhà cung cấp</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="card">
                <div class="container">


                    <section class="panel panel-default">
                        <div style="text-align: center; padding: 20px 0" class="panel-heading">
                            <h3 class="panel-title mg-auto font-italic"><u>Nhập thông tin</u></h3>
                        </div>
                        <div class="panel-body">

                            <form action="{{ route('admin.supplier.store') }}" method="POST" class="form-horizontal"
                                role="form">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Nhập tên nhà cung cấp:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                                            placeholder="Nhập tên nhà cung cấp...">
                                    </div>
                                    <div class="col-sm-9 mt-2 text-danger text-message"></div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Địa chỉ:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="address" id="address"
                                            autocomplete="off" placeholder="Nhập địa chỉ nhà cung cấp...">
                                    </div>
                                    <div class="col-sm-9 mt-2 text-danger text-message"></div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" id="email" autocomplete="off"
                                            placeholder="Nhập email...">
                                    </div>
                                    <div class="col-sm-9 mt-2 text-danger text-message"></div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Số điện thoại:</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control phone_number" name="phone_number"
                                            id="phone_number" autocomplete="off" placeholder="Nhập số điện thoại...">
                                    </div>
                                    <div class="col-sm-9 mt-2 text-danger text-message"></div>
                                </div>

                                <hr>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">

                                        <button type="submit" class="mr-4 btn btn-info btn-save">Lưu thông tin</button>

                                        <a href="{{ route('admin.supplier.index') }}">
                                            <button type="button" class="btn btn-danger">Thoát</button>
                                        </a>
                                    </div>
                                </div> <!-- form-group // -->
                            </form>

                        </div><!-- panel-body // -->
                    </section><!-- panel// -->


                </div> <!-- container// -->
            </div>

        </section>
    </div>
@stop
@section('script')
    <script>
        

        var btn_save = document.querySelector('.btn-save');
        btn_save.onclick = function(e) {
            e.preventDefault();

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
                    url: "{{ route('admin.supplier.store') }}",
                    method: "POST",
                    data: data,
                }).done(function(response){
                    if(response)
                    {
                        location.href = "{{ route('admin.supplier.index') }}"
                    }
                })


            }


        }

    </script>
@stop
