
<?php
//  Created by J. Gavin Ray on 3/9/13.
//  Copyright (c) 2013 J. Gavin Ray. All rights reserved.

class product 
{
    private $number;
    private $name;
    private $lot;
    private $numberInBatch;
    private $batchSize;
    private $targetWeight;
    private $actualWeight;
    private $dateTime;
    
    // Designed to be the main method/Function to set all of an 
    // object's parameters in one shot. Perhaps an example of 
    // recursion? -- J. Gavin Ray (3/9/13)
    public function setProductParameters($number, $name, $lot, $numberInBatch, $batchSize, $targetWeight, $actualWeight, $dateTime)
    {
        setNumber($number);
        setName($name);
        setLot($lot);
        setNumberInBatch($numberInBatch);
        setBatchSize($batchSize);
        setTargetWeight($targetWeight);
        setActualWeight($actualWeight);
        setDateTime($dateTime);
    }
    
    // Setter Methods:
    // Each one of these methods is just to set an individual 
    // parameter for the product class.  This can no doubt
    // be condensed and rewritten to not have as many setter
    // methods.  The thinking behind this approach though is
    // that other members of the team may understand and
    // thus be able modify a simple setter as opposed to
    // one that is overly complex. -- J. Gavin Ray (3/9/13)
    public function setNumber($arg1)
    {
        $this->number = $arg1;
    }
    
    public function setName($arg1)
    {
        $this->name = $arg1;
    }
    
    public function setLot($arg1)
    {
        $this->lot = $arg1;
    }
    
    public function setNumberInBatch($arg1)
    {
        $this->numberInBatch = $arg1;
    }
    
    public function setBatchSize($arg1)
    {
        $this->batchSize = $arg1;
    }
    
    public function setTargetWeight($arg1)
    {
        $this->targetWeight = $arg1;
    }
    
    public function setActualWeight($arg1)
    {
        $this->actualWeight = $arg1;
    }
    public function setDateTime($arg1)
    {
        $this->dateTime = $arg1;
    }

    
    // Getter Methods:
    // These getter methods are to return a parameter from the
    // class for use in other functions or data manipulation.
    // -- J. Gavin Ray (3/9/13)
    public function getAll()
    {
        getNumber();
        getName();
        getLot();
        getNumberInBatch();
        getBatchSize();
        getTargetWeight();
        getActualWeight();
        getDateTime();
    }
    
    public function getNumber()
    {
        return $this->number;
    }
 
    public function getName()
    {
        return $this->name;
    }

    public function getLot()
    {
        return $this->lot;
    }
    
    public function getNumberInBatch()
    {
        return $this->numberInBatch;
    }
        
    public function getBatchSize()
    {
        return $this->batchSize;
    }
    
    public function getTargetWeight()
    {
        return $this->targetWeight;
    }

    public function getActualWeight()
    {
        return $this->actualWeight;
    }
    
    public function getDateTime()
    {
        return $this->dateTime;
    }

    // Echo Methods:
    // These echo methods display raw data to the browser.
    // -- J. Gavin Ray (3/9/13)
    public function echoAll()
    {
        echoNumber();
        echoName();
        echoLot();
        echoNumberInBatch();
        echoBatchSize();
        echoTargetWeight();
        echoActualWeight();
        echoDateTime();
    }
    
    public function echoNumber()
    {
        echo $this->number;
    }
 
    public function echoName()
    {
        echo $this->name;
    }

    public function echoLot()
    {
        echo $this->lot;
    }
    
    public function echoNumberInBatch()
    {
        echo $this->numberInBatch;
    }
        
    public function echoBatchSize()
    {
        echo $this->batchSize;
    }
    
    public function echoTargetWeight()
    {
        echo $this->targetWeight;
    }

    public function echoActualWeight()
    {
        echo $this->actualWeight;
    }
    
    public function echoDateTime()
    {
        echo $this->dateTime;
    }
    


}
?>
