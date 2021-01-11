<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model as Eloquent;

class Pedido extends Eloquent
{
    protected $table = "pedidos";

    protected $casts = [
        'created_at' => 'date:Y-m-d',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}