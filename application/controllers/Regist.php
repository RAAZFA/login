<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Regist extends CI_Controller
{
      public function index()
      {
            $this->load->view('regist');
      }
      public function simpan()
      {
            $this->db->from('user')->where('username', $this->input->post('username'));
            $cek = $this->db->get()->row();
            if ($cek == null) {
                  $data = array(
                        'username' => $this->input->post('username'),
                        'password' => md5($this->input->post('password'))
                  );
                  $this->db->insert('user', $data);
                  redirect('auth');
            } else {
                  redirect('regist');
            }
      }
}