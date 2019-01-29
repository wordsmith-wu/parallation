<?php

use App\Models\Language;

return [
    'title'   => '语言',
    'single'  => '语言',
    'model'   => Language::class,

    // 对 CRUD 动作的单独权限控制，其他动作不指定默认为通过
    'action_permissions' => [
        // 删除权限控制
        'delete' => function () {
            // 只有站长才能删除话题分类
            return Auth::user()->hasRole('Founder');
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'code' => [
            'title'    => '代号',
            'sortable' => false,
        ],
        'description' => [
            'title'    => '名称',
            'sortable' => false,
        ],
        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'code' => [
            'title' => '代号',
        ],
        'description' => [
            'title' => '名称',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => '语言 ID',
        ],
        'code' => [
            'title' => '代号',
        ],
        'description' => [
            'title' => '名称',
        ],
    ],
    'rules'   => [
        'code' => 'required|min:2|unique:languages',
        'description' => 'required|min:2|unique:languages',

    ],
    'messages' => [
        'code.unique'   => '代号在数据库里有重复，请选用其他代号。',
        'code.required' => '请确保代号至少一个字符以上',
        'description.unique'   => '名称在数据库里有重复，请选用其他代号。',
        'description.required' => '请确保名称至少一个字符以上',
    ],
];