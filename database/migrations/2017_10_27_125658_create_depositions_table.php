<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depositions', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('cover')->nullable();
            $table->string('name');
            $table->string('city');
            $table->string('state');
            $table->string('link');
            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('user_id')->references('id')->on(config('access.table_names.users'))->onDelete('cascade');
            $table->index(['user_id']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('depositions');
    }
}
