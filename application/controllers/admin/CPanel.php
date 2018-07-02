<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CPanel extends Backend_Controller
{
    function __construct()
    {

        parent::__construct();
        //$this->load->model('Common_model');
        // Your own constructor code
    }


    public function index()
    {

        //Need some data for the dashboard

        //Need Counts. so let run 4 queries for now.
        $usersTable = 'users';
        $countDataRegistered = array('COUNT(1) TotalFound',false);

        //Registered Users
        $registeredUsers = $this->Common_model->select_fields($usersTable,$countDataRegistered,TRUE);

        //Active Users
        $whereActive = array(
            'active' => 'y'
        );
        $activeUsers = $this->Common_model->select_fields_where($usersTable,$countDataRegistered,$whereActive,TRUE);

        //Pending Users
        $wherePending = array(
            'active' => 't'
        );
        $pendingUsers = $this->Common_model->select_fields_where($usersTable,$countDataRegistered,$wherePending,TRUE);

        //Banned Users
        $whereBanned = array(
            'active' => 'b'
        );
        $bannedUsers = $this->Common_model->select_fields_where($usersTable,$countDataRegistered,$whereBanned,TRUE);


        //Get Yearly Stats
        $yearlyStatsSelectData = array('YEAR(created) as year, MONTH(created) as month, COUNT(id) as total',false);
        $whereYearlyStats = array(
            'YEAR(created)' => date("Y")
        );
        $groupByYearlyStats = 'year, month';
        $orderByYearlyStats = array('created','DESC');

        $stats = $this->Common_model->select_fields_where($usersTable, $yearlyStatsSelectData,$whereYearlyStats, FALSE,'','','',$groupByYearlyStats,$orderByYearlyStats);
        $page_data = array(
            'registeredUsers' => $registeredUsers->TotalFound,
            'activeUsers' => $activeUsers->TotalFound,
            'pendingUsers' => $pendingUsers->TotalFound,
            'bannedUsers' => $bannedUsers->TotalFound,
        );
        if(!empty($stats)){
            $page_data['yearlyStats'] = $stats;
        }
        //Count the Active Users
        $this->data['viewData'] = array(
            'page_data' => $page_data,
            'page_title' => "Dashboard",
            'page_view' => "admin/pages/cpanel"
        );
        $this->load->view('admin/shared/master', $this->data);
    }

    //Get Sale Stats
    public function get_saleStats(){
        if (isset($_GET['getSaleStats'])):
            if (intval($_GET['getSaleStats']) == 0 || empty($_GET['getSaleStats'])):
                die();
            endif;
            $range = (isset($_GET['timerange'])) ? sanitize($_GET['timerange']) : 'month';
            $data = array();
            $usersTable = 'users';
            $data['order'] = array();
            $data['xaxis'] = array();
            $data['order']['label'] = '&nbsp;&nbsp;User Statistics';
            switch ($range) {
                case 'day':
                    $date = date('Y-m-d');
                    for ($i = 0; $i < 24; $i++) {
                        $selectDayData = array('COUNT(*) AS total',false);
                        $whereDay = array(
                            'DATE(created)' => $date,
                            'HOUR(created)' => (int)$i
                        );
                        $groupBy = 'HOUR(created)';
                        $orderBy = array(
                            'created','ASC'
                        );
                        $query = $this->Common_model->select_fields_where($usersTable,$selectDayData,$whereDay,true,'','','',$groupBy,$orderBy);
                        ($query) ? $data['order']['data'][] = array($i, (int)$query->total) : $data['order']['data'][] = array($i, 0);
                        $data['xaxis'][] = array($i, date('H', mktime($i, 0, 0, date('n'), date('j'), date('Y'))));
                    }
                    break;
                case 'week':
                    $date_start = strtotime('-' . date('w') . ' days');
                    for ($i = 0; $i < 7; $i++) {
                        $date = date('Y-m-d', $date_start + ($i * 86400));

                        $selectDayData = array('COUNT(*) AS total',false);
                        $whereDay = array(
                            'DATE(created)' => $date
                        );
                        $groupBy = 'DATE(created)';

                        $query = $this->Common_model->select_fields_where($usersTable,$selectDayData,$whereDay,true,'','','',$groupBy);
                        ($query) ? $data['order']['data'][] = array($i, (int)$query->total) : $data['order']['data'][] = array($i, 0);
                        $data['xaxis'][] = array($i, date('D', strtotime($date)));
                    }
                    break;
                default:
                case 'month':
                    for ($i = 1; $i <= date('t'); $i++) {
                        $date = date('Y') . '-' . date('m') . '-' . $i;

                        $selectDayData = array('COUNT(*) AS total',false);
                        $whereDay = array(
                            'DATE(created)' => $date
                        );
                        $groupBy = 'DAY(created)';

                        $query = $this->Common_model->select_fields_where($usersTable,$selectDayData,$whereDay,true,'','','',$groupBy);

                        ($query) ? $data['order']['data'][] = array($i, (int)$query->total) : $data['order']['data'][] = array($i, 0);
                        $data['xaxis'][] = array($i, date('j', strtotime($date)));
                    }
                    break;
                case 'year':
                    for ($i = 1; $i <= 12; $i++) {
                        $selectDayData = array('COUNT(*) AS total',false);
                        $whereDay = array(
                            'YEAR(created)' => date('Y'),
                            'MONTH(created)' =>  $i
                        );
                        $groupBy = 'MONTH(created)';
                        $query = $this->Common_model->select_fields_where($usersTable,$selectDayData,$whereDay,true,'','','',$groupBy);

                        ($query) ? $data['order']['data'][] = array($i, (int)$query->total) : $data['order']['data'][] = array($i, 0);
                        $data['xaxis'][] = array($i, date('M', mktime(0, 0, 0, $i, 1, date('Y'))));
                    }
                    break;
            }
            print json_encode($data);
        endif;
    }


}
