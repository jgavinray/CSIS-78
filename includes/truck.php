<?php


class truck extends car
{
    private $maxWeighload;
    private $numberOfAxels;
    
    function __construct() 
    {
        echo "<p>Created a truck class!";
    }
    /*
    public function setAll($arg1, $arg2, $arg3, $arg4, $arg5, $arg6, $arg7)
    {
        $parent->make = $arg1;
        
    }
     * */
     
    //  Setters...
    public function setMaxWeighload($arg)
    {
        $this->maxWeighload = $arg;
    }
    public function setNumberOfAxels($arg)
    {
        $this->numberOfAxels = $arg;
    }
    
    //  Getters...
    public function getMaxWeighload()
    {
        return $this->maxWeighload;
    }
    public function getNumberOfAxels()
    {
        return $this->numberOfAxels;
    }
    
    //  printData
    public function printData()
    {
        parent::printData();
        echo "<br>".$this->maxWeighload." is the maximum load";
        echo "<br>".$this->numberOfAxels." axels";
    }

    
}
?>
