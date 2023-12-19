<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subscripe_id')->nullable();
            $table->foreign('subscripe_id')->references('id')->on('subscriptions')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedInteger('contact_id')->nullable();
            $table->foreign('contact_id')->references('id')->on('contacts')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->integer('viewed');
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
        Schema::dropIfExists('notifications');
    }
}
