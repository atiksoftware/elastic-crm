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
        Schema::create('clients', function (Blueprint $table) {
			$table->id();
			$table->enum('client_type', [1, 2]);
			$table->foreignId('group_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->string('name')->nullable();
			$table->string('vat')->nullable();
			$table->string('phone')->nullable();
			$table->string('website')->nullable();
			$table->foreignId('currency_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->foreignId('language_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->foreignId('country_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->string('city')->nullable();
			$table->string('state')->nullable();
			$table->string('address')->nullable();
			$table->string('zip')->nullable();
			$table->foreignId('billing_country_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->string('billing_city')->nullable();
			$table->string('billing_state')->nullable();
			$table->string('billing_address')->nullable();
			$table->string('billing_zip')->nullable();
			$table->foreignId('shipping_country_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->string('shipping_city')->nullable();
			$table->string('shipping_state')->nullable();
			$table->string('shipping_address')->nullable();
			$table->string('shipping_zip')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
