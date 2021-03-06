<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Bunch extends Model
{
    use Boot;
    use AsList;
    use CreatedUpdated;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    public function subscribers(){
        return $this->belongsToMany(Subscriber::class);
    }

    public function campaigns(){
        return $this->hasMany(Campaign::class);
    }

    public function scopeOwned($query){
        return $query->where('created_by', Auth::user()->id);
    }

    public static function getAsListFiltered(Subscriber $subscriber) {
        $bunches = $subscriber->bunches;
        $bunch_arr = [];
        foreach ($bunches as $bunch) {
            $bunch_arr[$bunch->id] = $bunch->name;
        }
        return static::getAsList()->diff($bunch_arr);
    }
}
