<?php

class login_model extends Model{

	function __construct() {
        parent::__construct();
    }

    public function process(){

        $this->application = new Applications();

       /* $this->user = new Users();
        $remember = false;
        if( isset($_POST['remember']) && $_POST['remember'] == 'on' ) {
            $remember = true;
        }*/
 
        $mobile = SANATIZE::escape($_POST['mobile']);
        $password = SANATIZE::escape($_POST['password']);

        $login = $this->application->login($mobile, $password);
       
       // $login = $this->user->login($mobile, $password, $remember);
            
        return $login;
    }

    public function logout(){
        $user = new Users();
        $user->logout();
        header("Location: ".SITE_URL."/login");
    }

}
?>