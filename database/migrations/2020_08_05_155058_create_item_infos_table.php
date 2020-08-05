<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('item_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('retailer_id');
            $table->foreignId('inventory_location_id')->constrained()->cascadeOnDelete();
            $table->dateTime('purchase_date');
            $table->dateTime('expiration_date')->nullable();
            $table->float('purchase_price');
            $table->float('msrp')->nullable();
            $table->dateTime('last_used')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('retailer_id')->references('id')->on('companies')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_infos');
    }
}
