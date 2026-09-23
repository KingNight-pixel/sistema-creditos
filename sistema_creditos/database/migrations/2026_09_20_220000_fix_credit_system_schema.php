<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void { if (!Schema::hasTable('solicitudes')) Schema::create('solicitudes', function(Blueprint $t){ $t->id(); $t->foreignId('user_id')->constrained('users')->cascadeOnDelete(); $t->decimal('monto',15,2); $t->integer('plazo'); $t->text('motivo')->nullable(); $t->string('estado')->default('pendiente'); $t->timestamps(); }); }
 public function down(): void { Schema::dropIfExists('solicitudes'); }
};
