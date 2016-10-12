<?php
class Student {
    private $studId;
    private $studName, $studIc;
    private $studAge;

    // constructor
    public function __construct($studId, $studName, $studIc, $studAge) {
        $this->studId = $studId;
        $this->studName = $studName;
        $this->studIc = $studIc;
        $this->studAge = $studAge;
    }

    // setter
    public function setStudId($studId) { $this->studId = $studId; }
    public function setStudName($studName) { $this->studName = $studName; }
    public function setStudIc($studIc) { $this->studIc = $studIc; }
    public function setStudAge($studAge) { $this->studAge = $studAge; }

    // getter
    public function getStudId() { return $this->studId; }
    public function getStudName() { return $this->studName; }
    public function getStudIc() { return $this->studIc; }
    public function getStudAge() { return $this->studAge;}
}

?>