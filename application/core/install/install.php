<?php
/**
 * +----------------------------------------------------------------------
 * | InitAdmin/actionphp [ InitAdmin渐进式模块化通用后台 ]
 * +----------------------------------------------------------------------
 * | Copyright (c) 2018-2019 http://initadmin.net All rights reserved.
 * +----------------------------------------------------------------------
 * | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
 * +----------------------------------------------------------------------
 * | Author: jry <ijry@qq.com>
 * +----------------------------------------------------------------------
*/

/*
 * 模块信息配置
 */
return [
    // 模块信息
    'info'       => [
        'name'         => 'core',
        'title'        => '核心',
        'description'  => 'tpvue核心模块',
        'developer'    => 'jry',
        'website'      => 'http://tpvue.com',
        'version'      => '0.1.0',
        'build'        => 'Alpha1_2019010500'
    ],

    // 后台左侧导航菜单列表
    'admin_menu'     => [
        [
            'path' => '/core_0',
            'title' => '系统',
            'level' => '1', //导航层级最多3级
            '_child' => [
                [
                    'path' => '/core/config/lists',
                    'title' => '系统设置',
                    'level' => '2',
                    'is_vadypage' => '1',
                    'api' => 'v1/core/admin/config/lists',
                ],
                [
                    'path' => '/core/role/lists',
                    'title' => '权限管理',
                    'level' => '2',
                    'is_vadypage' => '1',
                    'api' => 'v1/core/admin/role/lists',
                ],
                [
                    'path' => '/core/user/lists',
                    'title' => '用户列表',
                    'level' => '2',
                    'is_vadypage' => '1',
                    'api' => 'v1/core/admin/user/lists',
                ],
                
            ]
        ]
    ],

    // 模块路由
    'route'     => [
        'v1' => [
            // 规则路由
            'rule' => [
                'admin/menu/lists' => ['admin.Menu/lists', 'GET'],
                'admin/role/lists' => ['admin.Role/lists', 'GET'],
                'admin/role/add' => ['admin.Role/add', 'GET|POST'],
                'admin/role/edit/:id' => ['admin.Role/edit', 'GET|PUT'],
                'admin/role/delete/:id' => ['admin.Role/delete', 'DELETE'],
                'admin/user/lists' => ['admin.User/lists', 'GET'],
                'admin/user/add' => ['admin.User/add', 'GET|POST'],
                'admin/user/edit/:id' => ['admin.User/edit', 'GET|PUT'],
                'admin/user/delete/:id' => ['admin.User/delete', 'DELETE'],
                'user/login' => ['User/login']
            ]
        ]
    ],

    // 路由API注释
    'route_api'     => [
        'v1' => [
            'user/login' => [
                'POST' => [
                    'title' => '用户登录', // 接口名称
                    'description' => '使用账号密码登录系统', // 接口功能描述
                    'params' => [
                        'account' => [
                            'is_must' => 1, //该参数是否必须
                            'title' => '账号', //字段名称
                            'description' => '账号支持手机号/邮箱/用户名', // 字段描述
                            'example' => 'test', // 字段传值示例
                        ],
                        'password' => [
                            'is_must' => 1, //该参数是否必须
                            'title' => '密码哈希', //字段名称
                            'description' => '密码必须在前台用公钥加密传输，这样系统跟安全，密码不容易在传输中被劫持。', // 字段描述
                            'example' => 'test123', // 字段传值示例
                        ]
                    ],
                    'return' => [
                        'success' => [
                            'code' => 200,
                            'msg'  => '登录成功',
                            'data'  => [
                                'token' => 'abcdefghijklmnabcdefghijklmn',
                                'user_info' => [
                                    'id' => 999,  // 用户的UID
                                    'username' => 'test',  // 用户名可以登录系统,不允许重复
                                    'nickname' => '测试账号',  // 用户昵称不可以登录系统，允许重复
                                    'avatar' => '头像地址',  // 用户的头像图片地址
                                ]
                            ]
                        ],
                        'error' => [
                            'code' => 0,
                            'msg'  => '密码错误'
                        ]
                    ]
                ]
            ]
        ]
    ]
];