@extends('Layout.Backend.Master')

@section('title', 'Thêm hóa đơn')

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
            <h3>Thêm hóa đơn nhập</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-left">
                    <li class="breadcrumb-item"><a href="{{ route('admin.importinvoice.index') }}">Quản lý hóa đơn
                            nhập</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm hóa đơn</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="card">
                <div class="container">
                    <div class=" card-body">
                        <button class="btn btn-success mb-4 btn-showAll show-products" data-toggle="modal"
                            data-target="#exampleModal-add">Thêm sản phẩm</button>
                        <table class='table table-bordered ' id="table1">
                            <thead>
                                <tr>

                                    <th>Tên Sản Phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá tiền</th>
                                    <th class="text-center" style="border-right: none; text-align: right; width: 10px;">
                                        Action
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="body_table">

                            </tbody>
                            <tfoot class="foot_table">

                            </tfoot>
                        </table>
                    </div>
                    <div class=" card-body">

                        <nav class="navbar navbar-light bg-light">

                            <div class=" justify-content-end">
                                <form action="" method="POST" class="d-flex justify-content-end">
                                    @csrf
                                    @method('PUT')
                                    <a class="navbar-brand fw-normal">Nhà cung cấp:</a>

                                    <select name="supplier" class="form-select">
                                        @foreach ($supplier as $i)
                                            <option value="{{ $i->id }}">{{ $i->name }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-outline-primary btn-save" type="submit">Lưu</button>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>

            </div>

        </section>
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
                    <form class="container form-inline form-search my-2 my-lg-0 mb-2">
                        <input class="form-control mr-sm-2 search" type="search" placeholder="Tìm kiếm..."
                            aria-label="Search">
                        <a class="btn btn-success" href="{{ route('admin.product.create') }}">Thêm Sản Phẩm Mới</a>
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
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Đóng</button>
                    <button type="button" class="d-none btn btn-primary submit addListDetailSalesInvoice">Lưu
                        thay đổi</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        var response;
        var cart = [];
        var newCart = [];
        $('.btn-showAll').click(function() {
            localStorage.setItem('tmp', JSON.stringify(newCart))
            cart = JSON.parse(localStorage.getItem('tmp'));
            var html_cart = '';
            for (var i = 0; i < newCart.length; i++) {
                html_cart += `<table class="mt-2 table table-bordered">
                                                            <tbody>
                                                                <tr id="${newCart[i].id}">
                                                                    <td style="flex: 1">${newCart[i].name}</td>
                                                                    <td style="width: 200px"><input style="border: none; outline: none; "  class="quantity " data-id="${newCart[i].id}" type="text" value="${newCart[i].quantity}"></td>
                                                                    <td style="width: 100px"><button class="delete btn btn-danger" data-id="${newCart[i].id}">Xóa</button><br></td>
                                                                </tr>
                                                            </tbody>
                                                          </table>`
            }
            $('.cart').html(html_cart)
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


                    cart.forEach(function(val) {
                        if (val.id == ~~id) {
                            val.quantity = ~~value;
                            val.price = ~~value * response.price;
                            val.amount = ~~value
                        }
                    })
                    newCart = JSON.parse(localStorage.getItem('tmp'))
                    console.log(newCart)

                }
            })
            var deletes = document.querySelectorAll('.delete')
            deletes.forEach(function(element) {
                if (element) {
                    element.onclick = function() {
                        cart.forEach(function(val, i) {
                            if (val.id == ~~element.getAttribute('data-id')) {
                                cart.splice(i, 1);
                                $('#' + val.id).remove();
                                $('.element-' + val.id).remove();

                                if (newCart.length == 0) {
                                    $('.submit').addClass('d-none')
                                    $('.foot_table').empty();
                                    console.log($('.foot_table'))
                                }
                            }
                        })
                    }
                }
            })

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


                })
            })
        })


        function add(id) {
            if (id) {
                $.ajax({
                    method: 'GET',
                    url: `/api/Product/${id} `,
                }).done(function(data) {
                    response = data;
                    var html = ""
                    var bool = cart.find(function(val) {
                        return val.id == response.id
                    })
                    if (bool) {
                        cart.forEach(function(val) {
                            if (val.id == response.id) {
                                val.amount += 1;
                                val.quantity += 1;
                                val.price = val.quantity * response.price;
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
                                        $('#' + val.id).remove();
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
        var total_quantity = 0;
        var total_price = 0;
        document.querySelector('.addListDetailSalesInvoice').onclick = function() {
            if (cart.length > 0) {

                var quantity = 0;
                var price = 0;
                $('#exampleModal-add').modal('hide');
                var html
                for (var i = 0; i < cart.length; i++) {
                    quantity += cart[i].quantity;
                    price += cart[i].price;
                    html += `<tr class="element-${cart[i].id}">
                                    <td>${cart[i].name}</td>
                                    <td style="width: 200px"><input style="border: none; outline: none;"  class="quantity " data-id="${cart[i].id}" type="text" value="${cart[i].quantity}"></td>
                                    <td>${cart[i].price}</td>
                                    <td style="width: 100px"><button class="delete1 btn btn-danger" data-id="${cart[i].id}">Xóa</button><br></td>
                                </tr>`

                }
                total_price = price;
                total_quantity = quantity;
                var foot = "";
                foot += `<tr>
                                    <th>Tổng số lượng và giá tiền</th>
                                    <td class="text-center" style="border-right">${total_quantity}</td>
                                    <td class="text-center" style="border-right" colspan="2">${total_price}</td>
                                </tr>`
                $('.body_table').html(html)
                $('.foot_table').html(foot)
                var deletes = document.querySelectorAll('.delete1')

                newCart = cart;

                deletes.forEach(function(element) {
                    if (element) {
                        element.onclick = function() {
                            cart.forEach(function(val, i) {
                                if (val.id == ~~element.getAttribute('data-id')) {
                                    cart.splice(i, 1);

                                    $('.element-' + val.id).remove();
                                    $('#' + val.id).remove();
                                    document.querySelector('.addListDetailSalesInvoice').click();
                                    newCart = cart;
                                    if (cart.length == 0) {
                                        $('.submit').addClass('d-none')
                                        $('.foot_table').empty();
                                    }
                                }
                            })
                        }
                    }
                })

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


                        cart.forEach(function(val) {
                            if (val.id == ~~id) {
                                val.quantity = ~~value;
                                val.price = ~~value * response.price;
                                val.amount = ~~value
                            }
                        })
                        document.querySelector('.addListDetailSalesInvoice').click();
                        newCart = cart;

                    }
                })
            } else {
                newCart = cart;
                $('#exampleModal-add').modal('hide');
                $('.foot_table').empty();
            }

        }
        $("#exampleModal-add").on('hide.bs.modal', function() {
            localStorage.removeItem('tmp')
            render()

        });

        function render() {

            var quantity = 0;
            var price = 0;
            var html
            for (var i = 0; i < newCart.length; i++) {
                quantity += newCart[i].quantity;
                price += newCart[i].price;
                html += `<tr class="element-${newCart[i].id}">
                                   
                                    <td>${newCart[i].name}</td>
                                    <td style="width: 200px"><input style="border: none; outline: none; "  class="quantity " data-id="${newCart[i].id}" type="text" value="${newCart[i].quantity}"></td>
                                    <td>${newCart[i].price}</td>
                                    <td style="width: 100px"><button class="delete1 btn btn-danger" data-id="${newCart[i].id}">Xóa</button><br></td>
                                </tr>`
            }
            total_price = price;
            total_quantity = quantity;
            var foot = '';
            foot += `<tr>
                                    <th>Tổng số lượng và giá tiền</th>
                                    <td class="text-center" style="border-right">${total_quantity}</td>
                                    <td class="text-center" style="border-right" colspan="2">${total_price}</td>
                                </tr>`
            $('.body_table').html(html)
            $('.foot_table').html(foot)
            var deletes = document.querySelectorAll('.delete1')

            deletes.forEach(function(element) {
                if (element) {
                    element.onclick = function() {
                        cart.forEach(function(val, i) {
                            if (val.id == ~~element.getAttribute('data-id')) {
                                cart.splice(i, 1);

                                $('.element-' + val.id).remove();
                                $('#' + val.id).remove();
                                document.querySelector('.addListDetailSalesInvoice').click();
                                newCart = cart;
                                if (newCart.length == 0) {
                                    $('.submit').addClass('d-none')
                                    $('.foot_table').empty();
                                }
                            }
                        })
                    }
                }
            })
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
                    cart.forEach(function(val) {
                        if (val.id == ~~id) {
                            val.quantity = ~~value;
                            val.price = ~~value * response.price;
                            val.amount = ~~value
                        }
                    })

                    render()
                }
            })

        }
    </script>
    <script>
        $('.btn-save').click(function(e) {
            e.preventDefault();
            if ($('.body_table').children().length < 1) {
                alert('Bạn chưa chọn sản phẩm.')
            } else {
                var supplier = $('select[name="supplier"]').val()
                console.log(supplier)
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('admin.importinvoice.store') }}",
                    method: 'POST',
                    data: {
                        'supplier_id': supplier,
                        'total_quantity': total_quantity,
                        'total_price': total_price,
                        'cart': newCart,
                    }
                }).done(function(response) {
                    if (response) {
                        location.href = "{{ route('admin.importinvoice.index') }}"
                    }

                })
                
            }
        })
    </script>
@stop
