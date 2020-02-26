<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportFunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_funs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('report_id')->unsigned();
            $table->string('fun');
            $table->string('fun_detail');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('report_id')
                ->references('id')->on('reports')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_funs');
    }
}
