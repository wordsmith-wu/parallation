<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name'        => '合同',
                'description' => '商务合同、技术合同',
            ],
            [
                'name'        => '技术文档',
                'description' => '技术附件、说明书、程序',
            ],
            [
                'name'        => '邮件',
                'description' => '各类邮件',
            ],
            [
                'name'        => '图纸',
                'description' => '各类图纸',
            ],
        ];
        DB::table('categories')->insert($categories);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
