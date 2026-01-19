<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = ['nombre', 'color'];

    public function curso():BelongsToMany{
        return $this->belongsToMany(Curso::class);
    }

    //casting the tipo (el Attribute tiene que ser eloquent)
    //esto hace que el nombre siempre se meta en la db en minuscula
    public function nombre(): Attribute{
        return Attribute::make(
            set: fn($v)=>strtolower($v),
        );
    }
}
