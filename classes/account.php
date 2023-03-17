<?php 
   
    use Carbon\Carbon;
	
	class account 
	{

		use CRUD , check , connect;

		function __construct(\PDO $conn)
		{
			$this->conn = $conn;
		}

		public function totalToday() {
			$q = "SELECT  sum(amount_paid) as 'total_price'
	    	 FROM invoices 
             where  Date(created_at) = ?  ";

             $stmt = $this->conn->prepare($q);
             $stmt->bindValue(1,Carbon::today()->format('Y-m-d'));
             $stmt->execute();

             $sum = $stmt->fetch();
             return $sum['total_price'];
		}


		public function totalWeek() {

			Carbon::setWeekStartsAt(Carbon::SATURDAY);
            Carbon::setWeekEndsAt(Carbon::FRIDAY);

			$q = "SELECT  sum(amount_paid) as 'total_price'
             FROM invoices 
             where  (Date(created_at) between ? and ?)  ";

             $stmt = $this->conn->prepare($q);
             $stmt->bindValue(1,Carbon::now()->startOfWeek()->format('Y-m-d'));
             $stmt->bindValue(2,Carbon::now()->endOfWeek()->format('Y-m-d'));
             $stmt->execute();

             $sum = $stmt->fetch();
             return $sum['total_price'];
		}


		public function totalMonth() {

			Carbon::setWeekStartsAt(Carbon::SATURDAY);
            Carbon::setWeekEndsAt(Carbon::FRIDAY);

			$q = "SELECT  sum(amount_paid) as 'total_price'
             FROM invoices
             where  (Date(created_at) between ? and ?)  ";

             $stmt = $this->conn->prepare($q);
             $stmt->bindValue(1,Carbon::now()->startOfMonth()->format('Y-m-d'));
             $stmt->bindValue(2,Carbon::now()->endOfMonth()->format('Y-m-d'));
             $stmt->execute();

             $sum = $stmt->fetch();
             return $sum['total_price'];
		}


		public function inoviceAmount($service_id){
			$q = "SELECT  sum(amount_paid) as 'amount_paid'
             FROM invoices 
             where service_id = ?  ";

            $stmt = $this->conn->prepare($q);
            $stmt->bindValue(1,$service_id);
            $stmt->execute();

            $amount_paid = $stmt->fetch();
            return $amount_paid['amount_paid'];
		}

		// public function inoviceAmountRem($service_id){
		// 	$q = "SELECT  sum(remaining_amount) as 'remaining_amount'
  //            FROM invoices 
  //            where service_id = ?  ";

  //           $stmt = $this->conn->prepare($q);
  //           $stmt->bindValue(1,$service_id);
  //           $stmt->execute();

  //           $remaining_amount = $stmt->fetch();
  //           return $remaining_amount['remaining_amount'];
		// }


		


		
	}

 ?>