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
        Schema::create('proposal_lines', function (Blueprint $table) {
			$table->id();
			$table->foreignId('proposal_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->foreignId('proposal_version_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->string('title')->nullable();
			$table->string('description')->nullable();
			$table->float('quantity')->default(1);
			$table->float('unit_price');
			$table->float('discount');
			$table->int('discount_type')->default(1)->comment('// 1:percentage, 2:fixed');
			$table->foreignId('tax_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->float('total');
			$table->int('sort_order');
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
        Schema::dropIfExists('proposal_lines');
    }
};
