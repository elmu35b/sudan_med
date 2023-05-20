<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();



            $table->string('name');
            $table->boolean('available')->default(true);

            $table->string('name_en')->nullable();
            $table->string('tags')->nullable();
            $table->string('dose')->nullable();
            $table->string('ex_date')->nullable();

            $table->string('quantity')->default('1');
            $table->integer('price');

            $table->string('img_url')->nullable();



            $table->double('lat')->nullable();
            $table->double('lng')->nullable();



            $table->bigInteger('category_id')->unsigned()->index()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');


            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->bigInteger('city_id')->unsigned()->index()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
