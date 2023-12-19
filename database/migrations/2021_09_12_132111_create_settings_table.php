<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ar')->nullable(false);
            $table->string('title_en')->nullable(false);
            $table->text('breif_ar')->nullable(false);
            $table->text('breif_en')->nullable(false);
            $table->text('about_us_ar')->nullable(false);
            $table->text('about_us_en')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('phone')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('twitter')->nullable(false);
            $table->string('facebook')->nullable(false);
            $table->string('instagram')->nullable(false);

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
        Schema::dropIfExists('settings');
    }
}
