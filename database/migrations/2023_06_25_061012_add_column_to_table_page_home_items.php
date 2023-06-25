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
            $table->string('why_choose_heading')->nullable()->after('job_category_status');
            $table->text('why_choose_subheading')->nullable()->after('why_choose_heading');
            $table->string('why_choose_background')->nullable()->after('why_choose_subheading');
            $table->string('why_choose_status')->nullable()->after('why_choose_background');
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
            $table->dropColumn('why_choose_heading');
            $table->dropColumn('why_choose_subheading');
            $table->dropColumn('why_choose_background');
            $table->dropColumn('why_choose_status');
        });
    }
};
