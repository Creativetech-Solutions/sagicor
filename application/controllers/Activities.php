<?php

/**
 * Created by PhpStorm.
 * User: HI
 * Date: 5/11/2016
 * Time: 4:45 AM
 */
class Activities extends Frontend_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function activity_descriptions()
    {
        //Load the view
        $this->f_show('site/pages/activities/activity-descriptions');
    }

    public function activities(){

        $userID = $this->data['loggedinuser']->id;
        $selectData = array(
            '
            id AS RegID,
            reg_id AS RegNo,
            noguest AS Companion,
            choice1,
            choice2,
            choice3
            ',
            false
        );
        $where = array(
            'user_id' => $userID
        );
        $data['regDetails'] = $this->Common_model->select_fields_where('register',$selectData,$where,true);

        //Need to check if this winner has companion, if so then get all
        if(isset($data) && !empty($data['regDetails']) && $data['regDetails']->Companion === "Yes"){
            $selectData = array(
                '
                id AS RegID,
            reg_id AS RegNo,
            choice1,
            choice2,
            choice3
            ',
                false
            );
            $where = array(
                'guest_of' => $userID
            );
            $data['guestDetails'] = $this->Common_model->select_fields_where('register',$selectData,$where,true);
        }

/*        var_dump($data['regDetails']);
        echo $this->db->last_query();*/

        //Need to get register Information

        //Load the view
        $data['choices'] = $this->Common_model->select('activities');
        //$this->f_show('site/pages/activities/activities',$data);
        $this->f_show('site/pages/activities/activities2',NULL,NULL,'new');
    }
    public function update(){

        //Getting all the Posted Values.
        $id = $this->input->post('id');
        $g_id = $this->input->post('g_id');
        $choice1 = $this->input->post('choice1');
        $choice2 = $this->input->post('choice2');
        $choice3 = $this->input->post('choice3');
        $choice1_g = $this->input->post('choice1_g');
        $choice2_g = $this->input->post('choice2_g');
        $choice3_g = $this->input->post('choice3_g');


        //For Winner Section
        if(empty($id)){
            $this->session->set_flashdata('siteMsg','FAIL::No Registration Information Found against your User Profile');
            redirect(previousURL());
        }

        if(!is_numeric($id)){
            $this->session->set_flashdata('siteMsg','FAIL::'.$this->data['ErrorMsg']['Post']);
            redirect(previousURL());
        }

        $updateDataWinner = array(
            'choice1' => $choice1,
            'choice2' => $choice2,
            'choice3' => $choice3
        );
        $whereWinner = array(
            'id' => $id
        );

        $winnerUpdateResult = $this->Common_model->update('register',$whereWinner,$updateDataWinner);

        if(empty($g_id) && $winnerUpdateResult === true){
            $this->session->set_flashdata('siteMsg','OK::Activities Successfully Updated');
        }elseif(empty($g_id) && $winnerUpdateResult !== true){
            if($winnerUpdateResult['code'] === 0){
                $this->session->set_flashdata('siteMsg','FAIL::Winner Activities already Exist, Nothing to Update');
            }else{
                $this->session->set_flashdata('siteMsg','FAIL::Some DB Error Occurred, Please Contact System Administrator');
            }
        }

        //Need to Update Guest if any guest info found
        if(!empty($g_id) && is_numeric($g_id)){

            $updateDataGuest = array(
                'choice1' => $choice1_g,
                'choice2' => $choice2_g,
                'choice3' => $choice3_g
            );
            $whereGuest = array(
                'id' => $g_id
            );

            $guestResult = $this->Common_model->update('register',$whereGuest,$updateDataGuest);
            if($guestResult === true){
                $this->session->set_flashdata('siteMsg','OK::Activities Successfully Updated');
            }else{
                if($guestResult['code'] === 0){
                    $this->session->set_flashdata('siteMsg','FAIL::Guest Activities already Exist, Nothing to Update');
                }else{
                    $this->session->set_flashdata('siteMsg','FAIL::Some DB Error Occurred, Please Contact System Administrator');
                }
            }
        }
            redirect('Activities/activities');

    }
}