<?php

class apply_model extends Model{

    function __construct() {
        parent::__construct();
    }

    public function process( $form = array() ){

        $application = new Applications();

        try{

            $result = $application->create($form);
            if( $result->error() ){
                return false;
            }

            $id = $result->getPDO()->lastInsertId();
            $secret = $this->getSecret(10 - strlen($id)).$id;
            $application->getDB()->update($application->getTable(),$id,array('secret' => $secret));

            return $secret;
        }
        catch(Exception $e){
            echo $e;
            return false;
        }

    }


    private function getSecret($length){
        $result = '';
        for($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9);
        }
        return $result;
    }

}

?>