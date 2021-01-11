<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model as Eloquent;

class Cliente extends Eloquent
{
    protected $table = "clientes";

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}