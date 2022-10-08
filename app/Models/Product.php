<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    private function asDollars($value) {
        if ($value<0) return "-".asDollars(-$value);
        return '$' . number_format($value, 2);
      }

    public function presentPrice()
    {
        return $this->asDollars($this -> price/100);

    }
}
