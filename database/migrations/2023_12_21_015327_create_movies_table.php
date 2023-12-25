<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->integer('tmdb_id');
            $table->string('title');
            $table->longText('overview');
            $table->string('url')->nullable();
            $table->date('release_date');
            $table->boolean('adult');
            $table->json('genres');
            $table->json('countries');
            $table->json('companies');
            $table->bigInteger('budget')->nullable();
            $table->bigInteger('revenue')->nullable();
            $table->float('vote_average')->nullable();
            $table->bigInteger('vote_count')->nullable();
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
        Schema::dropIfExists('movies');
    }
}
