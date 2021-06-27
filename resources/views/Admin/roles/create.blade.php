@extends('Layout.Backend.Master')

@section('title', 'Danh sách các quyền')

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Thêm bản ghi</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-left">
                    <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">Quản lý quyền</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm quyền</li>
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

                            <form ng-app="role" ng-controller="roleController" action=" {{ route('admin.role.store') }} "
                                method="POST" role="form">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label ">Tên quyền:</label>
                                    <input placeholder="Role name..." type="text" class="form-control col-sm-6"
                                        autocomplete="off" name="name">
                                </div>
                                <div class="mb-3">

                                    <label class="form-label">Các trang được truy cập:</label>
                                    <div class="mb-3">
                                        <input ng-model="srole" placeholder="Tìm kiếm..." type="text" autocomplete="off"
                                            class="form-control col-sm-6">
                                    </div>
                                    <div style="height: 260px; border: 1px solid #e5e5e5" class="overflow-auto px-4">
                                        <div class="form-check " ng-repeat="r in roles | filter:srole">
                                            <input name="route[]" value="@{{ r }}" class="form-check-input"
                                                type="checkbox">
                                            <label class="form-check-label" for="disabledFieldsetCheck">
                                                @{{ r }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkAll">
                                    <label class="form-check-label">Check all</label>
                                </div>


                               <hr>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">

                                        <button type="submit" class="mr-4 btn btn-info ">Lưu thông tin</button>

                                        <a href="{{ route('admin.role.index') }}">
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




@stop

@section('script')

    <script>
        var app = angular.module('role', []);

        app.controller('roleController', function($scope) {
            var roles = '<?php echo json_encode($routes); ?>'

            $scope.roles = angular.fromJson(roles)

        })

        $("#checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

    </script>
@stop
