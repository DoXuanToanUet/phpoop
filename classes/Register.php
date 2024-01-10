<?php 
include_once "lib/Database.php";
class Register{

    public $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addRegister($data, $file){
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $address = $data['address'];
        
        $permited = ['jpg', 'jpeg', 'png', 'gif'];
        $file_name = $file['photo']['name'];
        $file_size = $file['photo']['size'];
        $file_temp = $file['photo']['tmp_name'];
        
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image = 'upload/'.$unique_image;
        $alert =[];
        $alert['class'] = 'warning';
        if(empty($name) || empty($email) || empty($phone) || empty($address) || empty($file_name)){
             $alert['msg'] = 'Field must not be empty';
            return $alert;
        }elseif ($file_size>1048567){
             $alert['msg']= 'File size must be less than 1 MB';
            return $alert;
        }elseif ( in_array($file_ext,$permited) == false ){
             $alert['msg']= 'You can upload only '.implode(' , ',$permited);
            return $alert;
        }else{
            move_uploaded_file($file_temp,$upload_image);

            $query  = "INSERT INTO `student`(`name`,`email`,`phone`,`photo`,`address`) VALUES ('$name', '$email', ' $phone', '$upload_image', '$address') ";

            $reuslt = $this->db->insert($query);
           
            if ($reuslt){
                $alert['class'] = 'success';
                $alert['msg']=  'Registration Successfull';
                return $alert;
            }else{
                $alert['class'] = 'danger';
                $alert['msg']= 'Registration Fail';
                return $alert;
            }
        }


    }

    public function allStudent(){
        $query  = "SELECT * FROM `student` ORDER BY id ";
        $result = $this->db->show($query);
        return $result;
    }

    public function getStdById($id){
        $query  = "SELECT * FROM `student` WHERE id='$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function delStudent($id){
        $query  = "DELETE FROM `student` WHERE id='$id' ";
        $result = $this->db->del($query);
        return $result;
    }

    public function updateStudent($data,$file,$id){
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $address = $data['address'];
        var_dump($name);
        $permited = ['jpg', 'jpeg', 'png', 'gif'];
        $file_name = $file['photo']['name'];
        $file_size = $file['photo']['size'];
        $file_temp = $file['photo']['tmp_name'];
        
        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image = 'upload/'.$unique_image;
        $alert =[];
        $alert['class'] = 'warning';
        if(empty($name) || empty($email) || empty($phone) || empty($address) || empty($file_name)){
             $alert['msg'] = 'Field must not be empty';
            return $alert;
        }elseif ($file_size>1048567){
             $alert['msg']= 'File size must be less than 1 MB';
            return $alert;
        }elseif ( in_array($file_ext,$permited) == false ){
             $alert['msg']= 'You can upload only '.implode(' , ',$permited);
            return $alert;
        }else{
            move_uploaded_file($file_temp,$upload_image);

            $query  = "UPDATE `student` SET name='$name', email='$email', phone='$phone', photo='$upload_image', address='$address' WHERE id=$id ";

            $result = $this->db->update($query);
            if ($result){
                $alert['class'] = 'success';
                $alert['msg']=  'Update Successfull';
                return $alert;
            }else{
                $alert['class'] = 'danger';
                $alert['msg']= 'Update Fail';
                return $alert;
            }
        }
        
      
    }
}