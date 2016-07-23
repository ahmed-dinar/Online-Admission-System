<?php

class payment extends Controller{

    function __construct() {
        parent::__construct();
    }

    public function index(){
        echo 'nope';
    }

    public function instruction(){
        $this->view->render("payment/instruction");
    }


}