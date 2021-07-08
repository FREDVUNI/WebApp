<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger("category_id");
            $table->UnsignedBigInteger("subcategory_id")->nullable();
            $table->string('title',50);
            $table->string('url');
            $table->string('shortdescription',150);
            $table->string('description')->nullable();
            $table->string('img');
            $table->string('email');
            $table->boolean('published')->default(false);
            $table->boolean('paid')->default(false);
            $table->timestamps();

            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');

            $table->foreign('subcategory_id')
            ->references('id')
            ->on('subcategories')
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
        Schema::dropIfExists('domains');
    }
}
