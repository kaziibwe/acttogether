<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    public function group(){
        // return $this->belongsTo(Group::class,'group_id');
        return $this->belongsTo(Group::class, 'group_id');

    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
        // return $this->hasMany(Member::class);
    }
}
