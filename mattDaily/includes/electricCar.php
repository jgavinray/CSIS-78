<?php

class electricCar extends car
{
    private $chargeTime;
    private $chargeRange;
    
    function __construct() 
    {
        echo "<p>Created an electric car class!";
    }
    //  Setters...
    public function setChargeTime($arg)
    {
        $this->chargeTime = $arg;
    }
    public function setChargeRange($arg)
    {
        $this->chargeRange = $arg;
    }
    
    //  Getters...
    public function getChargeTime()
    {
        return $this->chargeTime;
    }
    public function getChargeRange()
    {
        return $this->chargeRange;
    }
    
    public function printData()
    {
        parent::printData();
        echo "<br>".$this->chargeTime." is the required charge time for";
        echo "<br>".$this->chargeRange. " miles of travel.";
    }

    
}

?>
