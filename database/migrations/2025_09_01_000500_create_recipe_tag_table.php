<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('recipe_tag', function (Blueprint $t) {
            $t->id();
            $t->foreignId('recipe_id')->constrained()->cascadeOnDelete();
            $t->foreignId('tag_id')->constrained()->cascadeOnDelete();
            $t->unique(['recipe_id','tag_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('recipe_tag'); }
};