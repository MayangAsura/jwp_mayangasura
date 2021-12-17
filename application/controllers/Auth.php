<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model', 'm_auth');
    }

    public function index()
    {
        if ($this->session->userdata('id'))
            redirect('home');

        $data = [
            'user'    => null,  
            'js'      => 'auth',  
            'title'   => 'Authorization',
            'content' => 'pages/auth',
        ];
        
        $this->load->view('index', $data);
        
    }

    public function registration(){
        
        if ($this->session->userdata('id')) {
            redirect($_SERVER['HTTP_REFERER']);
        } else {

            $session = isset($_SESSION['registration']) ? $_SESSION['registration'] : [];

            unset($_SESSION['registration']);

            $data = [
                'user'    => null,  
                'session' => $session,
                'js'      => 'register',  
                'title'   => 'Registration',
                'content' => 'pages/regist',
            ];
            
            $this->load->view('index', $data);
        }
    }

    public function login(){

        if ($this->session->userdata('id'))
            redirect($_SERVER['HTTP_REFERER']);
        

        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $res = [
                'code'    => 0,
                'message' => validation_errors(),
                'type'    => 'error',
                'data'    => null,
            ];
        } else {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

            $getLogin = $this->m_auth->get_login($email, $password);

            if (!$getLogin) {
                $res = [
                    'code'    => 0,
                    'message' => 'Username atau Password yang Anda Masukan Salah',
                    'type'    => 'error',
                    'data'    => null,
                ];
            } else {
                $res = [
                    'code'    => 1,
                    'message' => 'Success. Redirecting...',
                    'type'    => 'success',
                    'data'    => $getLogin,
                ];

                $sess = [
                    'id'        => $getLogin['id'],
                    'name'      => $getLogin['name'],
                    'email'     => $getLogin['email'],
                    
                ];
                
                $this->session->set_userdata($sess);
            }
        }

        echo json_encode($res);
    }

    public function regist_user(){
    

            $data = $this->input->post();
            $data['profile'] = $_FILES['profile']['name'];

            $result = [];
            $validate = $this->validate_user($data);

            if(!$validate){

                $config['upload_path'] = './assets/uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);
    
                if($this->upload->do_upload('profile')){
                    $profile = $this->upload->data();
                    $data['profile'] = $profile['file_name'];
                }
                $result = $this->m_auth->save($data);

                if($result['title'] == 'SUCCESS'){

                    $user = $this->m_auth->get_information_access($result['message']['id']);
    
                    $sess = [
                        'id'        => $user['id'],
                        'name'      => $user['name'],
                        'email'     => $user['email'],
                    ];
                    
                    $this->session->set_userdata($sess);

                    
                    redirect('home');
                }

            }else{

                $result = ['title' => 'FAILED', 'message' => $validate];

                $_SESSION['registration'] = ['data' => $data, 'result' => $result];

                redirect('register');

            }

    }

    function validate_user($data){

        $error = [];
    
        if($data['name']==""){
            $error[] = ['field' => 'name', 'message' => 'Nama tidak boleh kosong'];  
        }
        if($data['email']==""){
            $error[] = ['field' => 'email', 'message' => 'Email tidak boleh kosong'];  
        }
        if($data['password']==""){
            $error[] = ['field' => 'password', 'message' => 'Password tidak boleh kosong'];  
        }
        if($data['profile']==""){
            $error[] = ['field' => 'profile', 'message' => 'Profile tidak boleh kosong'];  
        }

        $cek_email = $this->m_auth->email_axist($data['email']);

        if($cek_email) {
            $error[] = ['field' => 'email', 'message' => 'Email telah digunakan'];
        }
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $error[] = ['field' => 'email', 'message' => 'Email tidak valid'];
        }

        return $error;
    
    }

    public function forgot_password(){
        
        if ($this->session->userdata('id')) {
            redirect();
        } else {

            if($this->input->post()){

                $data = $this->input->post();
                $result  = $this->m_auth->reset_password($data);

                if($result){
                    $to         = $result['email'];
                    $subject    = "New Password";  
                    $message    = $this->load->view('mail/forgot_password', ['data' => $result], true);
                    $from       = "notifikasi.mayang@gmail.com";
            
                    $this->send_mail_smtp($from,$to, $subject, $message);

                    redirect($_SERVER['HTTP_REFFERER']);
                }

            }
            $data = [
                'user'    => null,  
                'js'      => 'forgot_password',  
                'title'   => 'Forgot Password',
                'content' => 'pages/forgot_password',
            ];
            
            $this->load->view('index', $data);

        }
    }


    public function logout(){
        
        $this->session->sess_destroy();
        redirect($_SERVER['HTTP_REFERER']);
    }


    function testemail(){
        $to = "mayangasura217@gmail.com";
        $subject = "Email checkingg";
        $message = "HELLOOO";
        $from = "notifikasi.mayang@gmail.com";
        $this->send_mail_smtp($from, $to, $subject, $message);
      }


    public function send_mail_smtp($from , $to , $subject, $body){
        
        require_once(APPPATH . "third_party/PHPMailer/src/PHPMailer.php");

        require_once(APPPATH . "third_party/PHPMailer/src/Exception.php");

        require_once(APPPATH . "third_party/PHPMailer/src/SMTP.php");

        require_once(APPPATH . "third_party/PHPMailer/src/OAuth.php");

        require_once(APPPATH . "third_party/PHPMailer/src/POP3.php");

        

        $mail = new PHPMailer();

        $mail->setFrom($from);

        $mail->addAddress($to);

        $mail->Subject = $subject;

        $mail->Body = $body;

        $mail->IsHTML(true);

        $mail->SMTPSecure = 'tls';

        // /* SMTP parameters. */

        $mail->SMTPDebug = 0;

        /* Tells PHPMailer to use SMTP. */

        $mail->isSMTP();

        /* SMTP server address. */

        $mail->Host = 'smtp.gmail.com';

        /* Use SMTP authentication. */

        $mail->SMTPAuth = TRUE;

        /* SMTP authentication username. */

        $mail->Username = 'notifikasi.mayang@gmail.com';

        /* SMTP authentication password. */

        $mail->Password = 'n0t1f1k4s1@';

        /* Set the SMTP port. */

        $mail->Port = 587;

        // $mail->send();

            
        if (!$mail->send()) {
            echo "Email Error: " . $mail->ErrorInfo;
        } else {
            // echo "Pesan Terkirim!";
        }
    }

    
    

}