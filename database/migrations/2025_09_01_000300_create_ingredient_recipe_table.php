<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('ingredient_recipe', function (Blueprint $t) {
            $t->id();
            $t->foreignId('recipe_id')->constrained()->cascadeOnDelete();
            $t->foreignId('ingredient_id')->constrained()->cascadeOnDelete();
            $t->string('quantity')->nullable();
            $t->string('unit')->nullable();
            $t->unique(['recipe_id','ingredient_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('ingredient_recipe'); }
};