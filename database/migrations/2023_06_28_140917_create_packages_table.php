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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->tinyInteger('package_price');
            $table->tinyInteger('package_days');
            $table->string('package_display_time');
            $table->string('total_allowed_jobs');
            $table->string('total_allowed_featured_jobs');
            $table->string('total_allowed_photos');
            $table->string('total_allowed_videos');
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
        Schema::dropIfExists('packages');
    }
};
