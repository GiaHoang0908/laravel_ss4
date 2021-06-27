@extends('Layout.Backend.Auth')

@section('title', 'Login Page')

@section('content')
    <div class="card pt-4">
        <div class="card-body">
            <div class="text-center mb-5">
                <img src="{{ asset('admin/assets/images/favicon.svg') }}" height="48" class='mb-4'>
                <h3>Đăng nhập</h3>
                <p>Vui lòng đăng nhập để tiếp tục</p>
            </div>
            @if (Session::has('success-post_login'))
                <div class="alert alert-success" role="alert">
                    {{ Session()->get('success-post_login') }}
                </div>
            @endif
            @if (Session::has('error-post_login'))
                <div class="alert alert-danger" role="alert">
                    {{ Session()->get('error-post_login') }}
                </div>
            @endif
            <form action="{{ route('auth.post_login') }}" method="POST">
                @csrf
                <div class="form-group position-relative has-icon-left">
                    <label for="username">Email:</label>
                    <div class="position-relative">
                        <input type="text" class="form-control" id="username" name="email" value="@if (Session::has('re-email')) {{ Session()->get('re-email') }} @endif">

                        <div class="form-control-icon">
                            <i data-feather="user"></i>
                        </div>
                    </div>
                    @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group position-relative has-icon-left">
                    <div class="clearfix">
                        <label for="password">Mật khẩu:</label>
                    </div>
                    <div class="position-relative ">
                        <input id="password" type="password" class="form-control" name="password">
                        <div class="form-control-icon">
                            <i data-feather="lock"></i>
                        </div>


                    </div>
                    @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class='form-check clearfix my-4'>
                    <div class="checkbox float-left">
                        <input type="checkbox" id="checkbox1" class='form-check-input' name="remember">
                        <label for="checkbox1">Lưu thông tin</label>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('auth.register') }}"><u><i>Đăng ký tài khoản <i
                                        style="transform: rotate(90deg);" class="ml-1 fas fa-arrow-up"></i></i></u></a>
                    </div>
                </div>
                <div class="clearfix">
                    <button class="btn btn-primary float-right">Đăng nhập</button>
                </div>
            </form>

        </div>
    </div>
@stop
<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

</script>
