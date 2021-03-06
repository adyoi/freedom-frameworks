<?php

/* 
 *	Freedom Frameworks Version 1.0 Beta
 *	This Frameworks built in Native PHP 5.5.15
 *	------------------------------------------
 *	Started_On : 11 Oct 2014 19:14
 *	File_name  : ./engine/Freedom_Controller.php
 *	--------------------------------------------
 *	Adi Apriyanto
 */
 
class FF_Controller {

	function __construct(){

		$this->notice(false);
		
		$this->view = new FF_View();
		
		$this->load = $this->loader();

		$this->load->library('Session');
		
		FF_Session::init();

	}
	
	public function loader() {

		return $this;

	}
	
	public function model ($name) {

		$path = 'models/'. $name . '_model.php';

		if(file_exists($path)){

			require 'models/'. $name . '_model.php';
			$modelName = $name . '_Model';
			$this->$name = new $modelName();

		}else{
		
			echo '<div class="alert alert-danger" role="alert" style="margin:40px auto 0;width:1110px;text-align:center">Model not exist</div>';
			
			return false;
		
		}
	
	}
	
	public function library ($name) {

		$path = 'libs/'. $name . '.php' ;

		if(file_exists($path)){

			require 'libs/'. $name . '.php';
			$libraryName = 'FF_' . $name;
			$this->$name = new $libraryName();

		}else{
		
			echo '<div class="alert alert-danger" role="alert" style="margin:40px auto 0;width:1110px;text-align:center">Library not exist</div>';
			
			return false;
		
		}
	
	}
	
	public function notice($bool = true) {
		
		if($bool){
		
			error_reporting(E_ALL & ~E_NOTICE);
		
		}else{
		
			error_reporting(E_ALL);
		}
	
	}

}

/*
 *
 *	This program is free software: you can redistribute it and/or modify
 *	it under the terms of the GNU General Public License as published by
 *	the Free Software Foundation, either version 3 of the License, or
 *	(at your option) any later version.
 *	
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU General Public License for more details.
 *	
 *	You should have received a copy of the GNU General Public License
 *	along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *	
 */