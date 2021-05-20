<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drivers', function (Blueprint $table) {
            $table->string('middle_name');
            $table->string('surname');
            $table->string('vehicle_reg');
            $table->string('capacity');
            $table->string('plate_number');
            $table->string('plate_renewal');
            $table->string('insurance_renewal_date');
            $table->string('insurance_provider');
            $table->string('start_date');
            $table->string('finish_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drivers', function (Blueprint $table) {
            //
        });
    }
}
