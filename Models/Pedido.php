<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model as Eloquent;

class Pedido extends Eloquent
{
    protected $table = "pedidos";

    public function cliente()
    {
        $this->belongsTo(Cliente::class);
    }
}