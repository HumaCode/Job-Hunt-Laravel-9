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
            $table->string('feature_jobs_heading')->nullable()->after('why_choose_status');
            $table->text('feature_jobs_subheading')->nullable()->after('feature_jobs_heading');
            $table->string('feature_jobs_status')->nullable()->after('feature_jobs_subheading');
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
            $table->dropColumn('feature_jobs_heading');
            $table->dropColumn('feature_jobs_subheading');
            $table->dropColumn('feature_jobs_status');
        });
    }
};
