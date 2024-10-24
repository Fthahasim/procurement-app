<?php

namespace App\Exports;

use App\Models\PurchaseOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PurchaseOrderExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $orders;
    public function __construct($orders)
    {
        $this->orders = $orders;
    }
    public function collection()
    {
        return collect($this->orders);
    }
    public function headings(): array
    {
        return [ 
            'Order No',
            'Order Date',
            'Supplier',
            'Item Total',
            'Discount',
            'Net Amount',
        ];
    }
}
