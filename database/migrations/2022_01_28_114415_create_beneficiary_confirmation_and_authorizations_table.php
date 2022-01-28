<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiaryConfirmationAndAuthorizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiary_confirmation_and_authorizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('magellan_case_id');
            $table->dateTime('claim_form_maild_date')->nullable();
            $table->dateTime('claim_form_receive_date')->nullable();
            $table->text('claim_comment');
            $table->dateTime('affidavit_form_maild_date')->nullable();
            $table->dateTime('affidavit_form_receive_date')->nullable();
            $table->text('affidavit_comment');
            $table->dateTime('renunciation_form_maild_date')->nullable();
            $table->dateTime('renunciation_form_receive_date')->nullable();
            $table->text('renunciation_comment');
            $table->dateTime('release_of_bond_maild_date')->nullable();
            $table->dateTime('release_of_bond_receive_date')->nullable();
            $table->text('release_of_bond_comment');            
            $table->enum('phase1',['pending','complete','canceled']);
            $table->enum('probated_estate',['none','yes','no']);
            $table->foreignId('update_by');
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
        Schema::dropIfExists('beneficiary_confirmation_and_authorizations');
    }
}
