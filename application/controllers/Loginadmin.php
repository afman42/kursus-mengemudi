<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginadmin extends CI_Controller {

	public function index()
	{   
		$this->load->view('login-admin/login');
	}

	public function login()
	{
		$this->load->model('M_admin');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
        $this->form_validation->set_message('trim','%s diisi tanpa jarak');
        $username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->M_admin->cek_login($where)->num_rows();
        $nampil = $this->M_admin->cek_login($where)->row();
        //var_dump($cek);
        $url_kembali = base_url('index.php/loginadmin');
        $url_login = base_url('index.php/admin');
        if($this->form_validation->run() == FALSE){
            $this->load->view('login-admin/login');
        }else {
            if($cek > 0){
                $_SESSION['username'] = $nampil->username;
                $_SESSION['id_admin'] = $nampil->id_admin;
                $_SESSION['status'] = TRUE;
                $_SESSION['nama'] = $nampil->nama;
                echo "<script>alert('Berhasil Login'); window.location='$url_login'</script>";
            }else{
                echo "<script>alert('Gagal Login'); window.location='$url_kembali'</script>";
            }                
        }
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('index.php/loginadmin'));
    }
}