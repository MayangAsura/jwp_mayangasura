<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Auth_model extends CI_Model
{
    public $table = 'users';
    
    public function get_login($email, $password){

        $user = $this->db->get_where($this->table, ['email' => $email, 'password' => $password])
                ->row_array();

        if($user){
            return $user;
        }else{
            return false;
        }
        
    }

    public function get_information_access($id){

        $user = $this->db->get_where($this->table, ['id' => $id])
                ->row_array();

        return $user ;
    }

    public function save($data){

        $data['password'] = md5($data['password']);

        $this->db->insert($this->table, $data);

        $data['id'] = $this->db->insert_id();

        return ['title' => 'SUCCESS', 'message' => $data];
        
    }

    public function reset_password($data){

        $user = $this->db->get_where($this->table, ['email' => $data['email']])->row_array();
  
        if(!$user) {

            $content    = 'Failed!<br>User not found';
            $style      = 'danger';

            $_SESSION['message'] = ['content' => $content, 'style' => $style];
            return null;
    
        }
        $new_password = $this->get_random_string(6);

        $this->db->update($this->table, ['password' => md5($new_password), 'updated_on' => date('Y-m-d H:i:s')], ['id' => $user['id']]);

        $user['password'] = $new_password;

        $content    = '<b>Success!</b> A new password has been sent to your email address ' .$user['email'];
        $style      = 'success';

        $_SESSION['message'] = ['content' => $content, 'style' => $style];

        return $user;
        
    }

    public function email_axist($email){
        
        return $this->db->get_where($this->table, ['email' => $email])->row_array();
    }

    public function get_random_string($length){
        
        $alphabet = "ABCDEFGHJKLMNPQRSTUWXYZ123456789";
    
        $pass = [];

        $panjangAlpha = strlen($alphabet);
    
        for ($i = 0; $i < $length; $i++) {
    
          $n = rand(0, $panjangAlpha);
    
          $pass[] = $alphabet[$n];
    
        }
    
        return implode($pass);
    }
}
