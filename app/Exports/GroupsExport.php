<?php

namespace App\Exports;

use App\Models\Group;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GroupsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Group::select('group_name','group_location','group_phone','group_bank_account')->get();
    }




    public function headings(): array
    {
        return [
            'Group Name',
            'Group Location',
            'Group Phone Number',
            'Bank Account',

            // Add more headings as needed
        ];
    }
}
