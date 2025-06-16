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

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('last_name', 100)->nullable();
            $table->string('email', 100)->unique();
            $table->string('profile_photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone', 20)->nullable();
            $table->enum('is_phone_verified', ['1', '0'])->default(0);
            $table->date('dob')->nullable();
            $table->string('location', 100)->nullable();
            $table->decimal('latitude', 11, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('password', 100);
            $table->tinyInteger('role')->index()->nullable();
            $table->tinyInteger('state_id')->index()->default(0);
            $table->tinyInteger('type_id')->index()->default(0);
            $table->integer('created_by')->nullable()->index();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('user_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->foreignId('user_id')->references('id')->on('users');
            $table->dateTime('from_date')->nullable();
            $table->dateTime('to_date')->nullable();
            $table->string('break')->nullable();
            $table->tinyInteger('is_split_shift')->nullable();
            $table->time('split_shift_time')->nullable();
            $table->longText('description')->nullable();
            $table->integer('created_by')->nullable()->index();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('user_punch_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->dateTime('action_time');
            $table->text('description')->nullable();
            $table->tinyInteger('status')->index()->nullable();
            $table->timestamps();
        });
        Schema::create('user_attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index()->nullable();
            $table->date('date')->nullable();
            $table->integer('type')->index()->nullable();
            $table->time('first_in')->nullable();
            $table->time('last_out')->nullable();
            $table->string('break')->nullable();
            $table->string('total_hours')->nullable();
            $table->string('location')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
