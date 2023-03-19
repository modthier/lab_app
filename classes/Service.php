<?php 
	
	use Carbon\Carbon;
	/**
	 * 
	 */
	class Service 
	{
		
		public $date ;

		use CRUD , check , connect;

		function __construct(\PDO $conn)
		{
			$this->conn = $conn;
			$this->date = Carbon::today()->format('Y-m-d');
		}


		public function checkService($patient_id)
		{
			$q = "select id from service_request where patient_id = ? and Date(created_at) = ? ";
			$stmt = $this->conn->prepare($q);
			$stmt->bindValue(1,$patient_id);
			$stmt->bindValue(2,$this->date);
			$stmt->execute();

			if ($stmt->rowCount() > 0) {
				return true;
			}else {
				return false;
			}
		}


		public function serviceToday()
		{
			$q = "select s.id , p.patient_name , s.referral , s.created_at
				  from service_request s left join patients p 
				  on s.patient_id = p.id 
				  where Date(s.created_at) = ?
				  order by 1 desc";
			$stmt = $this->conn->prepare($q);
			$stmt->bindValue(1,$this->date);
			$stmt->execute();

			return $stmt;
		}



		public function all()
		{
			$q = "select s.id , p.patient_name , s.referral , s.created_at
				  from service_request s left join patients p 
				  on s.patient_id = p.id
				  order by s.created_at desc
				  ";
			$stmt = $this->conn->prepare($q);
			$stmt->execute();

			return $stmt;
		}


		public function getPriceById($id)
		{
			$q = "select price from checkup where id = ?";
			$stmt = $this->conn->prepare($q);
			$stmt->bindValue(1,$id);
			$stmt->execute();

			$row = $stmt->fetch();

			$price = $row['price'];

			return $price;
		}


		public function checkRequestedTest($service_id,$test_id)
		{
			$q = "select id from labrequests where serviceid  = ? and checkupid = ?";
			$stmt = $this->conn->prepare($q);
			$stmt->bindValue(1,$service_id);
			$stmt->bindValue(2,$test_id);
			$stmt->execute();

			$count = $stmt->rowCount();

			if ($count > 0) {
				return true;
			}else {
				return false;
			}
		}


		public function searchReference($ref)
		{
			$q = "select id , reference from refs where reference like ?";
		    $stmt = $this->conn->prepare($q);
		    $stmt->bindValue(1,"%".$ref."%");
		    $stmt->execute();

		    return $stmt;
		}

		public function searchUnit($unit)
		{
			$q = "select id , unit from units where unit like ?";
		    $stmt = $this->conn->prepare($q);
		    $stmt->bindValue(1,"%".$unit."%");
		    $stmt->execute();

		    return $stmt;
		}


		public function checkLinkUnit($unit_id,$test_id)
		{
			$q = "select id from checkup_unit where unit_id = ? and test_id = ?";
			$stmt = $this->conn->prepare($q);
			$stmt->bindValue(1,$unit_id);
			$stmt->bindValue(2,$test_id);
			$stmt->execute();

			if ($stmt->rowCount() > 0) {
				return true;
			}else {
				return false;
			}
		}

		public function checkLinkRef($ref_id,$test_id)
		{
			$q = "select id from checkup_ref where ref_id = ? and test_id = ?";
			$stmt = $this->conn->prepare($q);
			$stmt->bindValue(1,$ref_id);
			$stmt->bindValue(2,$test_id);
			$stmt->execute();

			if ($stmt->rowCount() > 0) {
				return true;
			}else {
				return false;
			}

		}

		public function checkSelectValue($value,$test_id) {
			$q = "select select_value from checkup_select_values where TRIM(LOWER(select_value)) = ? and test_id = ?";
			$stmt = $this->conn->prepare($q);
			$stmt->bindValue(1,strtolower($value));
			$stmt->bindValue(2,$test_id);
			$stmt->execute();

			if ($stmt->rowCount() > 0) {
				return true;
			}else {
				return false;
			}
		}

		public function checkLinkTest($parent_id,$test_id)
		{
			$q = "select id from checkup_profile_tests where parent_id = ? and test_id = ?";
			$stmt = $this->conn->prepare($q);
			$stmt->bindValue(1,$parent_id);
			$stmt->bindValue(2,$test_id);
			$stmt->execute();

			if ($stmt->rowCount() > 0) {
				return true;
			}else {
				return false;
			}

		}


		public function getRefById($id)
	    {
	      $q = "select cf.id,cf.ref_id,r.reference 
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


	    public function getUById($id)
	    {
	      $q = "select cu.id,cu.unit_id,u.unit 
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


	    public function deleteLabrequest($test_id,$service_id)
	    {
	    	$q = "delete from labrequests where checkupid = ? and serviceid = ?";
			$stmt = $this->conn->prepare($q);
			$stmt->bindValue(1,$test_id);
			$stmt->bindValue(2,$service_id);
			$stmt->execute();

			$error = $stmt->errorInfo();

			if (empty($error)) {
				return true;
			}else {
				return $error;
			}
	    }

	    public function deleteAccountingRecord($test_id,$service_id)
	    {
	    	$q = "delete from accounting where item_id = ? 
	    		and service_id = ? and tab = 'lab' ";
			$stmt = $this->conn->prepare($q);
			$stmt->bindValue(1,$test_id);
			$stmt->bindValue(2,$service_id);
			$stmt->execute();

			$error = $stmt->errorInfo();

			if (empty($error)) {
				return true;
			}else {
				return $error;
			}
	    }


	    public function searchServiceByPatient($term,$date = "")
	    {
	    	
	    	if (func_num_args() == 2) {
		    	 $q = "SELECT s.id , p.patient_name , s.referral,s.created_at
		    	 FROM service_request s left join patients p
		    	 on s.patient_id = p.id
	             where (p.patient_name like ? or s.id = ?) and
	             Date(s.created_at) = ?
	             order by s.created_at desc";

	             $stmt = $this->conn->prepare($q);
	             $stmt->bindValue(1,"%".$term."%");
	             $stmt->bindValue(2,$term);
	             $stmt->bindValue(3,$date);
	             $stmt->execute();
	    	}else {
	    		$q = "SELECT s.id , p.patient_name , s.referral,s.created_at
		    	 FROM service_request s left join patients p
		    	 on s.patient_id = p.id
	             where (p.patient_name like ? or s.id = ?)
	             order by s.created_at desc";

	             $stmt = $this->conn->prepare($q);
	             $stmt->bindValue(1,"%".$term."%");
	             $stmt->bindValue(2,$term);
	             $stmt->execute();
	    	}
	    	

             return $stmt;
	    }


	   

	    public function cretaeInvoice($sid)
	    {
	    	$q = "SELECT  sum(price) as 'total_price'
	    	 FROM accounting 
             where service_id = ? and tab = 'lab' ";

             $stmt = $this->conn->prepare($q);
             $stmt->bindValue(1,$sid);
             $stmt->execute();

             $row = $stmt->fetch();

             $total_price = $row['total_price'];

             $data = [
             	'service_id' => $sid ,
             	'total_price' => $total_price
             ];

             $update = ['status' => 1];

             if ($this->checkInvoice($sid)) {
               $success = $this->updateTableById('invoices',$data,'service_id',$sid);
               if ($success) {
               		$this->updateTableById('accounting',$update,'service_id',$sid);
	             	return true;
	            }else {
	             	return flase;
	            }
             }else {
             	$success = $this->saveWithoutId('invoices',$data);
             	if ($success) {
             		$this->updateTableById('accounting',$update,'service_id',$sid);
	             	return true;
	            }else {
	             	return flase;
	            }
             }

	    }

	    public function checkInvoice($sid)
	    {
	    	$q = "SELECT  id  
	    	 FROM invoices 
             where service_id = ?";

             $stmt = $this->conn->prepare($q);
             $stmt->bindValue(1,$sid);
             $stmt->execute();

             if ($stmt->rowCount() > 0) {
             	return true;
             }else {
             	return false;
             }

             
	    }


	    public function getAccounts($offset,$limit)
	    {
	    	$q = "SELECT p.patient_name, a.service_id ,  sum(a.price) as 'total_price' , a.date
	    	 FROM accounting a left join service_request s
	    	 on a.service_id = s.id
	    	 left join patients p 
	    	 on s.patient_id = p.id
	    	 where a.tab = 'lab'
             GROUP by a.service_id
             order by a.date desc LIMIT $offset,$limit";

             $stmt = $this->conn->prepare($q);
             $stmt->execute();

             return $stmt;

             
	    }

	    public function getAccountsByDate($date_from,$date_to)
	    {
	    	$q = "SELECT p.patient_name, a.service_id ,  sum(a.price) as 'total_price' , a.date
	    	 FROM accounting a left join service_request s
	    	 on a.service_id = s.id
	    	 left join patients p 
	    	 on s.patient_id = p.id
	    	 where a.tab = 'lab'
	    	 and Date(a.date) between ? and ?
             GROUP by a.service_id
             order by a.date desc ";

             $stmt = $this->conn->prepare($q);
             $stmt->bindValue(1,$date_from);
             $stmt->bindValue(2,$date_to);
             $stmt->execute();

             return $stmt;

             
	    }


	    public function getAccountsToday()
	    {
	    	$q = "SELECT p.patient_name, a.service_id ,  sum(a.price) as 'total_price' , a.date
	    	 FROM accounting a left join service_request s
	    	 on a.service_id = s.id
	    	 left join patients p 
	    	 on s.patient_id = p.id
	    	 where a.tab = 'lab'
	    	 and Date(a.date) = ?
             GROUP by a.service_id
             order by a.date desc ";

             $stmt = $this->conn->prepare($q);
             $stmt->bindValue(1,Carbon::today()->format('Y-m-d'));
             $stmt->execute();

             return $stmt;

             
	    }


	    public function getAccountsByPatient($patient)
	    {
	    	$q = "SELECT p.patient_name, a.service_id ,  sum(a.price) as 'total_price' , a.date
	    	 FROM accounting a left join service_request s
	    	 on a.service_id = s.id
	    	 left join patients p 
	    	 on s.patient_id = p.id
	    	 where a.tab = 'lab'
	    	 and p.patient_name like ?
             GROUP by a.service_id
             order by a.date desc ";

             $stmt = $this->conn->prepare($q);
             $stmt->bindValue(1,"%".$patient."%");
             $stmt->execute();

             return $stmt;

             
	    }

	    


	    public function getAccountDetails($sid)
	    {
	    	$q = "SELECT  c.checkup_name ,  a.price , a.status , a.date
	    	 FROM accounting a left join checkup c
	    	 on a.item_id = c.id
	    	 where a.service_id = ? and a.tab = 'lab'
             order by a.date desc";

             $stmt = $this->conn->prepare($q);
             $stmt->bindValue(1,$sid);
             $stmt->execute();

             return $stmt;

             
	    }

	    

	    public function printAllTests($sid) {
	    	
	    	$q = "select lb.id , lb.checkupid ,
	    	      lb.serviceid , c.checkup_type , c.checkup_value
	    		  from labrequests lb left join checkup c 
	    		  on lb.checkupid = c.id
	    		  where lb.serviceid = ?
	    		  order by c.checkup_type desc
	    		 ";

	    	$stmt = $this->conn->prepare($q);
	    	$stmt->bindValue(1,$sid);
	    	$stmt->execute();

	    	return $stmt;
	    }


		public function getLastPosition($parent_id)
		{
			$q = "select max(position) as pos from checkup_profile_tests where parent_id = ?";
			$stmt = $this->conn->prepare($q);
			$stmt->bindValue(1,$parent_id);
			$stmt->execute();

			$row = $stmt->fetch();

			return $row['pos'];
		}
	}


 ?>