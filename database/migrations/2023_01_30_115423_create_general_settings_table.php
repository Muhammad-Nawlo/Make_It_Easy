<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_phone')->nullable();
            $table->string('company_email');
            $table->string('company_website')->nullable();
            $table->foreignId('main_customer_account_id')->constrained('accounts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('main_supplier_account_id')->constrained('accounts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('img')->nullable();
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
        Schema::dropIfExists('general_settings');
    }
};
