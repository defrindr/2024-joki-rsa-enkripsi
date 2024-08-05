<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncryptedMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('encrypted_messages', function (Blueprint $table) {
            $table->id();
            $table->text('ciphertext');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('encrypted_messages');
    }
}
