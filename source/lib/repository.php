<?php
	require_once("mysql.class.php");
	require_once("abstraction.php");

	class Repository implements IRepository
	{

		public function GetList()
		{
			$sql = "
				SELECT * FROM FRUITS 
			"; 

			$result =$this->ExecuteQuery($sql);
			return $result;
		}

		public function GetFruit(int $id)
		{
			$param_id = MySQL::SQLValue( $id, MySQL::SQLVALUE_NUMBER);
			$sql = "
				SELECT * FROM FRUITS WHERE id = ".$param_id;

			$result =$this->ExecuteQuery($sql);
			return $result;
		}

		private function ExecuteQuery($sqlString, $IsSingleValue = null)
		{
			$db = new MySQL();
			if (! $db->Open()) {
				$db->Kill("Cant connect to database");
			}

			if (isset($IsSingleValue) && $IsSingleValue != null && $IsSingleValue == true )
			{
				$result = $db->QuerySingleValue($sqlString);
			}
			else
			{
				$result = $db->QueryArray($sqlString, MYSQLI_ASSOC);
				if ($result==null)
					$result = [];
			}

			$db->Close();
			return $result;
		}
	}

?>
