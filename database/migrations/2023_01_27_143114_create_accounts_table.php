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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('account_type_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('status');
            $table->float('start_balance')->default(0);
            $table->float('current_balance')->default(0);
            $table->foreignId('parent_account_id')->nullable()->constrained('accounts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('note')->nullable();
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('updated_by')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->archivedAt();
            $table->timestamps();
            $table->integer('other_fk')->nullable();
            $table->boolean('archived')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
};
