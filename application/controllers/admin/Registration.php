<?php
/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/20/2016
 * Time: 1:02 PM
 */
class Registration extends Backend_Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function reg_list(){
        $this->data['viewData'] = array(
            'page_title' => "Registration Manager",
            'page_view' => "admin/pages/registration/list"
        );
        $this->load->view('admin/shared/master', $this->data);
    }
    public function listing(){
        $this->load->library('datatables');
        $table = "register";
        $selectData = array(
            'id AS ID,
            reg_id AS RegID,
            title AS Title,
            first_name AS FirstName,
            last_name AS LastName,
            CASE club WHEN 1 THEN "Presidents Club" ELSE "Pacesetters" END as Club,
            CASE user_id WHEN 0 THEN "Companion" ELSE "Winner" END as Status,
            ref_no_sys AS sysRefNo
            ',false
        );
        $where = array(
            'reg_id !=' => ''
        );
        $addColumn = array(
            'actionButtons' => array(
                '<span class="tbicon"> <a class="tooltip" href="'.base_url().'admin/Registration/reg_edit/$1" data-title="View Flights &amp; Accommodation"><i class="icon-pencil"></i></a> </span>',
                'ID'
            )
        );
        $result = $this->Common_model->select_fields_joined_DT($selectData,$table,'',$where,'','','',$addColumn);
        print $result;
    }

    public function reg_edit($regID){
        $table = 'register';
        $selectData = array('*',false);
        $where = array(
            'id' => $regID
        );
        $data['regInfo']    = $this->Common_model->select_fields_where($table,$selectData,$where,true);
        $data['countries']  = $this->Common_model->select_fields('countries', '*', FALSE, '', 'name'); // countries
        $data['activities'] = $this->Common_model->select('activities'); // activities
        
        $this->load->view("admin/pages/registration/reg-edit",$data);
    }
    public function update($regID){
        $postedValues = $this->input->post();
        if(!empty($postedValues) && is_array($postedValues)){
            $updateData = array();

            $checkboxes = ['diabetic', 'hypertension', 'vegetarian', 'fish', 'chicken'];
            $fieldsToBeEncrypt = ['card_number','exp_date','cvv'];
            foreach($checkboxes as $box){ // check if not set then set their value to zero
                if(!isset($postedValues[$box])) 
                    $postedValues[$box] = 0;
            }
            foreach ($postedValues as $key=>$value){
                // encrypt fields
                if(in_array($key, $fieldsToBeEncrypt)){
                    $value = encryption($value);
                }

                $updateData[$key] = $value;
            }
            $where = array(
                'id' => $regID
            );
            $updateResult = $this->Common_model->update('register',$where,$updateData);
            if($updateResult === true){
                flash_msg("OK::Record Successfully Updated");
            }else{
                if($updateResult['code'] === 0){
                    flash_msg("FAIL::Nothing to Update");
                }else{
                    flash_msg($updateResult['message']);
                }
            }

            redirect('admin/Registration/reg_list');
        }else{
            redirect(previousURL());
        }
    }
}