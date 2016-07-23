<?php

class resister_model extends Model{

	function __construct() {
        parent::__construct();
    }

    //processing create an user
    public function process(){
     	$user = new Users();

     	$salt = Hash::salt(32);//generate some random salt

     	try{
     		 $user->create( array(
	     		'name' => Input::get('name'),
	     		'mobile' => Input::get('mobile'),
	     		'email' => Input::get('email'),
	     		'password' => Hash::make(Input::get('password'),$salt),
	     		'salt' => $salt,
	     		'joined' => date('Y-m-d H:i:s')
     		));
     		 return 1;
     	}
     	catch(Exception $e){
			echo $e;
     		return 0;
     	}

    }

    //check if userid already resitered
    public function checkExists($validateValue=""){
        $this->user = new Users();
        $ret = $this->user->find($validateValue);
        return $ret;
    }

}

?>