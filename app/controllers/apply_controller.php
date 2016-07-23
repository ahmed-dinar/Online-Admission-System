<?php

class apply extends Controller{

    function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->view->render("apply/index");
    }

    public function success(){

        if( !Session::exists('apply_success') ){
            Redirect::to(SITE_URL.'/apply');
            return;
        }

        $this->view->render("apply/success");
    }

    public  function run(){

        if( !Input::exists('post') || !Token::check(Input::get('token')) ) {
            return miscellaneous::Error();
        }

        if( Input::get('agree') !== 'on' ){
            Session::flush('form_error',array('please agree'));
            Redirect::to(SITE_URL.'/apply');
            return;
        }

        $form = array(
            'semester' => Input::get('semester'),
            'program' => Input::get('program'),
            'name' => Input::get('name'),
            'father' => Input::get('father'),
            'mother' => Input::get('mother'),
            'gender' => Input::get('gender'),
            'dob' => Input::get('dob'),
            'mobile' => Input::get('mobile'),
            'email' => Input::get('email'),
            'nationality' => Input::get('nationality'),
            'present' => Input::get('present'),
            'permanent' => Input::get('permanent'),
            'ssc_school' => Input::get('ssc-school'),
            'ssc_roll' => Input::get('ssc-roll'),
            'ssc_year' => Input::get('ssc-year'),
            'ssc_group' => Input::get('ssc-group'),
            'ssc_gpa' => Input::get('ssc-gpa'),
            'ssc_board' => Input::get('ssc-board'),
            'hsc_school' => Input::get('hsc-school'),
            'hsc_roll' => Input::get('hsc-roll'),
            'hsc_year' => Input::get('hsc-year'),
            'hsc_group' => Input::get('hsc-group'),
            'hsc_gpa' => Input::get('hsc-gpa'),
            'hsc_board' => Input::get('hsc-board')
        );

        $validation = $this->validate($form);

        if(count($validation)){
            //foreach ($validation as $val){
              //  echo $val.'<br>';
            //}
            Session::flush('form_error',$validation);
            Redirect::to(SITE_URL.'/apply');
            return;
        }


        if( $secret = $this->model->process($form) ){

            Session::flush('apply_success',$secret);
            Redirect::to(SITE_URL.'/apply/success');

        }else{
            echo 'DATATBASE ERROR';
        }



    }

    private function validate($form){
        $ret = array();
        foreach(miscellaneous::applyForm() as $inputs){
            if( !isset($form[$inputs]) || $form[$inputs] == null || !strlen($form[$inputs]) ){
                array_push($ret,'invalid or empty '.$inputs);
            }
        }
        return $ret;
    }


}