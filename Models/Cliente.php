<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model as Eloquent;

class Cliente extends Eloquent
{
    protected $table = "clientes";

    protected $fillable = [
        "nombre",
        "email",
        "contrasena",
        "direccion",
        "telefono"
    ];

    protected $hidden = [
        "contrasena",
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}