<?php

use App\Models\Translation;

return [
    'title'   => '翻译',
    'single'  => '翻译',
    'model'   => Translation::class,

    // 对 CRUD 动作的单独权限控制，其他动作不指定默认为通过
    'action_permissions' => [
        // 删除权限控制
        'delete' => function () {
            // 只有站长才能删除翻译
            return Auth::user()->hasRole('Founder');
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'creationid' => [
            'title'    => '创建人',
            'sortable' => false,
        ],
        'source' => [
            'title'    => '原文',
            'sortable' => false,
        ],
        'direction' => [
            'title'    => '方向',
            'output' => function ($value, $model){
                return get_language($model->source_language_id) . '翻' . get_language($model->target_language_id);
            },
        ],
        'target' => [
            'title'    => '译文',
            'sortable' => false,
        ],
        'usagecount' => [
            'title'    => '使用次数',
        ],
        'creationdate' => [
            'title'    => '创建日期',
        ],
        'changedate' => [
            'title'    => '更改日期',
        ],
        'lastusagedate' => [
            'title'    => '最后使用日期',
        ],
        'operation' => [
            'title'  => '管理',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'creationid' => [
            'title' => '创建人',
        ],
        'source' => [
            'title' => '原文',
            'type'  => 'textarea',
        ],
        'target' => [
            'title' => '译文',
            'type'  => 'textarea',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => '分类 ID',
        ],
        'creationid' => [
            'title' => '创建人',
        ],
        'source' => [
            'title' => '原文',
        ],
        'target' => [
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