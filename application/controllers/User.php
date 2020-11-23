<?php

class User extends CI_Controller {

public function __construct(){

        parent::__construct();
  			$this->load->helper('url');
  	 		$this->load->model('user_model');
        $this->load->library('session');

}

public function index()
{
  $this->load->view("register.php");
}

public function register_user(){

      $user=array(
      'user_name'=>$this->input->post('name'),
      'user_email'=>$this->input->post('email_address'),
      'user_password'=>md5($this->input->post('password')));
      print_r($user);

        $email_check=$this->user_model->email_check($user['user_email']);

        if($email_check){
          $this->user_model->register_user($user);

          $to_email = $user['user_email'];
          //Load email library
          $this->load->library('email');

          $this->email->from('nthabiseng.mantjiu@gmail.com', 'Identification');
          $this->email->to($to_email);
          $this->email->subject('Profile Registration');

          $this->email->message('Your profile has been created succeessfully');
          //Send mail
          $this->email->send();
          
          $this->session->set_flashdata('success_msg', 'Registered successfully.You can login to your account.');
        }
        else{
          $this->session->set_flashdata('error_msg', 'There is already a profile with the email address that you entered.');
        }
}


public function login_view(){

  $this->load->view("login.php");

}

function login_user(){

  $user_login = array(
      'user_email'=>trim($this->input->post('user_email')),
      'user_password'=>md5($this->input->post('user_password')));

    $data = $this->user_model->login_user($user_login['user_email'],$user_login['user_password']);

    if($data)
    {
      $this->session->set_userdata('user_id',$data['user_id']);
      $this->session->set_userdata('user_email',$data['user_email']);
      $this->session->set_userdata('user_name',$data['user_name']);
      $this->session->set_userdata('type',$data['type']);

      $this->load->view('user_profile.php');
    }
    else{
      $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
      $this->load->view("login.php");

    }
    
}

function user_profile(){

  $this->load->view('user_profile.php');

}

public function user_list(){

    $this->load->library('session');
    $logged_user_type = $this->session->userdata('type');
    $data = $this->user_model->users();
    $this->load->view('users.php',array(
      'users' => $data,
      'type' => $logged_user_type
		));

}

public function user_logout(){

  $this->session->sess_destroy();
  redirect('user/login_view', 'refresh');
}


}

?>
