<?php


/*
    Handle Users activities
*/
class Applications {

    private $_db,
        $_data,
        $_cookieName,
        $_sessionName,
        $_table = 'applications',
        $_isLoggedIn;

    function __construct($application = null, $secret=null) {


        $this->_db = DB::getInstance(); //connect with database

        $this->_sessionName = Config::get('session/session_name');
        //$this->_cookieName = Config::get('remember/cookie_name');

        if(!$application){
            if(Session::exists($this->_sessionName)){
                $application = Session::get($this->_sessionName);

                if($this->findById($application)){
                    $this->_isLoggedIn = true;
                }
                else{
                    $this->_isLoggedIn = false;
                }
            }
        }
        else{
            $this->find($application,$secret);
        }

    }

    public function update($fields = array(), $id = null){

        if(!$id && $this->isLoggedIn() ){
            $id = $this->data()->id;
        }


        if( !$this->_db->update($this->_table, $id, $fields) ){
            throw new Exception('Problem Updating!');
        }
    }

    public function create($fields = array()){
        return $this->_db->insert($this->_table,$fields);
    }



    /*
        find a user in database
    */
    public function find($mobile = null,$secret = null){
        if($mobile && $secret){

            $sql = "SELECT * FROM {$this->_table} WHERE `mobile` = ? && `secret` = ?";
            $params = array($mobile,$secret);

            $data = $this->_db->raw($sql,$params);
            

            if($data->count()){
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    public function findById($id = null){
        if($id){
            $field = 'id';
            $data = $this->_db->get($this->_table, array($field,'=',$id));

            if($data->count()){
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }


    /*
        loging in a user with remember functionality
    */
    public function login($mobile = null, $secret = null){

        if(!$mobile && !$secret && $this->exists()  ){
            Session::put($this->_sessionName, $this->data()->id);
        }
        else{


            $application = $this->find($mobile,$secret);


            if($application){


                    Session::put($this->_sessionName, $this->data()->id);
                    //put this user id in session

                    return true;

            }

        }
        return false;
    }



    public function exists(){
        return (!empty($this->_data)) ? true : false;
    }

    //log out a user
    public function logout(){

        //delete this user session and cookie

        $this->_db->delete('users_session', array('user_id','=',  $this->data()->id) );

        Session::delete($this->_sessionName);
        //Cookie::delete($this->_cookieName);
    }

    //all information about this user
    public function data(){
        return $this->_data;
    }

    //all information about this user
    public function getDB(){
        return $this->_db;
    }

    public function getTable(){
        return $this->_table;
    }

    //check if user already logged in
    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }

}
?>