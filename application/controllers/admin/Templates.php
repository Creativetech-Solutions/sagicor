<?php
/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/18/2016
 * Time: 7:08 PM
 */


class Templates extends Backend_Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['viewData'] = array(
            'page_title' => "Reports",
            'page_view' => "admin/pages/email_templates/index"
        );
        $this->load->view('admin/shared/master', $this->data);
    }
    public function listing(){
        $this->load->library('datatables');
        $table = "email_templates ET";
        $selectData = array('id as templateID, ET.*',false);
        $addColumn = array(
            'actionButtons' => array(
                '
                <span class="tbicon"> <a class="tooltip" href="'.base_url().'admin/templates/edit/$1" data-title="Edit"><i class="icon-pencil"></i></a> </span>
                ','templateID'
            )
        );
        $result = $this->Common_model->select_fields_joined_DT($selectData,$table,'','','','','',$addColumn);
        print $result;
    }

    public function edit($templateID){
        if(empty($templateID) || !is_numeric($templateID)){
            flash_msg('FAIL::'.$this->data['ErrorMsg']['InvalidURL']);
            redirect("admin/templates");
        }

        //get the template id details.
        $table = 'email_templates';
        $selectData = array('
            *
        ',false);
        $where = array(
            'id' => $templateID
        );

        $page_data['templateDetails'] = $this->Common_model->select_fields_where($table,$selectData,$where,TRUE);
        if(empty($selectData)){
            flash_msg("FAIL::".$this->data['ErrorMsg']['InvalidURL']);
            redirect('admin/templates');
        }

        $this->data['viewData'] = array(
            'page_data' => $page_data,
            'page_title' => "Reports",
            'page_view' => "admin/pages/email_templates/edit-template"
        );
        $this->load->view('admin/shared/master', $this->data);
    }
    public function update($templateID){
        if(empty($templateID) || !is_numeric($templateID)){
            msgError($this->data['ErrorMsg']['InvalidURL']);
            return null;
        }


        //get all the posted values
        $name = $this->input->post('name');
        $subject = $this->input->post('subject');
        $help = $this->input->post('help');
        $body = $this->input->post('body');
        $dosubmit = $this->input->post('dosubmit');
        $id = $this->input->post('id');
        $processEmailTemplate = $this->input->post('processEmailTemplate');

        //lets check if the required inputs are there.
        $validationErrors = false;
        if(empty($name)){
            msgError('Please Enter Template Title!');
        }
        if(empty($subject)){
            msgError('Please Enter Email Subject!');
        }
        if(empty($body)){
            msgError('Template Content is required!');
        }

        $updateData = array(
            'name' => sanitize($name),
            'subject' => sanitize($subject),
            'help' => $help,
            'body' => $body
        );

        $where = array(
            'id' => $id
        );

        $updateResult = $this->Common_model->update('email_templates',$where,$updateData);
        if($updateResult === true){
            msgOk('Record Successfully Updated');
        }elseif($updateResult['code'] === 0){
            msgAlert('Nothing to Update, Same Record Already Exist');
        }else{
            msgError($updateResult['message']);
        }
    }
}