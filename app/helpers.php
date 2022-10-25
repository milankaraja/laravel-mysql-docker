<?php

function asDollars($value) {
    if ($value<0) return "-".asDollars(-$value);
    return '$' . number_format($value, 2);
  }

function presentPrice($price)
{
        return asDollars($price/100);

}



