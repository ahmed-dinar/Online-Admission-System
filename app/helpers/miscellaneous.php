<?php

class miscellaneous{

	public static function getYearList($count=3){
          $currentYear = date('Y');
          $earliest_year = $currentYear - $count;
          $ret = array();
          foreach (range(date('Y'), $earliest_year) as $x) {
              $ret[] = $x;
          }
          return $ret;
	}


	public static function errorPopup($message="",$bg="",$foreground="#fff"){

        $ret = '<div class="col-md-6 col-md-offset-3">';
        $ret .= '<div class="alert alert-danger alert-dismissible" role="alert">';
        $ret .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        $ret .= $message . '</div></div>';

		return $ret;
	}

	public static function Error(){
		Session::flush('sure',Messages::_404());
		require_once SITE_PATH.'/app/controllers/error_controller.php';
        $control = new error();
        $control->index();
        return FALSE;
	}


	public static function deleteApplySeesion(){
		Session::delete('admission.unit');   
        Session::delete('ssc.roll');
        Session::delete('ssc.session');
        Session::delete('ssc.res');
        Session::delete('ssc.py');
        Session::delete('ssc.board');
        Session::delete('ssc.group');
        Session::delete('ssc.gpa');
        Session::delete('hsc.roll');         
        Session::delete('hsc.session');  
        Session::delete('hsc.res');  
        Session::delete('hsc.py');  
        Session::delete('hsc.board');  
        Session::delete('hsc.group');  
        Session::delete('hsc.gpa');  
        Session::delete('admission.name');   
        Session::delete('admission.father.name');
        Session::delete('admission.mother.name'); 
        Session::delete('admission.gender');  
        Session::delete('admission.nat');
        Session::delete('admission.preadress');
        Session::delete('admission.peradress'); 
        Session::delete('admission.contact');
        Session::delete('admission.dob'); 
        Session::delete('admission.photo'); 
	}

    public static function applyForm(){
        $array = array(
            'semester',
            'program',
            'name',
            'father',
            'mother',
            'gender',
            'dob',
            'mobile',
            'email',
            'nationality',
            'present',
            'permanent',
            'ssc_school',
            'ssc_roll',
            'ssc_year',
            'ssc_group',
            'ssc_gpa',
            'hsc_school',
            'hsc_roll',
            'hsc_year',
            'hsc_group',
            'hsc_gpa'
        );
        return $array;
    }


}
?>