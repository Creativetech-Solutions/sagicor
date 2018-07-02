<?php
/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/10/2016
 * Time: 11:31 PM
 */

/**

 *

 * @param mixed $msg

 * @param bool $fader

 * @param bool $altholder

 * @return

 */

function msgOk($msg, $fader = false, $altholder = false)

{

    $showMsg = "<div class=\"bggreen\"><p><span class=\"icon-ok-sign\"></span><i class=\"close icon-remove-circle\"></i>" . $msg . "</p></div>";

    if ($fader == true)

        $showMsg .= "<script type=\"text/javascript\"> 

		  // <![CDATA[

			setTimeout(function() {       

			  $(\".msgOk\").fadeOut(\"slow\",    

			  function() {       

				$(\".msgOk\").remove();  

			  });

			},

			4000);

		  // ]]>

		  </script>";



    print ($altholder) ? '<div id="alt-msgholder">'.$showMsg.'</div>' : $showMsg;

}

/**

 *

 * @param mixed $msg

 * @param bool $fader

 * @param bool $altholder

 * @return

 */

function msgError($msg, $fader = false, $altholder = false)

{

    $showMsg = "<div class=\"bgred\"><p><span class=\"icon-minus-sign\"></span><i class=\"close icon-remove-circle\"></i>" . $msg . "</p></div>";

    if ($fader == true)

        $showMsg .= "<script type=\"text/javascript\"> 

		  // <![CDATA[

			setTimeout(function() {       

			  $(\".msgError\").fadeOut(\"slow\",    

			  function() {       

				$(\".msgError\").remove();  

			  });

			},

			4000);

		  // ]]>

		  </script>";



    print ($altholder) ? '<div id="alt-msgholder">'.$showMsg.'</div>' : $showMsg;

}

/**

 * msgInfo()

 *

 * @param mixed $msg

 * @param bool $fader

 * @param bool $altholder

 * @return

 */

function msgInfo($msg, $fader = false, $altholder = false)

{

    $showMsg = "<div class=\"bgblue\"><p><span class=\"icon-info-sign\"></span><i class=\"close icon-remove-circle\"></i>" . $msg . "</p></div>";

    if ($fader == true)

        $showMsg .= "<script type=\"text/javascript\"> 

		  // <![CDATA[

			setTimeout(function() {       

			  $(\".msgInfo\").fadeOut(\"slow\",    

			  function() {       

				$(\".msgInfo\").remove();  

			  });

			},

			4000);

		  // ]]>

		  </script>";



    print ($altholder) ? '<div id="alt-msgholder">'.$showMsg.'</div>' : $showMsg;

}


function msgAlert($msg, $fader = false, $altholder = false)

{

    $showMsg = "<div class=\"bgorange\"><p><span class=\"icon-exclamation-sign\"></span><i class=\"close icon-remove-circle\"></i>" . $msg . "</p></div>";

    if ($fader == true)

        $showMsg .= "<script type=\"text/javascript\"> 

		  // <![CDATA[

			setTimeout(function() {       

			  $(\".msgAlert\").fadeOut(\"slow\",    

			  function() {       

				$(\".msgAlert\").remove();  

			  });

			},

			4000);

		  // ]]>

		  </script>";



    print ($altholder) ? '<div id="alt-msgholder">'.$showMsg.'</div>' : $showMsg;

}


function msgStatus($msgs)

{

    $showMsg = "<div class=\"bgred\"><p><span class=\"icon-minus-sign\"></span><i class=\"close icon-remove-circle\"></i><span>Error!</span>An error occurred while processing request<ul class=\"error\">";

    foreach ($msgs as $msg) {

        $showMsg .= "<li><i class=\"icon-double-angle-right\"></i> " . $msg . "</li>\n";

    }

    $showMsg .= "</ul></p></div>";



    return $showMsg;

}

function get_siteConfiguration(){
    $ci =& get_instance();
    $ci->load->model("Common_model");

    $settingsTable = "settings";
    $selectData = "*";
    $siteSettings = $ci->Common_model->select_fields($settingsTable,$selectData,true);
    return $siteSettings;
}

/**
 * @function previousURL return URL
 */
if(!function_exists('previousURL')){
    function previousURL(){
        if (isset($_SERVER['HTTP_REFERER']))
        {
            return $_SERVER['HTTP_REFERER'];
        }
        else
        {
            return base_url();
        }
    }
}

if(!function_exists('sanitize')){
    function sanitize($string, $trim = false, $int = false, $str = false)

    {

        $string = filter_var($string, FILTER_SANITIZE_STRING);

        $string = trim($string);

        $string = stripslashes($string);

        $string = strip_tags($string);

        $string = str_replace(array('‘', '’', '“', '”'), array("'", "'", '"', '"'), $string);



        if ($trim)

            $string = substr($string, 0, $trim);

        if ($int)

            $string = preg_replace("/[^0-9\s]/", "", $string);

        if ($str)

            $string = preg_replace("/[^a-zA-Z\s]/", "", $string);



        return $string;

    }
}




/**

 * _getSizePrefix()

 *

 * @param mixed $pos

 * @return

 */

function _getSizePrefix($pos)

{

    switch ($pos) {

        case 00:

            return "";

        case 01:

            return "kilo";



        case 02:

            return "mega";

        case 03:

            return "giga";

        default:

            return "?-";

    }

}

if(!function_exists('getSize')){

    /**

     * getSize()

     *

     * @param mixed $size

     * @param integer $precision

     * @param bool $long_name

     * @param bool $real_size

     * @return

     */

    function getSize($size, $precision = 2, $long_name = false, $real_size = true)

    {

        if ($size == 0) {

            return '-/-';

        } else {

            $base = $real_size ? 1024 : 1000;

            $pos = 0;

            while ($size > $base) {

                $size /= $base;

                $pos++;

            }

            $prefix = _getSizePrefix($pos);

            $size_name = $long_name ? $prefix . "bytes" : $prefix[0] . 'B';

            return round($size, $precision) . ' ' . ucfirst($size_name);
        }

    }
}

if(!function_exists('flash_msg')){
    function flash_msg($msg){
        $ci =& get_instance();
        $ci->session->set_flashdata('alertMsg',$msg);
    }
}

if(!function_exists('get_email_templates')){
    function get_email_templates($templateID = NULL){
        $ci =& get_instance();
        $ci->load->model('Common_model');
        $table='email_templates';

        $selectEmailData = '
            id, name, subject, body
        ';
        if(isset($templateID) && !empty($templateID) && is_numeric($templateID)){
            $where = array(
                'id' => $templateID
            );
            return $ci->Common_model->select_fields_where($table,$selectEmailData,$where,true);
        }else{
            return $ci->Common_model->select_fields($table,$selectEmailData,true);
        }
    }
}

if(!function_exists('makePassword')){
    function makePassword($length=''){
      $code = md5(uniqid(rand(), true));
      if ($length != "") {
          return substr($code, 0, $length);
      } else
          return $code;
    }
}

if(!function_exists('isValidPassportDate')){
    // check passport date 
    function isValidPassportDate($expDate){
        $expDate = strtotime($expDate);
        $endDate = strtotime("2018-12-15");
        if($expDate < $endDate) return false;
        else return true;
    }
}

if(!function_exists('contentPlaceHolder')){
    // check passport date 
    function contentPlaceHolders($cont, $method){
        $method = strtolower($method);
        $cont = strtolower($cont);
       $pathsArray = [
            'home/index' => 'site/ui_components/placeholders/index',
            'registration' => 'site/ui_components/placeholders/registration',
            'home/club_rules' => 'site/ui_components/placeholders/club_rules',
            'home/qualifiers' => 'site/ui_components/placeholders/qualifier',
            'itinerary/pacesetter_club' => 'site/ui_components/placeholders/pacesetter-s-club',
            'itinerary/president_club' => 'site/ui_components/placeholders/president-s-club',
            'activities/activities' => 'site/ui_components/placeholders/activities',    
            'travel/index'=>'site/ui_components/placeholders/travel',
            'hotel/index'=>'site/ui_components/placeholders/hotel',
            'contact/index'=>'site/ui_components/placeholders/contact-us',
            'destination/montreal'=>'site/ui_components/placeholders/montreal'
       ];
       if(isset($pathsArray[$cont])) 
            return $pathsArray[$cont];
       else if(isset($pathsArray[$cont."/".$method])) 
            return $pathsArray[$cont."/".$method];
    }
}

if(!function_exists('encryption')){
    function encryption($value){
        $ci = get_instance();
        if(!$value || $value == "") 
            return "";
        return $ci->encryption->encrypt($value);
    }
}

if(!function_exists('decryption')){
    function decryption($value){
        $ci = get_instance();
        if(!$value || $value == "") 
            return "";
        return $ci->encryption->decrypt($value);
    }
}

        /*
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $key = "sagicorkey012489";
        $encryptVal = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $value, MCRYPT_MODE_ECB, $iv);
        return trim(base64_encode($encryptVal));*/
        /*$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $key = "sagicorkey012489";
        $decryptVal = base64_decode($value);
        $decryptVal = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $decryptVal, MCRYPT_MODE_ECB, $iv);
        return trim($decryptVal);*/