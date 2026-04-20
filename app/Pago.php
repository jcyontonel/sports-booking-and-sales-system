<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pago';
    
    public function __construct(array $attributes = array())
    {
        /*if ( ! isset(static::$booted[get_class($this)]))
        {
            static::boot();

            static::$booted[get_class($this)] = true;
        }

        $this->fill($attributes);*/
        parent::__construct($attributes);
    }
}
