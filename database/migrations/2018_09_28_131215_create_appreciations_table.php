<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppreciationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appreciations', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('content');
            $table->char('level', 1); // Only -, +, =
            $table->integer('category_id');
            $table->timestamps();
        });

        Schema::table('appreciations', function (Blueprint $table)
        {
            $table->foreign('category_id')
                  ->references('id')->on('categories')
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
        Schema::dropIfExists('appreciations');
    }
}
