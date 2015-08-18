<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatabaseV1 extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 Schema::create('event', function (Blueprint $table) {
			$table->increments('id');
			$table->string('judul')->nullable();
			$table->string('konten')->nullable();
			$table->dateTime('waktu_mulai')->nullable();
			$table->dateTime('waktu_akhir')->nullable();
			$table->string('kelas')->nullable();
			$table->softDeletes();
			$table->timestamps();
		});

		 Schema::create('question', function (Blueprint $table) {
			$table->increments('id');
			$table->string('event_id');
			$table->string('judul')->nullable();
			$table->string('konten')->nullable();
			$table->string('jawaban')->nullable();
			$table->softDeletes();
			$table->timestamps();
		});

		 Schema::create('submission', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('question_id');
			$table->integer('users_id');
			$table->integer('nilai')->nullable();
			$table->string('jawaban')->nullable();
			$table->softDeletes();
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
		Schema::drop('question');
		Schema::drop('event');
		Schema::drop('submission');

	}
}
