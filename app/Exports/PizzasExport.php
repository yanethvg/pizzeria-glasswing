<?php

namespace App\Exports;

use App\Pizza;
use Maatwebsite\Excel\Concerns\FromCollection;

class PizzasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pizza::select('name_pizza','price')->get();
    }
}
