<?php
/**
 * Created by PhpStorm.
 * User: modth
 * Date: 1/29/2019
 * Time: 9:26 AM
 */

class patients
{
    use CRUD,connect,check;
    public $id;
    public $patientName;
    public $birthDate;
    public $gender;
    public $hasInsurance;
    public $typeId;

    /**
     * patients constructor.
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    
    public function searchByName($name) {
        $q = "SELECT * FROM patients WHERE  patient_name like ?";
        $stmt = $this->conn->prepare($q);
        $stmt->bindValue(1,"%".$name."%");
        $stmt->execute();
        
        return $stmt;
    }

    public function getVisits($date){
        $q = "SELECT * FROM service_request WHERE DATE(date_created) = ? ";
        $stmt = $this->conn->prepare($q);
        $stmt->bindValue(1,$date);
        $stmt->execute();

        return $stmt;
    }


    public function labrequests($date){
        $q = "SELECT * FROM labrequests WHERE DATE(dateCreated) = ? and status = 0";
        $stmt = $this->conn->prepare($q);
        $stmt->bindValue(1,$date);
        $stmt->execute();

        return $stmt;
    }


    public function getDistictCheckUp($date)
    {
        $q = "SELECT DISTINCT(serviceid) FROM labrequests where Date(dateCreated) = ?";
        $stmt = $this->conn->prepare($q);
        $stmt->bindValue(1,$date);
        $stmt->execute();

        return $stmt;
    }

    public function getPatientByServiceId($id){
      
        $stmt = $this->findById('service_request' , 'id' , $id);
        $row = $stmt->fetch();
        $patientId = $row['patient_id'];

        $st = $this->findById('patients' , 'id' , $patientId);
        return $st;
        
    }

    public function getOnePatientByServiceId($id) {
        $stmt = $this->findById('service_request' , 'id' , $id);
        $row = $stmt->fetch();
        $patientId = $row['patient_id'];

        $st = $this->findById('patients' , 'id' , $patientId);
        $r = $st->fetch();
        return $r['patient_name'];
    }


    public function getCheckupByServiceId($id){
      
        $stmt = $this->findById('labrequests' , 'serviceid' , $id);
        return $stmt;
        
    }


    public function getCheckupTypeName($id)
    {
        $checkupType = $this->findById('checkup_types' , 'id' , $id);
        $row = $checkupType->fetch();
        $name = $row['type'];
        return $name;
    }

    public function getCheckupName($id)
    {
        $checkupTypeName = $this->findById('checkup' , 'id' , $id);
        $row = $checkupTypeName->fetch();
        $name = $row['checkup_name'];
        return $name;
    }

    

    public function searchPatient($term)
    {
        $q = "select * from patients where patient_name like ?";
        $stmt = $this->conn->prepare($q);
        $stmt->bindValue(1,"%".$term."%");
        $stmt->execute();

        return $stmt;
    }





   

}