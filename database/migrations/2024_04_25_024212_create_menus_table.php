<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->foreignUuid('menu_id')->nullable();
            $table->string('name');
            $table->string('route')->nullable();
            $table->string('routeBase')->nullable();
            $table->string('path')->nullable();
            $table->string('pathBase')->nullable();
            $table->string('icon')->nullable();
            $table->string('role')->nullable();
            $table->string('permission')->nullable();

            $table->tinyInteger('status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
