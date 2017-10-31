<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('catalog.products_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('category_main_id')->nullable();
            $table->string('name', 191);
            $table->string('slug', 191)->unique();
            $table->string('cover', 191)->nullable();
            $table->string('height', 10);
            $table->string('membership', 191);
            $table->text('description');
            $table->boolean('sold')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('made_history')->default(false);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('user_id')->references('id')->on(config('access.table_names.users'))->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on(config('catalog.categories_table'))->onDelete('cascade');
            $table->index(['user_id', 'category_id', 'category_main_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('catalog.products_table'));
    }
}
