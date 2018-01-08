<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Subscriber extends Model
{
    use AsList;
    use Boot;
    use CreatedUpdated;

    protected $fillable = [
        'name',
        'surname',
        'email',
    ];

    public function bunches(){
        return $this->belongsToMany(Bunch::class);
    }

    public function scopeOwned($query){
        return $query->where('created_by', Auth::user()->id);
    }

    public static function getAsListFiltered(Bunch $bunch) {
        $subscribers = $bunch->subscribers;
        $sub_arr = [];
        foreach ($subscribers as $subscriber) {
            $sub_arr[$subscriber->id] = $subscriber->name;
        }
        return static::getAsList()->diff($sub_arr);
    }
}
