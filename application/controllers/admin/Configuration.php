<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends Backend_Controller
{


    function __construct()
    {

        parent::__construct();
    }


    public function system(){

        $table = "settings";
        $selectData = array('*',false);
        $site = $this->Common_model->select_fields($table,$selectData,true);

        $this->data['viewData'] = array(
            'page_title' => "Dashboard",
            'page_view' => "admin/pages/configuration/system"
        );

        //If there is any site data please post it too.
        if(isset($site) && !empty($site)){
            $this->data['viewData']['page_data'] = $site;
        }
        $this->load->view('admin/shared/master', $this->data);
    }

    public function update_sys(){

        //Lets get all the required inputs
        $site_name = $this->input->post('site_name');
        $site_url = $this->input->post('site_url');
        $site_email = $this->input->post('site_email');
        $user_perpage = $this->input->post('user_perpage');
        $thumb_w = $this->input->post('thumb_w');
        $thumb_h = $this->input->post('thumb_h');
        $reg_verify = $this->input->post('reg_verify');
        $auto_verify = $this->input->post('auto_verify');
        $reg_allowed = $this->input->post('reg_allowed');
        $notify_admin = $this->input->post('notify_admin');
        $user_limit = $this->input->post('user_limit');
        $logo = $this->input->post('logo');
        $mailer = $this->input->post('mailer');
        $smtp_host = $this->input->post('smtp_host');
        $smtp_user = $this->input->post('smtp_user');
        $smtp_pass = $this->input->post('smtp_pass');
        $smtp_port = $this->input->post('smtp_port');

        //Lets do some validations before we continue updating the table.
        $return = false;
        if(empty($site_name)){
            msgError('Please enter Website Name!');
            $return = true;
        }

        if(empty($site_url)){
            msgError('Please enter Website Url!');
            $return = true;
        }

        if(empty($site_email)){
            msgError('Please enter valid Website Email address!');
            $return = true;
        }

        if(empty($thumb_w)){
            msgError('Please enter Thumbnail Width!');
            $return = true;
        }

        if(empty($thumb_h)){
            msgError('Please enter Thumbnail Height!');
            $return = true;
        }

        if($return === true){
            return null;
        }


        //If SMTP selected from dropdown then need more checks.
        if ($mailer == "SMTP") {
            if(!isset($smtp_host) || empty($smtp_host)){
                msgError('Please enter Valid SMTP Host!');
                $return = true;
            }
            if(!isset($smtp_user) || empty($smtp_user)){
                msgError('Please enter Valid SMTP Username!');
                $return = true;
            }
            if(!isset($smtp_pass) || empty($smtp_pass)){
                msgError('Please enter Valid SMTP Password');
                $return = true;
            }
            if(!isset($smtp_port) || empty($smtp_port)){
                msgError('Please enter Valid SMTP Porty!');
                $return = true;
            }

            //if anything is missing in SMTP and if selected SMTP then also return the method.
            if($return === true){
                return null;
            }
        }

        $insertUpdateData = array(
            'site_name' => $site_name,
            'site_url' => $site_url,
            'site_email' => $site_email,
            'user_perpage' => $user_perpage,
            'thumb_w' => $thumb_w,
            'thumb_h' => $thumb_h,
            'reg_verify' => $reg_verify,
            'auto_verify' => $auto_verify,
            'reg_allowed' => $reg_allowed,
            'notify_admin' => $notify_admin,
            'user_limit' => $user_limit,
            'mailer' => $mailer,
            'smtp_host' => $smtp_host,
            'smtp_user' => $smtp_user,
            'smtp_pass' => $smtp_pass,
            'smtp_port' => $smtp_port
        );


        //Need to start work for file if posted
        if(isset($_FILES['logo']['name']) && $_FILES['logo']['name']!= '')
        {
            $errors = '';
            $uploadDirectory = 'uploads/site_files/';

            if(!is_dir($uploadDirectory)){
                mkdir($uploadDirectory,0777,true);
            }

            $config['upload_path'] = $uploadDirectory;
            $config['overwrite'] = TRUE;
            $config["allowed_types"] = 'jpg|jpeg|png|gif';
            $config["max_size"] = 1024;
            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('logo')) {
                $error = $this->upload->display_errors();
                $msg = "<br /> Logo Image Could Not Be Uploaded".$error;
                msgError($msg);

            } else {
                //success
                $upload_data = $this->upload->data();
                $insertUpdateData['logo'] = $upload_data['file_name'];
            }
        }


        //Need to know if there is any data in table.
        //and if there is no data then we can insert data for first time.

        $settingsTable = 'settings';
        $selectData = array(
            '*',
            false
        );
        $siteConfigurations = $this->Common_model->select_fields($settingsTable,$selectData,true);


        if(!empty($siteConfigurations)){
            //Means records already exist in table we only need to run update query.
            $whereUpdate = array(
                'id' => $siteConfigurations->id
            );
            $updateResult = $this->Common_model->update($settingsTable,$whereUpdate,$insertUpdateData);
            if($updateResult === true){
                msgOk('Site Configurations Successfully Updated');
            }else{
                if($updateResult['code'] === 0){
                    msgAlert('Alert! Nothing to process.');
                }else{
                    msgError('Could Not Update Site Configurations');
                }
            }
        }else{
            //Means there is no record in that table only need to run insert query.
            $insertResult = $this->Common_model->insert_record($settingsTable,$insertUpdateData);
            if($insertResult > 0){
                msgOk('New System Configurations successfully added.');
            }else{
                msgError('Could not add new configurations to system');
            }

        }

    }

    public function backup(){



        $this->data['viewData'] = array(
            'page_title' => "Database Maintenance",
            'page_view' => "admin/pages/configuration/backup"
        );


        //Need TO list the backups in the directories if any
        $directory = $this->data['backupDirectory'];
        if(is_dir($directory)){

            $getDir = dir($directory);
            $filesData = array();
            while (false !== ($file = $getDir->read())):

                if ($file != "." && $file != ".." && $file != "index.php" && $file != 'restore'):

                    $latest =  ($file == $this->data['siteSettings']->backup) ? " db-latest" : "";
                    $fileData = '';
                    $fileData.= '<div class="db-backup' . $latest . '" id="item_' . $file . '"><i class="icon-hdd pull-left icon-4x icon-white"></i>';

                    $fileData.= '<span>' . getSize(filesize(FCPATH . $this->data['backupDirectory'] . $file)) . '</span>';



                    $fileData.= '<a class="delete">

                  <small class="sdelet tooltip" data-title="Delete: '. $file . '"><i class="icon-trash icon-white"></i></small></a>';



                    $fileData.= '<a href="' . base_url() . "uploads/db_backups/" . $file . '">

                  <small class="sdown tooltip" data-title="Download"><i class="icon-download-alt icon-white"></i></small></a>';



                    $fileData.= '<a class="restore">

				  <small class="srestore tooltip" data-title="Restore: '. $file . '"><i class="icon-refresh icon-white"></i></small></a>';

                    $fileData.= '<p>' . str_replace(".sql", "", $file) . '</p>';

                    $fileData.= '</div>';
                    array_push($filesData,$fileData);
                endif;
            endwhile;

            $this->data['viewData']['page_data'] = array(
                'backups' => $filesData
            );
        }


        $this->load->view('admin/shared/master', $this->data);
    }

    public function do_backup(){
        // Load the DB utility class
        $this->load->dbutil();

        //Setting Up Backup Preferences
        $preferences = array(
            'format'        => 'zip',                       // gzip, zip, txt
            'filename'      => 'dbBackup-'.date('d-M-Y-H-i-s').'.sql',              // File name - NEEDED ONLY WITH ZIP FILES
            'newline'       => "\n"                         // Newline character used in backup file
        );

        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup($preferences);

        $filename = 'dbBackup-'.date('d-M-Y-H-i-s').'.zip';

        //save the backup to backups directory
        $directoryPath = $this->data['backupDirectory'];
        $savePath = $directoryPath.$filename;

        if(!is_dir($directoryPath)){
            mkdir($directoryPath,0777,true);
        }

        $this->load->helper('file');
        write_file($savePath, $backup);
        if(!file_exists($savePath)){
            $alertMsg = "FAIL::Could not create Backup";
            $this->session->set_flashdata('alertMsg',$alertMsg);
            redirect(previousURL());
        }

        //Also need to save the file name to settings table.
        $settingsTable = "settings";
        $where = array('id' => 1);
        $updateData['backup'] = $filename;
        $updateResult = $this->Common_model->update($settingsTable,$where,$updateData);

        if($updateResult === true){
            $alertMsg = "'OK::Success! Backup created successfully!'";
            $this->session->set_flashdata('alertMsg',$alertMsg);
        }

        //redirect to backups page if success
        redirect('admin/configuration/backup','refresh');
/*        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download('dbBackup-'.date('d-M-Y').'.zip', $backup);*/
    }

    public function backups($file){
        var_dump($file);
    }

    public function restore_backup(){
        if(!isset($this->data['siteSettings']) || empty($this->data['siteSettings'])){
            msgError("FAIL::'Error!  While Restoring Database");
            return;
        }

        $backupFile = $this->input->post('restoreBackup');

        if(!isset($backupFile) || empty($backupFile)){
            msgError("FAIL::".$this->data['ErrorMsg']['Post']);
            return;
        }

        //Settings up some paths first.
        $backupsDirectory = 'uploads/db_backups/';
        $restoreDirectory = 'uploads/db_backups/restore/';
        $filePath = $backupsDirectory.$backupFile;

        // Function to restore from a file
        $f = fopen($restoreDirectory.'temp.sql' , 'w+');
        if(!$f) {
            msgError("FAIL::Error While Restoring Database");
            return;
        }



        $zip = new ZipArchive();
        if ($zip->open($filePath) === TRUE) {

            //extract file from zip
            $zip->extractTo($restoreDirectory);
            $zip->close();

            //Get SQL fileName
            $fileName = explode('.',$backupFile);

            $sqlFileName = $fileName[0].'.sql';
            $sqlFilePath = $restoreDirectory.$sqlFileName;


            $this->load->database();
            $username = $this->db->username;
            $password = $this->db->password;
            $database = $this->db->database;
            $hostname = $this->db->hostname;

            #Now restore from the .sql file
/*            $command = "mysql --user={$this->db->username} --password={$this->db->password} --database={$this->db->database} < restore/temp.sql";
            exec($command);*/

            // Connect to MySQL server
            $con = mysqli_connect($hostname, $username, $password) or die('Error connecting to MySQL server: ' . mysqli_connect_error());
            // Select database
            mysqli_select_db($con,$database) or die('Error selecting MySQL database: ' . mysqli_error($con));

            // Temporary variable, used to store current query
            $templine = '';
            // Read in entire file
            $lines = file($sqlFilePath);
            // Loop through each line
            foreach ($lines as $line)
            {
                // Skip it if it's a comment
                if (substr($line, 0, 2) == '--' || $line == '')
                    continue;

                // Add this line to the current segment
                $templine .= $line;

                // If it has a semicolon at the end, it's the end of the query
                if (substr(trim($line), -1, 1) == ';')
                {
                    // Perform the query
                    mysqli_query($con,$templine) or msgError('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error($con) . '<br /><br />');
                    // Reset temp variable to empty
                    $templine = '';
                }
            }


           //run query to update db.

            
            $this->load->model("admin/Configuration_model");
            $affectedRows = $this->Configuration_model->update_backup($backupFile);

            if($affectedRows > 0){
               echo "OK::";
               msgOk('Database Successfully Imported');
            }

            #Delete temporary files without any warning
            @unlink($sqlFilePath);
        }
        else {
            msgError('Failed :'.$filePath);
        }

    }

    public function trash_backup(){
        $postedFileName = $this->input->post('deleteBackup');
        $backupsDirectory = 'uploads/db_backups/';
        //first check if file exist in directory of backups.
        $filePath = $backupsDirectory.$postedFileName;
        if(file_exists($filePath)){
            try {
                unlink($filePath);
                msgOk('Success! Backup Successfully Deleted.');
            } catch (Exception $ex) {
                msgError($ex);
            }
        }

        //We also need to check if this is the current backup file and has its name stored in DB, then delete the name of it.
        $table = "settings";
        $selectData = array(
            'id as ID, COUNT(1) as TotalFound',false
        );
        $where = array(
            'backup' => $postedFileName
        );
        $countResult = $this->Common_model->select_fields_where($table,$selectData,$where,true);

        if(isset($countResult) && $countResult->TotalFound > 0){
            //means it is the current record, then we also need to update the settings table.
            $updateData = array(
                'backup' => ''
            );
            $whereUpdate = array(
                'backup' => $postedFileName,
                'id' => $countResult->ID
            );

            $this->Common_model->update($table,$whereUpdate,$updateData);

        }

    }
}