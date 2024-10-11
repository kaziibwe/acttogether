<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class TransactionsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Transaction::all();
    // }

    protected $memberId;

    public function __construct($memberId)
    {
        $this->memberId = $memberId;
    }

    public function collection()
    {
        // Retrieve transactions associated with the specific member ID
        // return Transaction::where('member_id', $this->memberId)->get();
        return Transaction::where('member_id', $this->memberId)
        ->select('id', 'transaction_id', 'amount','old_amount','new_amount','description') // Select only the necessary columns
        ->get();

    }


    public function headings(): array
    {
        return [
            'id',
            'traction_id',
            'amount',
            'old_amount',
            'new_amount',
            'description',



            // Add more headings as needed
        ];
    }
}
