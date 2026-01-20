<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Curso extends Model
{
    /** @use HasFactory<\Database\Factories\CursoFactory> */
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'disponible', 'imagen', 'user_id', 'category_id'];

    //relacion 1:n con user
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    //relacion 1:n con category
    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    //relacion n:m con tag
    public function tags():BelongsToMany{
        return $this->belongsToMany(Tag::class);
    }
}
