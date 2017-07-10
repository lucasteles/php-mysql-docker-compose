<?php
require_once("lib/abstraction.php");
require_once("lib/repository.php");
require_once("lib/service.php");

class Factory 
{	
	public static function GetRepositoryImplementation() : IRepository
	{
		return new Repository();
	}

	public static function GetServiceImplementation(IRepository $repository = null) : IService
	{
		if ($repository == null)
			$repository = Factory::GetRepositoryImplementation();

		return new Service($repository);
	}
}
?>
