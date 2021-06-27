<?php
    return [
        [
            'label'=> 'Dashboard',
            'route'=> 'admin.dashboard',
            'icon'=> 'home',
        ],
        [
            'label'=> 'Quản lý danh mục',
            'route'=> 'admin.category.index',
            'icon'=> 'triangle',
            'hassub'=> 'has-sub',
            'item'=> [
                [
                    'label'=> 'Danh sách danh mục',
                    'route'=> 'admin.category.index',
                ],
                [
                    'label'=> 'Thêm danh mục',
                    'route'=> 'admin.category.create',
                ],
            ]
        ],
        [
            'label'=> 'Quản lý sản phẩm',
            'route'=> 'admin.product.index',
            'icon'=> 'briefcase',
            'hassub'=> 'has-sub',
            'item'=> [
                [
                    'label'=> 'Danh sách sản phẩm',
                    'route'=> 'admin.product.index',
                ],
                [
                    'label'=> 'Thêm sản phẩm',
                    'route'=> 'admin.product.create',
                ],
            ]
        ],
        [
            'label'=> 'Quản lý đơn hàng',
            'route'=> 'admin.salesinvoice.index',
            'icon'=> 'file-text',
            'hassub'=> 'has-sub',
            'item'=> [
                [
                    'label'=> 'Danh sách đơn hàng',
                    'route'=> 'admin.salesinvoice.index',
                ],
                
            ]
        ],
        [
            'label'=> 'Quản lý user',
            'route'=> 'admin.user.index',
            'icon'=> 'user',
            'hassub'=> 'has-sub',
            'item'=> [
                [
                    'label'=> 'Danh sách user',
                    'route'=> 'admin.user.index',
                ],
                [
                    'label'=> 'Thêm user',
                    'route'=> 'admin.user.create',
                ],
            ]
        ],
        [
            'label'=> 'Quản lý quyền',
            'route'=> 'admin.role.index',
            'icon'=> 'layers',
            'hassub'=> 'has-sub',
            'item'=> [
                [
                    'label'=> 'Danh sách quyền',
                    'route'=> 'admin.role.index',
                ],
                [
                    'label'=> 'Thêm mới quyền',
                    'route'=> 'admin.role.create',
                ],
            ]
        ],
        [
            'label'=> 'Quản lý danh mục tin tức',
            'route'=> 'admin.category_news.index',
            'icon'=> 'triangle',
            'hassub'=> 'has-sub',
            'item'=> [
                [
                    'label'=> 'Danh danh mục tin tức',
                    'route'=> 'admin.category_news.index',
                ],
                [
                    'label'=> 'Thêm danh mục tin tức',
                    'route'=> 'admin.category_news.create',
                ],
            ]
        ],
        [
            'label'=> 'Quản lý tin tức',
            'route'=> 'admin.news.index',
            'icon'=> 'file-text',
            'hassub'=> 'has-sub',
            'item'=> [
                [
                    'label'=> 'Danh tin tức',
                    'route'=> 'admin.news.index',
                ],
                [
                    'label'=> 'Thêm tin tức',
                    'route'=> 'admin.news.create',
                ],
            ]
        ],
        [
            'label'=> 'Quản lý nhà cung cấp',
            'route'=> 'admin.supplier.index',
            'icon'=> 'user',
            'hassub'=> 'has-sub',
            'item'=> [
                [
                    'label'=> 'Danh sách nhà cung cấp',
                    'route'=> 'admin.supplier.index',
                ],
                [
                    'label'=> 'Thêm nhà cung cấp',
                    'route'=> 'admin.supplier.create',
                ],
            ]
        ],              
    ]
?>