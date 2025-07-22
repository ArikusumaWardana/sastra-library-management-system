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
        Schema::create('loans', function (Blueprint $table) {
          $table->id();
          $table->foreignId('borrower_id')->constrained('borrowers')->onDelete('cascade');
          $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
          $table->foreignId('processed_by')->constrained('users')->onDelete('cascade');
          $table->date('loan_date');
          $table->date('return_date');
          $table->enum('status', ['borrowed', 'returned', 'late'])->default('borrowed');
          $table->timestamps();
          $table->softDeletes();
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
};
