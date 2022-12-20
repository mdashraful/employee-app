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
        Schema::create('leave_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applied_by')->default(1);
            $table->unsignedBigInteger('leave_category');
            $table->foreign('leave_category')->references('id')->on('leave_categories');
            $table->date('leave_from');
            $table->date('leave_to');
            $table->unsignedTinyInteger('leave_applied_days');
            $table->text('details');
            $table->string('attachment')->nullable();
            $table->foreignId('fiscal_year')->constrained();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('leave_applications');
    }
};
