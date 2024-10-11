<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function member(){
        // return $this->belongsTo(Group::class,'group_id');
        return $this->belongsTo(Member::class, 'member_id');

    }

}
