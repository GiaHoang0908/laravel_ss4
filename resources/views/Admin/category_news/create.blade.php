@extends('Layout.Backend.Master')

@section('title', 'Thêm danh mục tin tức')


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
                    <li class="breadcrumb-item"><a href="{{ route('admin.category_news.index') }}">Quản lý danh mục tin tức</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm danh mục tin tức</li>
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
                            <form action="{{ route('admin.category_news.store') }}" method="POST" class="form-horizontal"
                                role="form">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Nhập tên:</label>
                                    <div class="col-sm-9">
                                        <input onkeyup="ChangeToSlug(name)" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                            id="name" autocomplete="off" placeholder="Nhập tên...">
                                    </div>
                                    @error('name')
                                        <div style="margin: 0 15px;"  class="col-sm-6 alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div style="display: none;" class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Slug:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="slug" id="slug"
                                            placeholder="Nhập tên...">
                                    </div>
                                </div>




                                

                                <hr>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">

                                        <button type="submit" class="mr-4 btn btn-info ">Lưu thông tin</button>

                                        <a href="{{ route('admin.category_news.index') }}">
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


