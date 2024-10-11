<?php

namespace App\Exports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class GroupMembersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */


    protected $groupMemberId;

    public function __construct($groupMemberId)
    {
        $this->groupMemberId = $groupMemberId;
    }
    public function collection()
    {
        return Member::where('group_id', $this->groupMemberId)->select('savers_surname', 'savers_given_name', 'savers_age', 'savers_nationality', 'savers_nin', 'savers_address', 'savers_pnumber_1', 'savers_pnumber_2', 'savers_occupation', 'savers_gender', 'savers_marital_status', 'savers_nok_name', 'savers_nok_address', 'savers_nok_number', 'savers_nok_occupation', 'nok_relationship')->get();
    }


    public function headings(): array
    {
        return [
            'Surname',
            'Given Name',
            'Age',
            'Address',
            'Phone 1',
            'Phone 2',
            'savers Occupation',
            'Gender',
            'Marital Status',
            'NOK Name',
            ' NOK Address',
            'NOK Number',
            'NOK Occupation ',
            'NOK Relationship ',

        ];
    }
}
