<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountDeleteReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_delete_reasons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('I_dont_get_What_I_Want');
            $table->string('e_shop_app_is_slow');
            $table->string('It_is_difficult_to_use_e_shop_Application');
            $table->string('Poor_Services');
            $table->string('I_dont_Have_A_reason');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_delete_reasons');
    }
}
