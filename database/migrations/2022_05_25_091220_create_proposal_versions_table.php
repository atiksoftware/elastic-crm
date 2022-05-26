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
        Schema::create('proposal_versions', function (Blueprint $table) {
			$table->id();
			$table->foreignId('proposal_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->int('quantity_as')->default(1)->comment('// 1:Pieces, 2:Hours, 2:Pieces/Hours');
			$table->float('sub_total');
			$table->float('line_discount');
			$table->float('general_discount');
			$table->float('gross_total');
			$table->float('total_tax');
			$table->float('total');
			$table->string('description')->nullable();
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
        Schema::dropIfExists('proposal_versions');
    }
};
