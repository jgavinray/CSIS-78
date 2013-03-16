


<?php

$appleMacBookPro = new computer;
$lameWindowsMachine = new computer;

$lameWindowsMachine->setCPU("Over Taxed with garbage");
$lameWindowsMachine->setRAM("Not Enough");
$lameWindowsMachine->setHD("HD Full of Virus'");

$appleMacBookPro->setCPU("Quad Core");
$appleMacBookPro->setRAM("16 Gigs");
$appleMacBookPro->setHD("512 GB SSD");

echo "<p>".$appleMacBookPro->getCPU()."<br>";
echo $appleMacBookPro->getRAM()."<br>";
echo $appleMacBookPro->getHD()."<br>";

echo "<p>".$lameWindowsMachine->getCPU()."<br>";
echo $lameWindowsMachine->getRAM()."<br>";
echo $lameWindowsMachine->getHD()."<br>";

class computer 
{
    private $CPU;
    private $RAM;
    private $HD;    // I prefer SSD...
    
    // Setters...
    public function setCPU($arg1)
    {
        $this->CPU = $arg1;
    }
    
    public function setRAM($arg1)
    {
        $this->RAM = $arg1;
    }
    
    public function setHD($arg1)
    {
        $this->HD = $arg1;
    }
    
    // Getters...
    public function getCPU()
    {
        // returns... if you wanted echos..
        // echo $this->CPU;
        return $this->CPU;
        
    }
    public function getRAM()
    {
        return $this->RAM;
    }
    public function getHD()
    {
        return $this->HD;
    }
}
/*
echo "hello world!";

$input = 10.00;


function salestax($arg1)
{
    $salestax = 91.75;
    return $arg1 / $salestax;
}
echo "Sales tax on ".$input." is ".salestax($input);
*/
?>
