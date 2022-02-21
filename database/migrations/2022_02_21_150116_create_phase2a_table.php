<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhase2aTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phase2a', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('case_number',25)->nullable();
            $table->dateTime('deth_certificate_ordered')->nullable();
            $table->dateTime('deth_certificate_received')->nullable();
            $table->text('deth_certificate_comments')->nullable();
            $table->dateTime('petition_submited')->nullable();
            $table->dateTime('petition_approved')->nullable();
            $table->text('petition_comments')->nullable();
            $table->dateTime('swearing_scheduled')->nullable();
            $table->dateTime('swearing_completed')->nullable();
            $table->text('swearing_comments')->nullable();
            $table->dateTime('short_certificate_orderd')->nullable();
            $table->dateTime('short_certificate_received')->nullable();
            $table->text('short_certificate_chomments')->nullable();            
            $table->text('recovery_claim_package_mailed')->nullable();            
            $table->text('recovery_claim_package_returned')->nullable();            
            $table->text('recovery_claim_package_comments')->nullable();            
            $table->enum('status',['pending','complete','canceled']);
            $table->foreignId('updated_by');
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
        Schema::dropIfExists('phase2a');
    }
}
