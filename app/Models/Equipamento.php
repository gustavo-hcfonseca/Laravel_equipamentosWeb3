<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Categoria;
use App\Models\Fabricante;

class Equipamento extends Model
{
    use HasFactory;
    protected $table = 'equipamento';
    public $timestamps = false;
    protected $casts = [
        'data' => 'datetime:Y-m-d',
    ];
    public function categoria(): BelongsTo
    {
       return $this->belongsTo(Categoria::class);
    }

    public function fabricante(): BelongsTo
    {
       return $this->belongsTo(Fabricante::class);
    }
}
//'equipamento_id','id')-> withDefault(['nome'=>'Sem equipamento']);