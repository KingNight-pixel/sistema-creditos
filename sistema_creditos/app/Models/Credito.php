<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Credito extends Model {
 protected $table='creditos';
 protected $fillable=['user_id','cliente_id','monto','interes','plazo','cuota','saldo','estado','fecha_inicio','fecha_fin'];
 protected $casts=['fecha_inicio'=>'date','fecha_fin'=>'date','monto'=>'decimal:2','saldo'=>'decimal:2'];
 public function usuario(): BelongsTo { return $this->belongsTo(User::class,'user_id'); }
 public function cliente(): BelongsTo { return $this->belongsTo(Cliente::class,'cliente_id'); }
 public function getTotalCreditoAttribute(): float { return (float) $this->monto + ((float) $this->monto * (float) $this->interes / 100); }
 public function getSaldoPendienteAttribute(): float { return (float) $this->saldo; }
}
