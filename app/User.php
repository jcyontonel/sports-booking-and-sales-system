<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','apellidos', 'dni', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ]; 

    public function hasRole($role){
        $rol = null;
        switch($role){
            case 'cliente':
                $rol = $this->isCliente();
                break;
            case 'empleado':
                $rol = $this->isEmpleado();
                break;
            default: 
                return false;
                break;
        };
        if($rol)
            return $rol;
        else 
            return false;
            
    }
    public function isCliente()
    {
        $cliente = Cliente::where('iduser', $this->id)->first();
        if(!$cliente){
            $cliente = new Cliente();
            $cliente->iduser = Auth::user()->id;
            $cliente->save();
        }
        return $cliente;
    }
    public function isEmpleado()
    {   
        return Empleado::where('iduser', $this->id)->first();
    }
}
