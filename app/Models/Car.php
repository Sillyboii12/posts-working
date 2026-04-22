<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Car{

    private $name;
    private $year;
    private $totalDistance;

    function __construct($name, $year, $totalDistance)
    {
        $this->name = $name;
        $this->year = $year;
        $this->totalDistance = $totalDistance;
    }
    function showTotalDistance()
    {
        echo "Total distance: " . $this->totalDistance . "\n";
        return $this->totalDistance;
    }
    function drive($distance)
    {
        if ($distance > 0)
        {
            $this->totalDistance += $distance;
        }
    }
    static function create($data)
    {
        return new Car($data[0], $data[1], $data[2]);
    }
    function toHtml()
    {
        return "<h1>$this->name</h1>
        <p>Made in $this->year</p>
        <p>With a total mileage of $this->totalDistance km</p>";
    }

}

