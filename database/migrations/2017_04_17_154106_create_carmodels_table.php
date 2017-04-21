<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 汽车品牌
        Schema::create('car_brands', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name',50)->comment('名称');
            $table->char('firstletter',1)->comment('首字母');
            $table->integer('autoid')->comment('汽车之家ID');
            $table->timestamps();
        });

        // 汽车厂商
        Schema::create('car_factories', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name',50)->comment('名称');
            $table->char('firstletter',1)->comment('首字母');
            $table->integer('brand_id')->unsigned()->comment('所属品牌ID');
            $table->integer('autoid')->comment('汽车之家ID');
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('car_brands')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        // 汽车系列
        Schema::create('car_series', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name',50)->comment('名称');
            $table->char('firstletter',1)->comment('首字母');
            $table->integer('brand_id')->unsigned()->comment('所属品牌ID');
            $table->integer('factory_id')->unsigned()->comment('所属厂商ID');
            $table->integer('state')->comment('生产状态');
            $table->integer('autoid')->comment('汽车之家ID');
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('car_brands')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('factory_id')->references('id')->on('car_factories')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        // 汽车年份
        Schema::create('car_years', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name',50)->comment('名称');
            $table->integer('brand_id')->unsigned()->comment('所属品牌ID');
            $table->integer('factory_id')->unsigned()->comment('所属厂商ID');
            $table->integer('series_id')->unsigned()->comment('所属系列ID');
            $table->integer('autoid')->comment('汽车之家ID');
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('car_brands')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('factory_id')->references('id')->on('car_factories')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('series_id')->references('id')->on('car_series')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        // 汽车规格
        Schema::create('car_specs', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name',50)->comment('名称');
            $table->integer('brand_id')->unsigned()->comment('所属品牌ID');
            $table->integer('factory_id')->unsigned()->comment('所属厂商ID');
            $table->integer('series_id')->unsigned()->comment('所属系列ID');
            $table->integer('year_id')->unsigned()->comment('所属年份ID');
            $table->integer('minprice')->comment('最低价');
            $table->integer('maxprice')->comment('最高价');
            $table->integer('state')->comment('生产状态');
            $table->integer('autoid')->comment('汽车之家ID');
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('car_brands')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('factory_id')->references('id')->on('car_factories')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('series_id')->references('id')->on('car_series')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('year_id')->references('id')->on('car_years')
                ->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_specs');
        Schema::dropIfExists('car_years');
        Schema::dropIfExists('car_series');
        Schema::dropIfExists('car_factories');
        Schema::dropIfExists('car_brands');
    }
}
