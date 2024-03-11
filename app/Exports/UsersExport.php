<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Admin;
use App\Models\Group;
use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Group::all();
    }
}
