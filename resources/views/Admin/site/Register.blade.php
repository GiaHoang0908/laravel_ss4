@extends('Layout.Backend.Auth')

@section('title', 'Register Page')

@section('content')
    <div class="card pt-4">
        <div class="card-body">
            <div class="text-center mb-5">
                <img src="assets/images/favicon.svg" height="48" class='mb-4'>
                <h3>Đăng ký</h3>
                <p>Vui lòng điền đầy đủ thông tin.</p>
            </div>
            @if(Session::has('error-post_register'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('error-post_register') }}
                </div>
            @endif
            @if(Session::has('success-post_register'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('success-post_register') }}
                </div>
            @endif

            <form action="{{ route('auth.post_register') }}" method="POST">
                @csrf
                <div class="row">

                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="username-column">Tên tài khoản:</label>
                            <input type="text" value="{{ old('name') }}" id="username-column" class="form-control" name="name">
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="email-id-column">Địa chỉ email:</label>
                            <input type="text" value="{{ old('email') }}" id="email-id-column" class="form-control" name="email" >
                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="country-floating">Mật khẩu:</label>
                            <input type="password" id="country-floating" class="form-control" name="password">
                            @error('password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label for="company-column">Nhập lại mật khẩu:</label>
                            <input type="password" id="company-column" class="form-control" name="confirm-password">
                            @error('confirm-password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </diV>

                <a href="{{ route('auth.login') }}"><u><i>Đăng nhập <i style="transform: rotate(90deg);"
                                class="ml-1 fas fa-arrow-up"></i></i></u></a>
                <div class="clearfix">
                    <button class="btn btn-primary float-right">Đăng ký</button>
                </div>
            </form>
            <!-- <div class="divider">
                        <div class="divider-text">OR</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <button class="btn btn-block mb-2 btn-primary"><i data-feather="facebook"></i>
                                Facebook</button>
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-block mb-2 btn-secondary"><i data-feather="github"></i>
                                Github</button>
                        </div>
                    </div> -->
        </div>
    </div>
@stop
