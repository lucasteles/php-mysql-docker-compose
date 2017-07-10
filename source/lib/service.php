<?php
	require_once("repository.php");
	require_once("abstraction.php");
	require_once("validate.class.php");

	class Service implements IService {
		
		private $_repository = null;
		private $_validate = null;

		public function __construct(IRepository $repos)
		{
			if (! isset($repos) || $repos == null )
				die("Repository not defined");
			
			$this->_validate = new Validate();
			$this->_repository = $repos;
		}

		public function GetList()
		{
			$result = $this->_repository->GetList();
			$this->BuildResponse($result);
		}

		public function GetFruit(int $id)
		{
			$result = $this->_repository->GetFruit($id);
			$this->BuildResponse($result);
		}
		private function BuildResponse($data)
		{
			$json = json_encode($data);
			header('Access-Control-Allow-Origin: *');

			print("{'data':");
			print_r($json);
			print("};");
		}

	}
?>
