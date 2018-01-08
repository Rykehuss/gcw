<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Template extends Model
{
    use Boot;
    use AsList;
    use CreatedUpdated;

    protected $fillable = [
        'name',
        'content',
    ];

    public function campaigns(){
        return $this->hasMany(Campaign::class);
    }

    public function scopeOwned($query){
        return $query->where('created_by', Auth::user()->id);
    }
}
