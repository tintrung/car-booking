<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('make');
            $table->string('model');
            $table->integer('year');
            $table->string('seats');
            $table->string('class');
            $table->float('price_per_day', 20, 2);
            $table->unsignedInteger('supplier_id');
            $table->timestamps();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->index([
                'id',
                'supplier_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_cars');
    }
}
