<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWelcomeMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('welcome_messages', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->string('gambar_profile'); // Kolom untuk menyimpan path gambar profil rektor
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('welcome_messages');
    }
}
