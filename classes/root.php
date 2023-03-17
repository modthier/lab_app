<?php

use Carbon\Carbon;

class root
{
    use check,connect,CRUD;

     public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }


    public function getUser($test_id,$request_id,$service_id,$type)
    {
      if($type['checkup_type'] == 'single'){
        $q = "select user_id 
            from results 
            where test_id = ? and request_id = ? and service_id = ?
            limit 1";

        $stmt = $this->conn->prepare($q);
        $stmt->bindValue(1,$test_id);
        $stmt->bindValue(2,$request_id);
        $stmt->bindValue(3,$service_id);
        $stmt->execute();
      
        $row = $stmt->fetch();        
        $user = $row['user_id'];
        return $user;
      }else {
        $q = "select user_id 
            from results 
            where parent_id = ? and request_id = ? and service_id = ?
            limit 1";

        $stmt = $this->conn->prepare($q);
        $stmt->bindValue(1,$test_id);
        $stmt->bindValue(2,$request_id);
        $stmt->bindValue(3,$service_id);
        $stmt->execute();
      
        $row = $stmt->fetch();        
        $user = $row['user_id'];
        return $user;
      }
      
    }

     public  function getDistictCheckUp($date,$offset = 0,$limit = 0)
    {
        $q = "SELECT DISTINCT(serviceid) FROM labrequests 
           where Date(dateCreated) = ?  ORDER BY 1 DESC LIMIT $offset,$limit";
        $stmt = $this->conn->prepare($q);
        $stmt->bindValue(1,$date);
        $stmt->execute();

        return $stmt;
    }


    public function getOnePatientByServiceId($id) {
        $stmt = $this->findById('service_request' , 'id' , $id);
        $row = $stmt->fetch();
        $patientId = $row['patient_id'];

        $st = $this->findById('patients' , 'id' , $patientId);
        $r = $st->fetch();
        return $r['patient_name'];
    }

    public function getPatientByServiceId($id) {
        $stmt = $this->findById('service_request' , 'id' , $id);
        $row = $stmt->fetch();
        $patientId = $row['patient_id'];

        $st = $this->findById('patients' , 'id' , $patientId);
        
        return $st;
    }


    public function getTestsByServiceId($id) {
        $stmt = $this->findById('labrequests' , 'serviceid' , $id);
        return $stmt;
    }


    public function getTestName($id) {

        $st = $this->findById('checkup' , 'id' , $id);
        $r = $st->fetch();

        $name = $r['checkup_name'];
        return $name;
    }


    public function getTestSelection($id,$type="")
    {
       $st = $this->findById('checkup_select_values' , 'test_id' , $id);
       

          $output = "";
          
          if (!empty($type) && $type == "profile") {
            $output .= "<select name='result-{$id}' class='custom-select' required>\n ";
          }else {
            $output .= "<select name='result' class='custom-select' required>\n ";
          }
          
          $output .= "<option></option>\n";
          while ($row = $st->fetch()) {
             $output .= "<option value='".$row['select_value']."'>".$row['select_value']."</option>\n";
          }
          $output .= "</select>\n";
       

       return $output;
    }


     public function getTestSelectionList($id)
    {
       $st = $this->findById('checkup_select_values' , 'test_id' , $id);

       return $st;
    }


    public function getRefrance()
    {
      $stmt = $this->displayNormal('refs');
      return $stmt;
    }


    public function getUnits()
    {
      $stmt = $this->displayNormal('units');
      return $stmt;
    }


    public function getProfileTest($id)
    {
       $q = "select cpt.id , cpt.test_id , c.checkup_name, c.checkup_value, 
             cpt.position
             from checkup c left join checkup_profile_tests cpt 
             on c.id = cpt.test_id
             where cpt.parent_id = ? order by cpt.position ";
        $stmt = $this->conn->prepare($q);
        $stmt->bindValue(1,$id);
        $stmt->execute();

        return $stmt;
    }

    


    public function searchCheckup($name)
    {
      $q = "select id , checkup_name from checkup where checkup_name like ? 
      and checkup_type in ('appearance','single')";
      $stmt = $this->conn->prepare($q);
      $stmt->bindValue(1,"%".$name."%");
      $stmt->execute();

      return $stmt;
    }


     public function searchCheckupAll($name)
    {
      $q = "select * from checkup where checkup_name like ?";
      $stmt = $this->conn->prepare($q);
      $stmt->bindValue(1,"%".$name."%");
      $stmt->execute();

      return $stmt;
    }


    public function getTestResult($test_id,$request_id,$service_id)
    {
      
        $q = "select r.id , r.test_id ,   
            c.checkup_name,c.checkup_type,c.checkup_value , 
            r.result ,r.reference_id,r.unit_id
            from results r left join checkup c
            on r.test_id = c.id
            where r.test_id = ? and r.request_id = ? and r.service_id = ?";

        $stmt = $this->conn->prepare($q);
        $stmt->bindValue(1,$test_id);
        $stmt->bindValue(2,$request_id);
        $stmt->bindValue(3,$service_id);
        $stmt->execute();
      
      

        return $stmt;
    }

    public function getTestResults($request_id,$service_id,$parent_id)
    {
      $q = "select r.id , r.test_id , c.checkup_name,
            c.checkup_type, c.checkup_value , 
            r.result ,r.reference_id,r.unit_id
            from results r left join checkup c
            on r.test_id = c.id
            where r.request_id = ? 
            and r.service_id = ? and r.parent_id = ?";

        $stmt = $this->conn->prepare($q);
        $stmt->bindValue(1,$request_id);
        $stmt->bindValue(2,$service_id);
        $stmt->bindValue(3,$parent_id);
        $stmt->execute();

        return $stmt;
    }

    public function getTypeAndValue($test_id)
    {
       $st = $this->findById('checkup' , 'id' , $test_id);
       $r = $st->fetch();

        
       return $r;
    }

    public function getValue($test_id)
    {
       $st = $this->findById('checkup' , 'id' , $test_id);
       $r = $st->fetch();
       return $r['checkup_value'];
    }


    public function getTestSelectionUpdate($id,$result,$type="")
    {
      $st = $this->findById('checkup_select_values' , 'test_id' , $id);
       

          $output = "";
          
          if (!empty($type) && $type == "profile") {
            $output .= "<select name='result-{$id}' class='custom-select' required>\n ";
          }else {
            $output .= "<select name='result' class='custom-select' required>\n ";
          }
          
          $output .= "<option></option>\n";
          while ($row = $st->fetch()) {
           if($row['select_value'] == $result) {
             $output .= "<option value='".$row['select_value']."' selected >".$row['select_value']."</option>\n";
           }else {
             $output .= "<option value='".$row['select_value']."'>".$row['select_value']."</option>\n";
           }
         
          }
          $output .= "</select>\n";
       

       return $output;

    }


    public function getRefranceById($id)
    {
      $q = "select r.id,r.reference 
            from refs r left join checkup_ref cf 
            on r.id = cf.ref_id
            left join checkup c 
            on c.id = cf.test_id 
            where cf.test_id = ?";

      $stmt = $this->conn->prepare($q);
      $stmt->bindValue(1,$id);
      $stmt->execute();

      return $stmt;
    }


    public function getUnitById($id)
    {
      $q = "select u.id,u.unit 
            from units u left join checkup_unit cu
            on u.id = cu.unit_id
            left join checkup c 
            on c.id = cu.test_id 
            where cu.test_id = ?";

      $stmt = $this->conn->prepare($q);
      $stmt->bindValue(1,$id);
      $stmt->execute();

      return $stmt;
    }


    function canShow(\Delight\Auth\Auth $auth) {
        return $auth->hasAnyRole(
            \Delight\Auth\Role::ADMIN,
            \Delight\Auth\Role::MANAGER

        );
    }


    function canAccess(\Delight\Auth\Auth $auth) {
        return $auth->hasAnyRole(
            \Delight\Auth\Role::ADMIN

        );
    }



    function canShowLab(\Delight\Auth\Auth $auth) {
        return $auth->hasAnyRole(
            \Delight\Auth\Role::ADMIN,
            \Delight\Auth\Role::EMPLOYEE

        );
    }

   

}
