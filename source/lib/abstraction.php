<?php

interface IRepository
{
	public function GetList();
	public function GetFruit(int $id);
}

interface IService
{
	public function GetList();
	public function GetFruit(int $id);
}


?>
