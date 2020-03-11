<?php

namespace App\Exports;

use App\Ingredient;
use Maatwebsite\Excel\Concerns\FromCollection;

class IngredientsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ingredient::select('name_ingredient','price')->get();
    }
}
