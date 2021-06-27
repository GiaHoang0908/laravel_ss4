@extends('Layout.Backend.Master')

@section('title', 'Danh sách người dùng')


@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Thêm bản ghi</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-left">
                    <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Quản lý người dùng</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quyền người dùng</li>
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

                            <form action=" {{ route('admin.user.updateRole', ['user' => $user->id]) }} " method="POST"
                                role="form">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label ">Chọn quyền người dùng:</label>
                                    @foreach ($roles as $role)
                                        <?php $checked = in_array($role->name, $role_assignments) ? 'checked'
                                        : 'abc'; ?>
                                        <div class="form-check">
                                            <input name="role[]" value="{{ $role->id }}" class="form-check-input"
                                                type="checkbox" {{ $checked }}>
                                            <label class="form-check-label" for="disabledFieldsetCheck">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                <hr>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">

                                        <button type="submit" class="mr-4 btn btn-info ">Lưu thông tin</button>

                                        <a href="{{ route('admin.user.index') }}">
                                            <button type="button" class="btn btn-danger">Thoát</button>
                                        </a>
                                    </div>
                                </div> 
                            </form>

                        </div>
                    </section>


                </div>
            </div>

        </section>
    </div>

@endsection
