<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        # default of columns not null unless you say something else ?
        Schema::create('students', function (Blueprint $table) {
            $table->id();  # generate column id in the table
            $table->string("name");
            $table->string("image")->nullable();
            $table->integer("grade");
            $table->timestamps();  # generate 2 columns --> in the table created_at , updated_at
        });
    }

    /**
     * Reverse the migrations.
     * drop the table from the database
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
