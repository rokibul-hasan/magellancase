<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhase1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phase1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->enum('administrator',['no','yes']);
            $table->dateTime('claim_form_maild_date')->nullable();
            $table->dateTime('claim_form_receive_date')->nullable();
            $table->text('claim_comment')->nullable();
            $table->dateTime('affidavit_form_maild_date')->nullable();
            $table->dateTime('affidavit_form_receive_date')->nullable();
            $table->text('affidavit_comment')->nullable();
            $table->dateTime('renunciation_form_maild_date')->nullable();
            $table->dateTime('renunciation_form_receive_date')->nullable();
            $table->text('renunciation_comment')->nullable();
            $table->dateTime('release_of_bond_maild_date')->nullable();
            $table->dateTime('release_of_bond_receive_date')->nullable();
            $table->text('release_of_bond_comment')->nullable();            
            $table->enum('phase1',['pending','complete','canceled']);
            $table->enum('probated_estate',['none','yes','no']);
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
        Schema::dropIfExists('phase1');
    }
}
