<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
			$table->id();
			$table->string('subject')->nullable();
			$table->foreignId('client_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->foreignId('contact_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->foreignId('currency_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->foreignId('language_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->foreignId('country_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->string('city')->nullable();
			$table->string('state')->nullable();
			$table->string('address')->nullable();
			$table->string('zip')->nullable();
			$table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('proposals');
    }
};
