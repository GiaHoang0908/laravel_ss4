@extends('Layout.Backend.Master')

@section('title', 'Thêm tin tức')


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
                    <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">Quản lý tin tức</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm tin tức</li>
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

                            <form enctype='multipart/form-data' id="theform" action="{{ route('admin.news.store') }}"
                                method="POST" class="form-horizontal" role="form">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Nhập tiêu đề tin :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title') }}" id="name" autocomplete="off"
                                            placeholder="Nhập tiêu đề...">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">Chọn ảnh:</label>
                                    <div class="col-sm-3">
                                        <label class="control-label small" for="file_img">Chọn ảnh:
                                            (jpg/png):</label> <input required id="image" type="file" name="image">
                                    </div>
                                    <div class="col-sm-6">

                                        <img src="" id="showImage" style="display: none; "
                                            class="img-thumbnail" alt="Ảnh sản phẩm">
                                    </div>
                                </div>

                                <div class="form-group">
                                    @if (count($models) > 0)
                                        <label for="tech" class="col-sm-3 control-label">Danh mục tin tức:</label>
                                        <div class="col-sm-3">
                                            <select required name="category_news_id" class="form-control">
                                                <option value="">--Chọn giá trị--</option>


                                                @foreach ($models as $p)

                                                    <option @if (old('category_news_id') == $p->id) selected @endif value="{{ $p->id }}">
                                                        {{ $p->name }}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="about" class="col-sm-3 control-label">Mô tả:</label>

                                    <div class="col-sm-9">
                                        <div id="full">
                                            
                                        </div>
                                    </div>

                                </div>

                                <hr>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">

                                        <button type="submit" class="mr-4 btn btn-info ">Lưu thông tin</button>

                                        <a href="{{ route('admin.news.index') }}">
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
        $(document).ready(function() {
            

            $("#theform").on("submit", function() {
                var hvalue = $('.ql-editor').html();
                $(this).append("<textarea name='desc' style='display:none'>" + hvalue + "</textarea>");
            });

          

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
