<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('card_id');
            $table->string('visa_id');
            $table->string('gender');
            $table->string('fname');
            $table->string('product');
            $table->date('birthday');
            $table->string('nationality');
            $table->string('phone');
            $table->string('email');
            $table->date('sta_date');
            $table->date('exp_date');
            $table->text('address');
            $table->text('comment');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};

