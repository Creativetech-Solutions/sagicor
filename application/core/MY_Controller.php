<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Kill3rCoder-Lapi
 * Date: 3/17/13
 * Time: 12:17 PM
 * To change this template use File | Settings | File Templates.
 */
/**
 * @property Common_model $Common_model It resides all the methods which can be used in most of the controllers.
 * @property datatables $datatables It resides all the methods which can be used in most of the controllers.
 * @property CI_Email $email It resides all the methods which can be used in most of the controllers.
 * @property CI_Session session It resides all the methods which can be used in most of the controllers.
 * @property CI_Input input It resides all the methods which can be used in most of the controllers.
 * @property CI_DB_driver db It resides all the methods which can be used in most of the controllers.
 */
class MY_Controller extends CI_Controller{

    public $data = array();

    function __construct() {
    parent::__construct();
        /*$this->data['errors']=array();
        $this->data['site_name']=array();
        $this->data['errorPage_401'] = 'errorPages/error_401';
        $this->data['errorPage_403'] = 'errorPages/error_403';
        $this->data['errorPage_404'] = 'errorPages/error_404';
        $this->data['errorPage_500'] = 'errorPages/error_500';*/

        //loading model
        $this->load->model('Common_model');

        //loading helpers
        $this->load->helper('user_helper');
		$this->load->helper('site_helper');
        $this->load->library('encryption');
        //Defaults
        //t = pending
        //y = registered
        //n = inactive
        //b = banned
        $this->data['newUserRegisterRequestStatus'] = "t";

        //Date and DateFormats
        $this->data['MySQLDateTimeFormat'] = "Y-m-d H:i:s";
        $this->data['MySQLDateFormat'] = "Y-m-d";
        $this->data['dbCurrentDateTime'] = date($this->data['MySQLDateTimeFormat']);
        $this->data['dbCurrentDate'] = date($this->data['MySQLDateFormat']);

        //Site Mail Configuration, that we would need in entire site.
        $this->data['mailConfiguration'] = array(
            'protocol' => 'sendmail',
            'mailpath' => '/usr/sbin/sendmail',
            'wordwrap' => 'TRUE',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );

        //site Configurations
        $this->data['siteSettings'] = get_siteConfiguration();
        if(!empty($this->data['siteSettings'])){
            if($this->data['siteSettings']->mailer === "SMTP"){
                $this->data['mailConfiguration'] = array(
                    'protocol' => 'smtp',
                    'smtp_host' => $this->data['siteSettings']->smtp_host,
                    'smtp_port' => intval($this->data['siteSettings']->smtp_port),
                    'smtp_user' => $this->data['siteSettings']->smtp_user,
                    'smtp_pass' => $this->data['siteSettings']->smtp_pass,
                    'wordwrap' => 'TRUE',
                    'mailtype'  => 'html',
                    'charset'   => 'iso-8859-1'
                );
            }else{
                $this->data['mailConfiguration'] = array(
                    'protocol' => 'sendmail',
                    'mailpath' => '/usr/sbin/sendmail',
                    'wordwrap' => 'TRUE',
                    'mailtype'  => 'html',
                    'charset'   => 'iso-8859-1'
                );
            }

            //Company Details
            $this->data['Company'] = $this->data['siteSettings']->site_name;
            $this->data['noReply'] = $this->data['siteSettings']->site_email;
        }else{
            //Company Details
            $this->data['Company'] = "My Company";
            $this->data['noReply'] = "haideritx@gmail.com";
        }

        $this->data['backupDirectory'] = 'uploads/db_backups/';



        //Error Msgs
        $this->data['ErrorMsg'] = array(
            'Post' => 'Something went wrong with the post, Please contact System Administrator',
            'InvalidURL' => 'Invalid URL, If you think its system error, please contact system administrator'
        );

        if(loginCheckBool() === TRUE){
            $this->data['loggedinuser'] = $this->session->userdata('loggedinuser');
        }
				
}
    function hashPassword($password) {
        return md5($password);
    }
    //when using output from database, using this function will automatically display special characters as it is on page.
    function htmlEnc($string){
        return htmlspecialchars($string, ENT_QUOTES, 'utf-8');
    }

    public function f_show($contentView,$data=NULL, $guest=NULL, $mainLayout=NULL){
        if($guest == NULL && !LoggedIn())
            redirect('/login');
        //If No View File has been provided, return them false
        if(empty($contentView)){
            return false;
        }
        //if view file is provided, check if any data is provided with the view file.
        if(empty($data)){
            $viewData = array(
                'view' => $contentView,
                'data' => $this->data
            );
        }else{
            $viewData = array(
                'view' => $contentView,
                'data' => $data,
            );
        }
        if($mainLayout == NULL)
            $this->load->view('site/layouts/main',$viewData);
        else // new theme
            $this->load->view('site/layouts/main_new', $viewData);
    }


    public function logout(){
        if(isset($this->data['loggedinuser'])){
            $user = $this->data['loggedinuser'];
            if(intval($user->userlevel) === 9){
                $loginPage = base_url().'admin/login';
            }else{
                $loginPage = base_url().'login';
            }
        } else $loginPage = base_url().'login';
        $this->session->unset_userdata('loggedinuser');
        redirect($loginPage, 'refresh');
    }

    public function captcha(){
        header("Content-type: image/png");

        define("_VALID_PHP", true);



        if (strlen(session_id()) < 1)

            session_start();



        $text = rand(10000,99999);

        $_SESSION['captchacode'] = $text;
        $_POST['captchacode'] = $text;

        $height = 25;

        $width = 60;

        $font_size = 14;



        $im = imagecreatetruecolor($width, $height);

        $textcolor = imagecolorallocate($im, 150, 150, 150);

        $bg = imagecolorallocate( $im, 0, 0, 0 );

        imagestring($im, $font_size, 5, 5,  $text, $textcolor);

        imagecolortransparent( $im, $bg );

        imagefill( $im, 0, 0, $bg );



        imagepng($im,NULL,9);

        imagedestroy($im);
    }
}