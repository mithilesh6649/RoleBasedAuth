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
        Schema::create('user_daily_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_schedule_id');
            $table->date('date');
            $table->time('from_time');
            $table->time('to_time');
            $table->time('break_duration')->nullable();
            $table->string('status')->default('0');
            $table->string('shift_status')->comment('1|Present 2|Absent |3 Leave');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_daily_schedules');
    }
};
