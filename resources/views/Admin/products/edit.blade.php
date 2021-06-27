@extends('Layout.Backend.Master')

@section('title', 'Chỉnh sửa sản phẩm')

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
            <h3>Chỉnh sửa bản ghi</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-left">
                    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Quản lý sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa thông tin sản phẩm</li>
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
                            @if (Session::has('success-product_update'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session()->get('success-product_update') }}
                                </div>
                            @endif
                            @if (Session::has('error-product_update'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session()->get('error-product_update') }}
                                </div>
                            @endif
                            <form enctype="multipart/form-data" id="theform"
                                action="{{ route('admin.product.update', ['product' => $product->id]) }}" method="POST"
                                class="form-horizontal" role="form">

                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Nhập tên sản phẩm:</label>
                                    <div class="col-sm-9">
                                        <input onkeyup="ChangeToSlug(name)" type="text" class="form-control" name="name"
                                            value="{{ $product->name }}" id="name" autocomplete="off"
                                            placeholder="Nhập tên...">
                                    </div>
                                    @error('name')
                                        <div style="margin: 0 15px;" class="col-sm-6 alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div style="display: block;" class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Slug:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="slug" id="slug"
                                            value="{{ $product->slug }}" placeholder="Slug...">
                                    </div>
                                </div>

                                <div style="display: block;" class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Giá sản phẩm:</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control price" name="price"
                                            value="{{ $product->price }}" id="slug" required pattern="^-?[0-9][0-9,\.]+$"
                                            autocomplete="off" placeholder="Nhập giá sản phẩm...">
                                    </div>
                                </div>

                                <div style="display: block;" class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Số lượng:</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control price" name="amount"
                                            value="{{ $product->amount }}" id="slug" required pattern="[0-9]"
                                            autocomplete="off" placeholder="Nhập số lượng sản phẩm...">
                                    </div>
                                </div>

                                <div style="display: block;" class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Đã bán:</label>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control price" name="sold"
                                            value="{{ $product->sold }}" id="slug" required pattern="[0-9]"
                                            autocomplete="off" placeholder="Số lượng sản phẩm đã bán...">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Chọn ảnh:</label>
                                    <div class="col-sm-3">
                                        <label class="control-label small" for="file_img">Chọn ảnh:
                                            (jpg/png):</label> <input id="image" type="file" name="image">
                                    </div>
                                    <div class="col-sm-6">

                                        <img src='{{ asset("upload/image/product/$product->image") }}' id="showImage"
                                            style="display: block; " class="img-thumbnail" alt="Ảnh sản phẩm">
                                    </div>
                                </div>



                                <div class="form-group">

                                    @if (count($danhmuc) > 0)
                                        <label for="tech" class="col-sm-3 control-label">Danh mục:</label>
                                        <div class="col-sm-3">
                                            <select required name="category_id" class="form-control">
                                                <option value="">--Chọn giá trị--</option>


                                                @foreach ($danhmuc as $p)
                                                    @if ($p->parent_id == 0)
                                                        <option value=""
                                                            style="text-align: center; font-weight: bold; font-size: 18px"
                                                            disabled>{{ $p->name }}</option>
                                                    @else
                                                        <option @if ($product->category_id == $p->id) selected @endif
                                                            value="{{ $p->id }}">{{ $p->name }}</option>
                                                    @endif

                                                @endforeach

                                            </select>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="about" class="col-sm-3 control-label">Mô tả:</label>

                                    <div class="col-sm-9">
                                        <div id="full">
                                            {!! $product->desc !!}
                                        </div>
                                    </div>

                                </div>

                                <hr>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">

                                        <button type="submit" class="mr-4 btn btn-info ">Lưu thông tin</button>

                                        <a href="{{ route('admin.product.index') }}">
                                            <button type="button" class="btn btn-danger">Thoát</button>
                                        </a>
                                    </div>
                                </div> 
                            </form>

                        </div><!-- panel-body // -->
                    </section><!-- panel// -->


                </div> <!-- container// -->
            </div>

        </section>
    </div>
@stop

@section('script')

   
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#select2').select2({
                'placeholder': '  Chọn options',
            })

            $("#theform").on("submit", function() {
                var hvalue = $('.ql-editor').html();
                $(this).append("<textarea name='desc' style='display:none'>" + hvalue + "</textarea>");
            });

            $('.price').on('blur', function() {
                $(this).val(numeral($(this).val()).format('0,0'))
                // $(this).val(new Intl.NumberFormat('en-IN').format($(this).val()));
            })

            var toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                ['blockquote', 'code-block'],

                [{
                    'header': 1
                }, {
                    'header': 2
                }], // custom button values
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }], // superscript/subscript
                [{
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }], // outdent/indent
                [{
                    'direction': 'rtl'
                }], // text direction

                [{
                    'size': ['small', false, 'large', 'huge']
                }], // custom dropdown
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],

                [{
                    'color': []
                }, {
                    'background': []
                }], // dropdown with defaults from theme
                [{
                    'font': []
                }],
                [{
                    'align': []
                }],

                ['clean'], // remove formatting button
                ['image']
            ];

            var quill = new Quill('#full', {
                theme: 'snow',
                modules: {
                    toolbar: {
                        container: toolbarOptions,
                        handlers: {
                            image: imageHandler
                        }
                    }
                },
            });

            function imageHandler() {
                var range = this.quill.getSelection();
                var value = prompt('What is the image URL');
                if (value) {
                    this.quill.insertEmbed(range.index, 'image', value, Quill.sources.USER);
                }
            }
            $('#image').on('change', function() {
                var input = document.getElementById("image");
                var fReader = new FileReader();
                fReader.readAsDataURL(input.files[0]);
                fReader.onloadend = function(event) {
                    var img = document.getElementById("showImage");
                    img.src = event.target.result;
                }
                document.getElementById("showImage").style.display = 'block';
            })


        });

    </script>
@stop
