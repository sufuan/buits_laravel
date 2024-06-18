<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add new columns after phone
            $table->string('gender')->nullable()->after('phone');
            $table->date('date_of_birth')->nullable()->after('gender');
            $table->string('blood_group')->nullable()->after('date_of_birth');

            // Add new columns after usertype
            $table->integer('class_roll')->nullable()->after('usertype');
            $table->string('father_name')->nullable()->after('class_roll');
            $table->string('mother_name')->nullable()->after('father_name');
            $table->string('current_address')->nullable()->after('mother_name');
            $table->string('permanent_address')->nullable()->after('current_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the columns if the migration is rolled back
            $table->dropColumn('gender');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('blood_group');
            $table->dropColumn('class_roll');
            $table->dropColumn('father_name');
            $table->dropColumn('mother_name');
            $table->dropColumn('current_address');
            $table->dropColumn('permanent_address');
        });
    }
}
