@extends('Layout.Backend.Master')

@section('title', 'Thêm danh mục')

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
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/quill/quill.bubble.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/quill/quill.snow.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

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
                    <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Quản lý danh mục</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa danh mục</li>
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
                            @if (Session::has('success-category_update'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session()->get('success-category_update') }}
                                </div>
                            @endif

                            <form action="{{ route('admin.category.update', ['category' => $cat->id]) }}" method="POST"
                                class="form-horizontal" role="form">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Nhập tên:</label>
                                    <div class="col-sm-9">
                                        <input onkeyup="ChangeToSlug(name)" type="text" class="form-control" name="name"
                                            value="{{ $cat->name }}" id="name" autocomplete="off"
                                            placeholder="Nhập tên...">
                                    </div>
                                    @error('name')
                                        <div style="margin: 0 15px;" class="col-sm-6 alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    @if (Session::has('error-category_update'))
                                        <div style="margin: 0 15px;" class="alert alert-danger" role="alert">
                                            {{ Session()->get('error-category_update') }}
                                        </div>
                                    @endif
                                </div>

                                <div style="display: block;" class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Slug:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="slug" id="slug"
                                            placeholder="Nhập tên..." value="{{ $cat->slug }}">
                                    </div>
                                </div>




                                <div class="form-group">
                                    @if (count($parent) > 0)
                                        <label for="tech" class="col-sm-3 control-label">Danh mục cha:</label>
                                        <div class="col-sm-3">
                                            <select name="parent_id" class="form-control">
                                                <option value="0">--Chọn giá trị--</option>
                                                @foreach ($parent as $p)
                                                    <option @if ($p->id == $cat->parent_id) selected @endif value="{{ $p->id }}">
                                                        {{ $p->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                </div> <!-- form-group // -->

                                <hr>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">

                                        <button type="submit" class="mr-4 btn btn-info ">Lưu thông tin</button>

                                        <a href="{{ route('admin.category.index') }}">
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


