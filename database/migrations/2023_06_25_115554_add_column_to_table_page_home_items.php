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
        Schema::table('page_home_items', function (Blueprint $table) {
            $table->string('testimonial_heading')->nullable()->after('feature_jobs_status');
            $table->text('testimonial_background')->nullable()->after('testimonial_heading');
            $table->string('testimonial_status')->nullable()->after('testimonial_background');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_home_items', function (Blueprint $table) {
            $table->dropColumn('testimonial_heading');
            $table->dropColumn('testimonial_background');
            $table->dropColumn('testimonial_status');
        });
    }
};
