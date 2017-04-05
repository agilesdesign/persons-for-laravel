<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_names', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('personable_id');
			$table->string('personable_type');
			$table->string('first');
			$table->string('middle')->nullable()->default(null);
			$table->string('last');
			$table->string('preferred')->nullable()->default(null);
			$table->string('nickname')->nullable()->default(null);
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
        Schema::dropIfExists('person_names');
    }
}
