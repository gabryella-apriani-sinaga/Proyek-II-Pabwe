<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FeedbackMenuMakanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_menu_makanan', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('makanan_id');
            $table->smallInteger('rating');
            $table->string('alasan');

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
        Schema::dropIfExists('feedback_menu_makanan');
    }
}
