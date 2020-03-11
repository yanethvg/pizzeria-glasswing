<?php

namespace App\Imports;

use App\Ingredient;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class IngredientsImport implements ToModel,  WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Ingredient([
            'name_ingredient'=> $row[0],
            'price'=> $row[1]
        ]);
    }
}
