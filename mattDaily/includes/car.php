<?php

class car
{
    private $make;
    private $model;
    private $year;
    private $color;
    private $mpg;
    
    function __construct() 
    {
        echo "<p>Created a car class!";
    }
    //  Setters...
    public function setMake($arg)
    {
        $this->make = $arg;
    }
    
    public function setModel($arg)
    {
        $this->model = $arg;
    }
    
    public function setYear($arg)
    {
        $this->year = $arg;
    }
    
    public function setColor($arg)
    {
        $this->color = $arg;
    }
    
    public function setMpg($arg)
    {
        $this->mpg = $arg;
    }
    
    //  Getters...
    public function getMake()
    {
        return $this->make;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getYear()
    {
      return $this->year;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getMpg()
    {
        return $this->mpg;
    }
    
    // Print Data stuffs
    public function printData()
    {
        echo "<br>".$this->make;
        echo "<br>".$this->model;
        echo "<br>".$this->year;
        echo "<br>".$this->color;
        echo "<br>Gets ".$this->mpg." miles per gallon";
    }

}
?>
