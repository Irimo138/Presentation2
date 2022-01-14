<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('language')->nullable();
            $table->string('type');
            $table->string('date');
            $table->string('publicationDate');
            $table->string('hour')->nullable();
            $table->string('price')->nullable();
            $table->string('url')->nullable();
            $table->string('townName')->nullable();
            $table->string('image')->nullable();
            $table->string('place')->nullable();
            $table->string('lat')->nullable();
            $table->string('log')->nullable();

            $table->integer('townId')->nullable();
            $table->integer('provinceId')->nullable();
            $table->boolean('checked');


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
        Schema::dropIfExists('events');
    }
}
