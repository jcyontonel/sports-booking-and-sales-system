<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }
    public static function getOrGenerate($user)
    {
        $cliente = Cliente::find($user->id);
        if( !$cliente ){
            $cliente = new Cliente();
            $cliente->iduser = $user->id;
            $cliente->save();
        }
        return $cliente;
    }
}
