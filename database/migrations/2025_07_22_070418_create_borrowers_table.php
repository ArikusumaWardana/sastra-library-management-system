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
        Schema::create('borrowers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('identity_number'); // misalnya NIK atau nomor KTP
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('address');
            $table->string('institution')->nullable(); // sekolah, kampus, dll
            $table->enum('gender', ['male', 'female']);
            $table->date('birth_date')->nullable();
            $table->string('occupation')->nullable();
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
        Schema::dropIfExists('borrowers');
    }
};
