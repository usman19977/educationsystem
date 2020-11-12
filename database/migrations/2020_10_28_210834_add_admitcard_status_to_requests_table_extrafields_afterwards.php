<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdmitcardStatusToRequestsTableExtrafieldsAfterwards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admitcards', function (Blueprint $table) {
            //
            $table->string('candidate_name');
            $table->string('father_name');
            $table->string('phone');
            $table->string('address');
            $table->string('cnic');
            $table->string('school_rollnumber');
            $table->string('religion');
            $table->string('gender');
            $table->dateTime('date_of_birth');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admitcards', function (Blueprint $table) {
            //
            $table->dropColumn('candidate_name');
            $table->dropColumn('father_name');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('cnic');
            $table->dropColumn('school_rollnumber');
            $table->dropColumn('religion');
            $table->dropColumn('gender');
            $table->dropColumn('date_of_birth');
        });
    }
}
