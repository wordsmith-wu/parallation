<?php

use App\Models\Term;

return [
    'title'   => '术语',
    'single'  => '术语',
    'model'   => Term::class,

    // 对 CRUD 动作的单独权限控制，其他动作不指定默认为通过
    'action_permissions' => [
        // 删除权限控制
        'delete' => function () {
            // 只有站长才能删除术语
            return Auth::user()->hasRole('Founder');
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'creation_id' => [
            'title'    => '创建人',
            'output' => function ($value,$model){
                return $model->created_by->name;
            },
        ],
        // 'change_id' => [
        //     'title'    => '更改人',
        //     'output' => function ($value,$model){
        //         return $model->changed_by->name;
        //     },
        // ],
        'source_text' => [
            'title'    => '原文',
        ],
        'direction' => [
            'title'    => '方向',
            'output' => function ($value, $model){
                return get_language($model->source_language_id) . '翻' . get_language($model->target_language_id);
            },
        ],
        'target_text' => [
            'title'    => '译文',
        ],
        'usagecount' => [
            'title'    => '使用次数',
        ],
        'created_at' => [
            'title'    => '创建日期',
        ],
        'updated_at' => [
            'title'    => '更改日期',
        ],
       'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'creation_id' => [
            'title' => '创建人',
        ],
        'source_text' => [
            'title' => '原文',
            'type'  => 'textarea',
        ],
        'target_text' => [
            'title' => '译文',
            'type'  => 'textarea',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => '分类 ID',
        ],
        'creation_id' => [
            'title' => '创建人',
        ],
        'source_text' => [
            'title' => '原文',
        ],
        'target_text' => [
            'title' => '译文',
        ],
    ],
    'rules'   => [
        'creationid' => 'required|min:1|unique:categories'
    ],
    'messages' => [
        'creationid.unique'   => '创建人在数据库里有重复，请选用其他名称。',
        'creationid.required' => '请确保名字至少一个字符以上',
    ],
];