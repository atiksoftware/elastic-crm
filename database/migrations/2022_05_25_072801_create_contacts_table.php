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
        Schema::create('contacts', function (Blueprint $table) {
			$table->id();
			$table->foreignId('client_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->string('firstname')->nullable();
			$table->string('lastname')->nullable();
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
			$table->string('profile_image')->nullable();
			$table->string('job_title')->nullable();
			$table->bool('is_primary')->default(false);
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
        Schema::dropIfExists('contacts');
    }
};
