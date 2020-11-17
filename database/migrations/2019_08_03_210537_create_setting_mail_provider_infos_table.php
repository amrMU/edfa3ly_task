<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingMailProviderInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_mail_provider_infos', function (Blueprint $table) {
            //defualt mail info by cpanel
            $table->increments('id');
            $table->unsignedInteger('setting_id')->nullable();
            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
            $table->string('MAIL_DRIVER')->nullable();
            $table->string('MAIL_HOST')->nullable();
            $table->string('MAIL_port')->nullable();
            $table->string('MAIL_USERNAME')->nullable();
            $table->string('MAIL_PASSWORD')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('setting_mail_provider_infos');
    }
}
