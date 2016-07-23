<?php

class home extends Controller{

	function __construct() {
        parent::__construct(); 
    }

	public function index(){

		$application = new Applications();
		if($application->isLoggedIn()){
			$this->view->render("apply/status");
		}else{
			$this->view->render("home/index");
		}
	}

}