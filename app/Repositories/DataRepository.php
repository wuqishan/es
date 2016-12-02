<?php
namespace App\Repositories;

class DataRepository extends Repository
{

    public function getData()
    {
        return [
            [
                'index' => config('es.index'),
                'type' => config('es.type'),
                'id' => 1,
                'body' => [
                    'id' => 1,
                    'title' => '商务部公告2009年第78号',
                    'content' => '各省、自治区、直辖市、计划单列市财政厅（局）、国家税务局，新疆生产建设兵团财务局',
                ]
            ],
            [
                'index' => config('es.index'),
                'type' => config('es.type'),
                'id' => 2,
                'body' => [
                    'id' => 2,
                    'title' => '成品油等产品出口退税率的通知',
                    'content' => '经国务院批准，提高机电、成品油等产品的增值税出口退税率。现就有关事项通知如下',
                ]
            ],
            [
                'index' => config('es.index'),
                'type' => config('es.type'),
                'id' => 3,
                'body' => [
                    'id' => 3,
                    'title' => '雷某某称宋某某名下在中国邮政储蓄银',
                    'content' => '将照相机、摄影机、内燃发动机、汽油、航空煤油、柴油等产品的出口退税率提高至17%。提高出口退税率的产品清单见附件。',
                ]
            ],
            [
                'index' => config('es.index'),
                'type' => config('es.type'),
                'id' => 4,
                'body' => [
                    'id' => 4,
                    'title' => '北京市朝阳区人民法院于2015年4月16日作',
                    'content' => '本通知自2016年11月1日起执行。本通知所列货物适用的出口退税率，以出口货物报关单上注明的出口日期界定。',
                ]
            ],
            [
                'index' => config('es.index'),
                'type' => config('es.type'),
                'id' => 5,
                'body' => [
                    'id' => 5,
                    'title' => 'Guiding Case No.66 Lei XX v. Song XX (Divorce Dispute)',
                    'content' => 'Where, during or before divorce proceedings, one party conceals, transfers, sells off or destroys the property in the joint possession of the couple, ',
                ]
            ],
        ];
    }

}