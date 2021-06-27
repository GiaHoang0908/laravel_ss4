@extends('Layout.Backend.Master')

@section('title', 'Chi tiết đơn hàng')

@section('style')
    <style>
        .cards.active {
            border: 1px solid orangered;
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

    </style>
@stop

@section('content')
    <div class="main-content container-fluid">

        <div class="page-title">
            <h3>Chi tiết hóa đơn</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-left">
                    <li class="breadcrumb-item"><a href="{{ route('admin.salesinvoice.index') }}">Quản lý đơn hàng</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="card">

                <div class="container">

                    <div class="card-body">
                        <h5 class="mb-4">Thông tin khách hàng:</h5>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Người nhận hàng:</label>
                            <div class="col-sm-10 col-form-label">
                                <p>{{ $cthoadon[0]->salesInvoice->name }}</p>
                            </div>
                        </div>
                        <div class=" row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Ngày đặt hàng:</label>
                            <div class="col-sm-10 col-form-label">
                                <p>{{ $cthoadon[0]->salesInvoice->created_at }}</p>

                            </div>
                        </div>
                        <div class=" row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Số điện thoại:</label>
                            <div class="col-sm-10 col-form-label">
                                <p>{{ $cthoadon[0]->salesInvoice->phone_number }}</p>
                            </div>
                        </div>
                        <div class=" row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Địa chỉ:</label>
                            <div class="col-sm-10 col-form-label">
                                <p>{{ $cthoadon[0]->salesInvoice->address }}</p>
                            </div>
                        </div>
                        <div class=" row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Email:</label>
                            <div class="col-sm-10 col-form-label">
                                <p>{{ Auth::user()->email }} </p>
                            </div>
                        </div>
                        <div class=" row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Ghi chú:</label>
                            <div class="col-sm-10 col-form-label">
                                <p>{{ $cthoadon[0]->salesInvoice->note }}</p>
                            </div>
                        </div>
                        <div class="btn btn-success btn-update-info" data-id="{{ $cthoadon[0]->salesInvoice->id }}"
                            data-toggle="modal" data-target="#staticBackdrop">Thay đổi thông tin
                        </div>
                    </div>
                    <hr>

                    <div class=" card-body">
                        <button class="btn btn-success mb-4 btn-showAll show-products"
                            data-id="{{ $cthoadon[0]->salesInvoice->id }}" data-toggle="modal"
                            data-target="#exampleModal-add">Thêm sản phẩm</button>
                        <table class='table table-bordered ' id="table1">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Gia tiền</th>
                                    <th class="text-right" style="border-right: none; text-align: right; width: 10px;">
                                        Action
                                    </th>
                                    <th class="text-right" style="border-left: none; color: #fff !important; width: 10px;">
                                        action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; ?>
                                @foreach ($cthoadon as $p)
                                    <tr>
                                        <td>{{ $stt++ }}</td>
                                        <td>{{ $p->product[0]->name }}</td>
                                        <td>{{ $p->quantity }}</td>
                                        <td>{{ number_format($p->price) }}đ</td>
                                        <td>
                                            <div data-id="{{ $p->id }}" data-toggle="modal"
                                                data-target="#exampleModal-edit" class="btn-trash"><i
                                                    class="btn btn-edit btn-primary far fa-edit"></i></div>
                                            <div class="card mt-2 message" style="position:absolute; width: 8rem;">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Chỉnh sửa</li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <div data-id="{{ $p->id }}" data-toggle="modal"
                                                data-target="#exampleModal-delete" class="btn-delete" href=""><i
                                                    class="btn btn-danger fas fa-trash-alt"></i></div>
                                            <div class="card mt-2 message1" style="position:absolute; width: 6rem;">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Xóa </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <td colspan="4"><b>Tổng tiền</b></td>
                                <td colspan="2" class="text-danger">
                                    {{ number_format($cthoadon[0]->salesInvoice->total_price) }}đ</td>
                            </tfoot>
                        </table>
                    </div>
                    <div class=" card-body">

                        <nav class="navbar navbar-light bg-light">
                            <a href="{{ route('admin.pdf', ['id' => $cthoadon[0]->salesInvoice->id]) }}"
                                class="d-flex justify-content-start btn btn-success mb-2">Xuất hóa đơn</a>
                            <div class=" justify-content-end">
                                <form
                                    sction="{{ route('admin.salesinvoice.update', ['salesinvoice' => $cthoadon[0]->salesInvoice->id]) }}"
                                    method="POST" class="d-flex justify-content-end">
                                    @csrf
                                    @method('PUT')
                                    <a class="navbar-brand fw-normal">Trạng thái giao hàng:</a>

                                    <select name="status" class="form-select">

                                        <option value="Chưa xử lý" <?php check($cthoadon[0]->
                                            salesInvoice->status, 'Chưa xử lý'); ?> >Chưa xử lý</option>
                                        <option value="Chờ lấy hàng" <?php check($cthoadon[0]->
                                            salesInvoice->status, 'Chờ lấy hàng'); ?>>Chờ lấy hàng</option>
                                        <option value="Đang giao" <?php check($cthoadon[0]->
                                            salesInvoice->status, 'Đang giao'); ?>>Đang giao</option>
                                        <option value="Đã giao" <?php check($cthoadon[0]->
                                            salesInvoice->status, 'Đã giao'); ?>>Đã giao</option>
                                    </select>
                                    <button class="btn btn-outline-primary" type="submit">Lưu</button>
                                </form>
                            </div>
                        </nav>
                    </div>


                </div>

            </div>

        </section>
    </div>

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Người nhận hàng: </label>
                        <input type="text" class="form-control" id="infor_name" value="" />
                        <div class="infor_name text-danger"></div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại: </label>
                        <input type="text" class="form-control phone_number" id="infor_phone" value="" />
                        <div class="infor_phone text-danger"></div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ: </label>
                        <input type="text" class="form-control" id="infor_address" value="" />
                        <div class="infor_address text-danger"></div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Ghi chú: </label>
                        <textarea type="text" class="form-control" id="infor_note"></textarea>

                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary btn-save-info">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-edit" action="">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm: </label>
                            <input type="text" disabled class="form-control" id="edit_name" value="" />
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng: </label>
                            <input type="text" min="1" class="form-control" id="edit_quantity" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary btn-update">Lưu thay đổi.</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông báo:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-edit" action="">

                        <div class="form-group">
                            Bạn có chắc muốn xóa sản phẩn này trong hóa đơn không?

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-danger btn-destroy">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Danh sách sản phẩm:</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="form-inline form-search my-2 my-lg-0 mb-2">
                        <input class="form-control mr-sm-2 search" type="search" placeholder="Tìm kiếm..."
                            aria-label="Search">
                    </form>
                    <div class="container">
                        <div class="products row">

                        </div>
                    </div>
                    <button onclick="add()" type="button" class="btn btn-success btn-card">Thêm</button>
                    <div class="cart">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="d-none btn btn-primary submit addListDetailSalesInvoice">Lưu
                        thay đổi</button>
                </div>
            </div>
        </div>
    </div>
@stop
<?php function check($status, $str)
{
if ($status == $str) {
echo 'selected';
} else {
echo '';
}
} ?>

@section('script')
    <script>
        function validate(name, min, max, emails) {
            var inputElement = document.querySelector(name)
            var messageElement = inputElement.parentElement.querySelector('.text-danger')

            if (inputElement.value == "") {
                messageElement.textContent = "Vui lòng nhập trường này";
                return false;
            } else {
                if (inputElement.type == 'email') {
                    var regexEmail = /^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/gm
                    if (!inputElement.value.match(regexEmail)) {
                        messageElement.textContent = "Email chưa đúng định dạng.";
                        return false;
                    }

                    var bool = emails.find(function(obj) {
                        return obj == inputElement.value;
                    })

                    if (bool) {
                        messageElement.textContent = "Email đã tồn tại.";
                        return false;
                    }
                }
                if (inputElement.type == "password") {
                    if (inputElement.value.length < min) {
                        messageElement.textContent = "Mật khẩu tối thiểu " + min + " ký tự";
                        return false;
                    }
                    if (inputElement.classList.contains('password')) {
                        if (inputElement.value.length > max) {
                            messageElement.textContent = "Mật khẩu tối đa " + max + " ký tự";
                            return false;
                        }
                    }
                }
                if (inputElement.classList.contains('confirmpassword')) {
                    if (inputElement.value != document.getElementById('re_password').value) {
                        messageElement.textContent = "Mật khẩu nhập lại chưa chính xác.";
                        return false;
                    }
                }
                if (inputElement.classList.contains('phone_number')) {
                    var regexPhoneNumber = /(84|0[3|5|7|8|9])+([0-9]{8})\b/g
                    if (!inputElement.value.match(regexPhoneNumber)) {
                        messageElement.textContent = "Số điện thoại chưa đúng định dạng.";
                        return false;
                    }
                }
                messageElement.textContent = "";
                return true;
            }
        }

        var id;
        $('#staticBackdrop').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            id = button.data('id');
            var messege = document.querySelectorAll('.text-danger');
            $.each(messege, function() {
                $(this).text('');
            })
        })

        var data;

        document.querySelector('.btn-update-info').onclick = function() {
            $.ajax({
                url: `/api/SalesInvoice/${id} `,
                method: 'GET',

            }).done(function(response) {
                data = response;
                $('#infor_name').val(response.name)
                $('#infor_phone').val(response.phone_number)
                $('#infor_address').val(response.address)
                $('#infor_note').val(response.note)
            })
        }

        document.querySelector('.btn-save-info').onclick = function() {

            if (validate('#infor_name') && validate('#infor_phone') && validate('#infor_address')) {
                $.ajax({
                    url: `/api/SalesInvoice/${id}`,
                    method: "PUT",
                    data: {
                        update_info: '',
                        name: $('#infor_name').val(),
                        phone_number: $('#infor_phone').val(),
                        address: $('#infor_address').val(),
                        note: $('#infor_note').val(),
                    }
                }).done(function(response) {
                    if (response) {
                        location.reload();
                    }
                })
            }
        }


        var product;
        var detail;
        var btn_edits = document.querySelectorAll('.btn-trash');
        $.each(btn_edits, function(i, element) {
            element.onclick = function() {
                $.ajax({
                    url: `/api/DetailSalesInvoice/${$(this).data('id')}`,
                    method: 'GET',
                }).done(function(response) {
                    detail = response;
                    $.ajax({
                        url: `/api/Product/${detail.product_id}`,
                        method: 'GET',
                    }).done(function(response) {
                        product = response;
                        $('#edit_name').val(product.name);
                        $('#edit_quantity').val(detail.quantity);
                    })
                })

            }
        })
        $('#edit_quantity').keydown(function(e) {
            if (!((e.keyCode > 95 && e.keyCode < 106) ||
                    (e.keyCode > 47 && e.keyCode < 58) ||
                    e.keyCode == 8)) {
                return false;
            }

        })
        $('#edit_quantity').keyup(function() {
            $(this).val(($(this).val() * 1).toString())
        })

        document.querySelector('.btn-update').onclick = function() {
            var edit_quantity = ~~$('#edit_quantity').val();

            if (typeof(edit_quantity) == 'number') {
                if (edit_quantity < 1) {
                    alert("Số lượng được thay đổi tối thiểu là 1")
                    $('#edit_quantity').val(1)
                } else if (edit_quantity > (product.amount + detail.quantity)) {
                    alert(
                        `Số lượng bạn đang nhập lớn hơn số lượng còn lại trong kho(Số lượng trong kho còn lại: ${product.amount}).`);
                    return false;
                }
                console.log($('#edit_quantity').val())


                $.ajax({
                    url: `/api/DetailSalesInvoice/${detail.id}`,
                    method: 'PUT',
                    data: {
                        'edit': true,
                        'quantity': ~~$('#edit_quantity').val(),
                        'price': ~~$('#edit_quantity').val() * product.price,
                    }
                }).done(function(response) {
                    if (response) {
                        location.reload();
                    }
                })
            } else {
                alert('Không đúng định dạng')
            }
        }
        var btn_deletes = document.querySelectorAll('.btn-delete');
        var data_id
        $.each(btn_deletes, function(i, element) {
            element.onclick = function() {
                data_id = $(this).data('id');
            }
        })

        var btn_destroy = document.querySelectorAll('.btn-destroy')
        $.each(btn_destroy, function(i, element) {
            element.onclick = function() {
                $.ajax({
                    url: `/api/DetailSalesInvoice/${data_id}`,
                    method: 'PUT',
                    data: {
                        'delete': true,
                    }
                }).done(function(response) {
                    if (response) {
                        location.reload();
                    }
                })
            }
        })
    </script>
    <script>
        $('.btn-showAll').click(function() {

            $.ajax({
                method: 'GET',
                url: `/api/DetailSalesInvoice/`,
                data: {
                    'salesInvoice_id': $(this).data('id')
                }
            }).done(function(response) {
                var ProductsalesInvoice = response;
                $.ajax({
                    method: 'GET',
                    url: `/api/Product/`,

                }).done(function(response) {
                    var products = response;
                    var arr = []
                    for (var i = 0; i < ProductsalesInvoice.length; i++) {
                        for (var j = 0; j < products.length; j++) {
                            if (products[j].id == ProductsalesInvoice[i].product_id) {

                                products.splice(j, 1)
                            }
                        }
                    }
                    console.log(products)
                    var html = "";
                    for (var i = 0; i < products.length; i++) {
                        html += `<div class="card cards col col-sm-3" data-id="${products[i].id}" data-amount="${products[i].amount}" data-name="${products[i].name}" style="width: 14rem; margin: 16px; padding: -16px">
                                                                            <img  class="card-img-top" style="height: 200px" src="{{ asset('upload/image/product/') }}/${products[i].image}" alt="Card image cap">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">${products[i].name}</h5>
                                                                            </div>
                                                                         </div>`;
                    }
                    $('.products').html(html)
                    var cards = document.querySelectorAll('.cards')
                    var btn_card = document.querySelector('.btn-card')

                    cards.forEach(function(element) {
                        if (element) {

                            element.onclick = function() {
                                var active = document.querySelector('.cards.active')
                                if (active) {
                                    active.classList.remove('active')
                                }
                                this.classList.add('active')
                                btn_card.setAttribute('onclick',
                                    `add(${this.getAttribute('data-id')})`)
                            }
                        }
                    })
                    var s = document.querySelector('.search')
                    s.addEventListener('keyup', function() {
                        var cards = document.querySelectorAll('.cards')
                        cards.forEach(function(element) {
                            if (element) {
                                var name = element.getAttribute('data-name').trim()
                                if (name.trim().toLowerCase().match(s.value.trim()
                                        .toLowerCase())) {
                                    element.classList.remove('d-none')

                                } else {
                                    element.classList.add('d-none')
                                }
                            }
                        })
                    })
                    var cart = [];

                })
            })
        })
        var cart = [];

        function add(id) {
            if (id) {
                $.ajax({
                    method: 'GET',
                    url: `/api/Product/${id} `,
                }).done(function(response) {

                    var html = ""

                    var bool = cart.find(function(val) {
                        return val.id == response.id
                    })
                    if (bool) {

                        cart.forEach(function(val) {

                            if (val.id == response.id) {
                                if (val.amount == response.amount) {
                                    alert("Xin lỗi bạn chỉ có thể mua tối đa " + response.amount +
                                        " sản phẩm.")
                                } else {

                                    val.amount += 1;
                                    val.quantity += 1;
                                    val.price = val.quantity * response.price;
                                }
                            }
                        })
                    } else {
                        cart.push({
                            id: response.id,
                            name: response.name,
                            quantity: 1,
                            amount: 1,
                            price: response.price
                        })

                    }
                    var html
                    for (var i = 0; i < cart.length; i++) {
                        html += `<table class="mt-2 table table-bordered">
                                                                <tbody>
                                                                    <tr id="${cart[i].id}">
                                                                        <td style="flex: 1">${cart[i].name}</td>
                                                                        <td style="width: 200px"><input style="border: none; outline: none; "  class="quantity " data-id="${cart[i].id}" type="text" value="${cart[i].quantity}"></td>
                                                                        <td style="width: 100px"><button class="delete btn btn-danger" data-id="${cart[i].id}">Xóa</button><br></td>
                                                                    </tr>
                                                                </tbody>
                                                              </table>`
                    }
                    $('.cart').html(html)

                    var quantity = document.querySelectorAll('.quantity')
                    quantity.forEach(function(element) {
                        element.onkeyup = function() {
                            var value = $(this).val();
                            var id = this.getAttribute('data-id')
                            if (~~value < 1) {
                                $(this).val('')
                            }
                        }
                        element.onblur = function() {
                            var value = $(this).val();
                            var id = this.getAttribute('data-id')
                            if (~~value > response.amount) {
                                $(this).val(response.amount)
                                value = $(this).val();
                                alert("Xin lỗi bạn chỉ có thể mua tối đa " + response.amount +
                                    " sản phẩm.")
                            }

                            cart.forEach(function(val) {
                                if (val.id == ~~id) {
                                    val.quantity = ~~value;
                                    val.price = ~~value * response.price;
                                    val.amount = ~~value
                                }
                            })

                        }
                    })
                    var deletes = document.querySelectorAll('.delete')
                    deletes.forEach(function(element) {
                        if (element) {
                            element.onclick = function() {
                                cart.forEach(function(val, i) {
                                    if (val.id == ~~element.getAttribute('data-id')) {
                                        cart.splice(i, 1);
                                        $('#' + val.id).empty();
                                        if (cart.length == 0) {
                                            $('.submit').addClass('d-none')
                                        }
                                    }
                                })
                            }
                        }
                    })

                    $('.submit').removeClass('d-none')

                })

            } else {
                alert("Bạn chưa chọn sản phẩm nào.")
            }
        }
        var quantity = 0;
        var price = 0;
        document.querySelector('.addListDetailSalesInvoice').onclick = function() {
            for (var i = 0; i < cart.length; i++) {
                price += cart[i].price;
                quantity += cart[i].quantity;
                $.ajax({
                    method: "POST",
                    url: "/api/DetailSalesInvoice",
                    data: {
                        sales_invoice_id: $('.btn-showAll').data('id'),
                        product_id: cart[i].id,
                        quantity: cart[i].quantity,
                        price: cart[i].price
                    }
                }).done(function(response) {
                    if (response) {
                        $.ajax({
                            method: "PUT",
                            url: `/api/Product/${cart[i].id}`,
                            data: {
                                quantity: cart[i].quantity,
                            }
                        })
                    }
                })

            }
            for (var i = 0; i < cart.length; i++) {
                $.ajax({
                    method: "PUT",
                    url: `/api/Product/${cart[i].id}`,
                    data: {
                        quantity: cart[i].quantity,
                    }
                })
            }
            $.ajax({
                method: "GET",
                url: `/api/SalesInvoice/${$('.btn-showAll').data('id')}`
            }).done(function(response) {
                $.ajax({
                    method: "PUT",
                    url: `/api/SalesInvoice/${$('.btn-showAll').data('id')}`,
                    data: {
                        "status": response.status,
                        "prepayment": "0",
                        "total_quantity": response.total_quantity + quantity,
                        "total_price": response.total_price + price,
                        "name": response.name,
                        "address": response.address,
                        "phone_number": response.phone_number,
                        "note": response.note,
                        "order_date": response.order_date,
                        "user_id": response.user_id,
                    }
                }).done(function(response) {

                    location.reload()
                })


            })
        }
    </script>
@stop
