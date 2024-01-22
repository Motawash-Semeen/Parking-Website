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
        Schema::create('parking_slots', function (Blueprint $table) {
            $table->id();
            $table->string('building_name');
            $table->string('building_number');
            $table->string('coordinates');
            $table->string('mobile');
            $table->string('city');
            $table->string('post_area');
            $table->integer('zip');
            $table->double('price');
            $table->string('slot_numbers');
            $table->string('open_time');
            $table->string('close_time');
            $table->string('slot_type');
            $table->string('cctv')->default(0)->comment('0 = no, 1 = yes');
            $table->string('security')->default(0)->comment('0 = no, 1 = yes');
            $table->string('guest')->default(0)->comment('0 = no, 1 = yes');
            $table->string('extinguisher')->default(0)->comment('0 = no, 1 = yes');
            $table->string('water')->default(0)->comment('0 = no, 1 = yes');
            $table->string('mainroad')->default(0)->comment('0 = no, 1 = yes');
            $table->tinyInteger('user_id');
            $table->string('status')->default(0)->comment('0 = inactive, 1 = active');
            $table->string('admin_approval')->default(0)->comment('0 = inactive, 1 = active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_slots');
    }
};
