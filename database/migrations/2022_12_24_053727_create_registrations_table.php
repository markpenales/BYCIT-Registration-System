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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('last_name')->nullable(false);
            $table->string('first_name')->nullable(false);
            $table->string('middle_initial', 1)->nullable(true);
            $table->enum('type', ["Student", "Teacher"])->default("Student");
            $table->unsignedBigInteger('college')->nullable(false);
            $table->foreign('college')->references('id')->on('colleges');
            $table->timestamp("date_registered");
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
        Schema::dropIfExists('registrations');
    }
};
