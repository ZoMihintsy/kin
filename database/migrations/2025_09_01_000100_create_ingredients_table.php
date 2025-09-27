<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('ingredients', function (Blueprint $t) {
            $t->id();
            $t->string('name')->unique();
        });
    }
    public function down(): void { Schema::dropIfExists('ingredients'); }
};