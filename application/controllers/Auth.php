<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
      public function index()
      {
            $this->load->view('login');
      }
      public function login()
      {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $this->db->from('user');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $cek = $this->db->get()->row();
            if ($cek == null) {
                  redirect('auth');
            } else {
                  $data = array(
                        'username' => $cek->username
                  );
                  $this->session->set_userdata($data);
                  redirect('home');
            }
      }           
      
      public function logout()
      {
            $this->session->sess_destroy();
            redirect('auth');
      }
}
