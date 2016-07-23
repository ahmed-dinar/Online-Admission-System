<?php

class eligibility extends Controller{

    function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->view->render("eligibility/index");
    }

}