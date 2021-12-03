<?php

class Tool{

    function toKhNum($number) {
        $khNum = ['0'=>'០', '1'=>'១', '2'=>'២', '3'=>'៣', '4'=>'៤', '5'=>'៥', '6'=>'៦', '7'=>'៧', '8'=>'៨', '9'=>'៩'];
        $stringNum = strval($number);
        $khString = '';
        $chars = str_split($stringNum);
 
        foreach ($chars as $char ){
            $khString .= $khNum[$char];
        }
        
        return $khString;
    }

    function getKhDate($rawDate){
        $KhmerDays = ['ច័ន្ទ', 'អង្គារ', 'ពុធ', 'ព្រហស្បតិ៍', 'សុក្រ', 'សៅរ៍', 'អាទិត្យ'];
        $KhmerMonths = ['មករា', 'កុម្ភៈ', 'មិនា', 'មេសា', 'ឧសភា', 'មិថុនា', 'កក្កដា', 'សីហា', 'កញ្ញា', 'តុលា', 'វិច្ឆិកា', 'ធ្នូ'];
        
        $month = date('m', strtotime($rawDate));
        $day = date("N", strtotime((date('l',strtotime($rawDate)))));
        $daym = $this->toKhNum(date('d', strtotime($rawDate)));
        $year = $this->toKhNum(date('Y', strtotime($rawDate)));
    
        return ('ថ្ងៃ '.$KhmerDays[$day-1].' ទី '.$daym.' '.$KhmerMonths[$month-1].' '.$year);
    }

    function is_localhost() {	
		// set the array for testing the local environment
		$whitelist = array( '127.0.0.1', '::1' );
		
		// check if the server is in the array
		if ( in_array( $_SERVER['REMOTE_ADDR'], $whitelist ) ) {
			// this is a local environment
			return true;
		}
		
	}

    function rootPath(){
        $path = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
        $path .=$_SERVER["SERVER_NAME"]. dirname($_SERVER["PHP_SELF"]);        
        return $path;
    }

}