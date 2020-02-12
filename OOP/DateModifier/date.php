<?php

class DateModifier
{
    public $firstDate;
    public $secondDate;

    public function __construct($firstDate, $secondDate)
    {
        $this->firstDate = $firstDate;
        $this->secondDate = $secondDate;
    }

    public function difference()
    {
        $date1 = date_create($this->firstDate);
        $date2 = date_create($this->secondDate);

        $diff = date_diff($date1, $date2);
        
        // $years = floor($diff / (365 * 60 * 60 * 24));
        // $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        // $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
        
        return $diff->format("%R%a days");
    }
}

$input = [
    '1992 05 31',
    '2016 06 17'
];

$difference = new DateModifier($input[0], $input[1]);

echo $difference->difference();
