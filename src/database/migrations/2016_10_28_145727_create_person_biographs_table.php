<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonBiographsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_biographs', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('personable_id');
			$table->string('personable_type');
			$table->dateTime('birth_date')->nullable()->default(null);
			$table->integer('gender_id')->nullable()->default(null);
			$table->integer('ethnicity_id')->nullable()->default(null);
			$table->integer('marital_status_id')->nullable()->default(null);
			$table->integer('religion_id')->nullable()->default(null);
			$table->timestamp('death_date')->nullable()->default(null);
			$table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_biographs');
    }
}
