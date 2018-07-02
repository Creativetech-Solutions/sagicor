<?php
/**
 * Created by PhpStorm.
 * User: HaiderHassan
 * Date: 12/31/13
 * Time: 8:11 AM
 */

function LoggedIn(){ ;
    $ci =& get_instance();
    if($ci->session->userdata('loggedinuser')){ //LoggedIn
        return TRUE;
    }
    else{
        return FALSE;
    }
}

if (!function_exists('CheckUserRole')) {
    function CheckUserRole($UserID)
    {
        if ($UserID > 0) {
            $ci =& get_instance();
            $ci->load->model('Common_Model');
            $where = array(
                'UserID' => $UserID
            );
            $UserGroupID = $ci->Common_Model->get_by('GroupID', 'users_users', $where, TRUE);
            $where = array(
                'GroupID' => $UserGroupID['GroupID']
            );
            $userRoles = $ci->Common_Model->get_by('RoleID', 'users_groups_roles', $where, False);
            return $userRoles;
        }
    }
}

if (!function_exists('CheckUserGroup')) {
    function CheckUserGroup($UserID)
    {
        if ($UserID > 0) {
            $ci =& get_instance();
            $ci->load->model('Common_Model');
            $where = array(
                'UserID' => $UserID
            );
            $UserGroupID = $ci->Common_Model->get_by('GroupID', 'users_users', $where, TRUE);
            return $UserGroupID['GroupID'];
        }
    }
}
//This Function should Be Responsible to check if user Group is allowed to load the specific Controller or Not.
if (!function_exists('is_allowed')) {
    function is_allowed($userID){
        $ci =& get_instance();
        $ci->load->model('Common_Model');
        $class = $ci->router->class;
        $method =  $ci->router->method;
        $partialURI = $class."/".$method;
        //We need to get the GroupID for the Current logged in User
        $table = 'users_users';
        $data=('GroupID');
        $where = array(
            'UserID' => $userID
        );
        $result = $ci->Common_Model->select_fields_where($table,$data,$where,TRUE);
        $groupID=$result->GroupID; //it will be the Group ID for the Current LoggedIn User.

        //Now in order to check if this Group has Proper Authority for the Form, We first need to grap all the forms it has access to.
        //All the variables will be overwritten.
        $PTable = 'sys_forms_in_groups';
        $data=('FormCIPath');
        $joins=array(
            array(
             'table' => 'sys_forms',
                'condition' => 'sys_forms.FormID = sys_forms_in_groups.FormID',
                'jointype' => 'INNER'
            )
        );
        $where = array(
            'GroupID' => $groupID
        );
        $result = $ci->Common_Model->select_fields_joined($data, $PTable, $joins,$where);

        foreach($result as $r) {
            if(strpos($r->FormCIPath, "$partialURI")) {
                return TRUE;
            }
        }
        return FALSE;
    }
}

if (!function_exists('is_admin')){
    function is_admin($userID){
        $ci =& get_instance();
        $ci->load->model('Common_Model');
        $table = 'users_users';
        $data=('GroupID');
        $where = array(
          'UserID' => $userID
        );
        $result = $ci->Common_Model->select_fields_where($table,$data,$where,TRUE);
        $groupID=$result->GroupID;
        if($groupID==1){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
}

if (!function_exists('userLoggedInRedirectPath')){
    function userLoggedInRedirectPath($UserGroupID){
        $ci =& get_instance();
        $groupID = $ci->ci->db->escape($UserGroupID);
        $PTable = 'sys_tabs';
        $joins = array(
            array(
                'table' => 'sys_menus',
                'condition' => 'sys_menus.TabID = sys_tabs.TabID',
                'jointype' => 'INNER'
            ),
            array(
                'table' => 'sys_forms',
                'condition' => 'sys_forms.MenuID = sys_menus.MenuID',
                'jointype' => 'INNER'
            ),
            array(
                'table' => 'sys_forms_in_groups',
                'condition' => 'sys_forms_in_groups.FormID = sys_forms.FormID',
                'jointype' => 'INNER'
            ),
            array(
                'table' => 'users_groups',
                'condition' => 'users_groups.GroupID = sys_forms_in_groups.GroupID',
                'jointype' => 'INNER'
            )
        );
        $data=('sys_tabs.TabName');
        $where = array(
            'users_groups.GroupID' => $groupID
        );
        $groupBy = 'sys_tabs.TabID';
        $result = $ci->Common_Model->select_fields_joined($data, $PTable, $joins,$where,$groupBy);
        $TabName = $result[0]->TabName;
        return 'admin/dashboard/'.$TabName;
    }
}

if (!function_exists('GetUserProfileImage')){
    function GetUserProfileImage($UserID){
        $ci =& get_instance();
        $CurrentUserID = $ci->ci->db->escape($UserID);
        $table = 'users_users';
        $data=('Avatar');
        $where = array(
            'UserID' => $CurrentUserID
        );

        $result = $ci->Common_Model->select_fields_where($table, $data,$where,TRUE);

        $userAvatar = $result->Avatar;
        //return $userAvatar;
        if($userAvatar!=='defaultAvatar.jpg'){
            $fileRelativePath = 'uploads/users/'.$CurrentUserID.'/'.$userAvatar;
            if(file_exists($fileRelativePath)){
                return base_url().'uploads/users/'.$CurrentUserID.'/'.$userAvatar;
            }else{
                return base_url().'uploads/users/d/defaultAvatar.jpg';
            }
        }
        elseif($userAvatar === 'defaultAvatar.jpg'){
            return base_url().'uploads/users/d/defaultAvatar.jpg';
        }
    }
}
if (!function_exists('CheckUserGroupName')){
    function CheckUserGroupName($GroupID){
        $ci =& get_instance();
        $GroupID = $ci->ci->db->escape($GroupID);
        $table = 'users_groups';
        $data=('GroupName');
        $where = array(
            'GroupID' => $GroupID
        );

        $result = $ci->Common_Model->select_fields_where($table, $data,$where,TRUE);

        $GroupName = $result->GroupName;
        return $GroupName;
    }
}
if (!function_exists('loginCheckBool')){
    function loginCheckBool(){ 
        $ci =& get_instance();
				$loggedinuser = $ci->session->userdata('loggedinuser'); 
        //echo "<pre> ci->session "; print_r( $ci->session ); echo "</pre>";   exit; 
				//$user_id = $loggedinuser->id;
				//echo "<br /> user_id = ".$user_id;
				if(!isset($loggedinuser)){
						 return FALSE;
				}else{
						$user_id = $loggedinuser->id;	
						if(strlen($user_id) <= 0) { 
							return FALSE;
						}else{ 
							return TRUE;
						}
						
				}
        
				
				 
				
        
    }

/*if(!function_exists('getChecked')){
	function getChecked($val,$match){
			
			
	}	
}*/

if(!function_exists('getUserLevels')){
    function getUserLevels($level = false)
	  {
		  $arr = array(
				 9 => 'Super Admin',
				 1 => 'Registered User',
				 2 => 'Unassigned',
				 3 => 'Unassigned',
				 4 => 'Unassigned',
				 5 => 'Unassigned',
				 6 => 'Unassigned',
				 7 => 'Unassigned'
		  );
		  
		  $list = '';
		  foreach ($arr as $key => $val) {
				  if ($key == $level) {
					  $list .= "<option selected=\"selected\" value=\"$key\">$val</option>\n";
				  } else
					  $list .= "<option value=\"$key\">$val</option>\n";
		  }
		  unset($val);
		  return $list;
	  }
}

if(!function_exists('userStatus')){
 function userStatus($status, $id)
  {
	  switch ($status) {
		  case "y":
			  $display = '<i class="icon-ok-sign text-green"></i> Active';
			  break;
		  case "n":
			  $display = '<a class="activate" id="act_' . $id . '"><i class="icon-adjust text-orange"></i> Inactive</a>';
			  break;
		  case "t":
			  $display = '<i class="icon-time text-blue"></i> Pending';
			  break;
		  case "b":
			  $display = '<i class="icon-ban-circle text-red"></i> Banned';
			  break;
	  }
      return $display;;
  }
}



if(!function_exists('isAdmin')){
function isAdmin($userlevel)
  {
	  switch ($userlevel) {
		  case 9:
			 $display = '<i class="icon-user tooltip text-red" data-title="Super Admin"></i>';
			 break;
		  case 7:
		     $display = '<i class="icon-user tooltip text-green" data-title="Administrator"></i>';
			 break;
		  case 6:
		     $display = '<i class="icon-user tooltip text-orange" data-title="Manager"></i>';
			 break;
		  case 5:
		     $display = '<i class="icon-user tooltip text-blue" data-title="Supervisor"></i>';
			 break;
		  case 4:
		     $display = '<i class="icon-user tooltip text-green" data-title="Accounts"></i>';
			 break;		  
		  case 3:
		     $display = '<i class="icon-user tooltip text-orange" data-title="Fast Track"></i>';
			 break;
		  case 2:
		     $display = '<i class="icon-user tooltip text-blue" data-title="Reservations"></i>';
			 break;
		  case 1:
		     $display = '<i class="icon-user tooltip text-green" data-title="Reserved"></i>';
			 break;			  
	  }
		 return $display;;
  }
}


}


if(!function_exists('checkIsAdmin')){
function checkIsAdmin()
  {
    $ci =& get_instance();
    $loggedinuser = $ci->session->userdata('loggedinuser'); 
    if(!isset($loggedinuser)){
        return FALSE;
    }
    else{
        $userlevel = $loggedinuser->userlevel;   
        if($userlevel == 9) { 
            return TRUE;
        }else{ 
            return FALSE;
        }
    }
        
  }
}

if(!function_exists('getEmailById')){
    function getEmailById($id){
        $ci =& get_instance();
        $ci->load->model('Common_Model');
        $response = $ci->Common_Model->select_fields_where('users','email',['id'=>$id],true);
        return $response->email;
    }
}
?>