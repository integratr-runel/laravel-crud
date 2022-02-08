<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->String('item_name');
            $table->tinyInteger('quantity');
            $table->decimal('amount', 8, 2 );
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table ->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
