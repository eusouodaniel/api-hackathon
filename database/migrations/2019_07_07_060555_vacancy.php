<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vacancy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('vacancies', function (Blueprint $table) {
             $table->increments('id');
             $table->string('phone');
             $table->string('cpf');
             $table->string('address_of_residence');
             $table->string('garage_address');
             $table->string('job_identification');
             $table->string('rent_value');
             $table->string('description');
             $table->string('size_of_the_vacancy')->nullable();
             $table->string('property_type')->nullable();
             $table->string('has_concierge')->nullable();
             $table->string('has_alarm')->nullable();
             $table->string('double_vacancy')->nullable();
             $table->string('photo');
             $table->string('latitude');
             $table->string('longitude');
             $table->string('slug');
             $table->boolean('status');
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
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
         Schema::dropIfExists('vacancies');
     }
}
