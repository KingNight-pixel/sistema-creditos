<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void { Schema::create('creditos', function(Blueprint $table){ $table->id(); $table->foreignId('cliente_id')->constrained('clientes')->cascadeOnDelete(); $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete(); $table->decimal('monto',15,2); $table->decimal('interes',5,2)->default(0); $table->integer('plazo'); $table->decimal('cuota',15,2)->default(0); $table->decimal('saldo',15,2)->default(0); $table->enum('estado',['pendiente','aprobado','rechazado','activo','pagado','vencido'])->default('activo'); $table->date('fecha_inicio')->nullable(); $table->date('fecha_fin')->nullable(); $table->timestamps(); }); }
 public function down(): void { Schema::dropIfExists('creditos'); }
};
