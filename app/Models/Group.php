<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function members(){
        return $this->hasMany(Member::class);
        // return $this->hasMany(Member::class);

    }
}
