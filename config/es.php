<?php

return [

    'host' => env('ES_HOST', '127.0.0.1'),
    'port' => env('ES_PORT', '9200'),
    'index' => env('ES_SEARCH_INDEX', 'test_index'),    // 文档搜索index
    'type' => env('ES_SEARCH_TYPE', 'documents'),       // 文档搜索type

    // 全文检索字段以及比重
    'query' => [
        'fields' => [
            'en' => [
                'title.en^2',
                'content.en^0.1',
                'issue_no.en',
                'promulgator.en',
                'effectiveness',
                'region.en',
                'firm',
                'tags',
                'tags.facet^20'
            ],
            'zh' => [
                'title^16',
                'content^0.1',
                'issue_no',
                'promulgator',
                'effectiveness',
                'region',
                'firm',
                'tags',
                'tags.facet^20'
            ],
        ]
    ],

    // 搜索结果 调序函数脚本
    'script' => '(1 / sqrt(' . date('Y') . ' - doc["promulgation_year"] + 1)) * (1 / (doc["jurisdictional_id"].value ?: 60 + 1))',

    //搜索结果 默认排序字段
    'relevancy_sort' => [
        ['_score' => 'desc'],
        ['jurisdictional_id' => 'asc'],
        ['promulgation_date' => 'desc'],
    ],

    //搜索结果 发文日期排序字段
    'promulgation_date_sort' => [
        ['promulgation_date' => 'desc'],
        ['_score' => 'desc'],
        ['jurisdictional_id' => 'asc'],
    ],


    // 统计字段配置
    'aggs' => [
        'effectiveness' => [
            'terms' => [
                'field' => 'effectiveness_id',
                'size' => 0,
            ]
        ],
        'jurisdiction' => [
            'terms' => [
                'field' => 'jurisdictional_id',
                'size' => 0,
            ]
        ],
        'promulgation_year' => [
            'terms' => [
                'field' => 'promulgation_year',
                'size' => 0,
            ]
        ],
        'taxonomy' => [
            'terms' => [
                'field' => 'taxonomy_id',
                'size' => 0,
            ]
        ],
        'region' => [
            'terms' => [
                'field' => 'region_id',
                'size' => 0,
            ]
        ],
        'causes' => [
            'terms' => [
                'field' => 'case_cause_id',
                'size' => 0,
            ]
        ],
        'trial_process' => [
            'terms' => [
                'field' => 'trial_process',
                'size' => 0,
            ]
        ],
        'content_type' => [
            'terms' => [
                'field' => 'content_type',
                'size' => 0,
            ]
        ]
    ],

    // 查询高亮显示配置
    'highlight' => [
        'zh' => [
            'fields' => [
                'content' => [
                    'pre_tags' => ['<span class="highlight">'],
                    'post_tags' => ['</span>'],
                    'fragment_size' => 200,
                    'number_of_fragments' => 1,
                    // 'type' => 'plain' // 设置成plain 部分文章 fragment_size 不生效，现在还原成 默认值
                ],
                'title' => [
                    'pre_tags' => ['<span class="highlight">'],
                    'post_tags' => ['</span>'],
                    'fragment_size' => 200,
                    'number_of_fragments' => 1,
                    // 'type' => 'plain'
                ],
            ]
        ],
        'en' => [
            'fields' => [
                'content.en' => [
                    'pre_tags' => ['<span class="highlight">'],
                    'post_tags' => ['</span>'],
                    'fragment_size' => 200,
                    'number_of_fragments' => 1,
                    // 'type' => 'plain'
                ],
                'title.en' => [
                    'pre_tags' => ['<span class="highlight">'],
                    'post_tags' => ['</span>'],
                    'fragment_size' => 200,
                    'number_of_fragments' => 1,
                    // 'type' => 'plain'
                ],
            ]
        ],
    ]
];
