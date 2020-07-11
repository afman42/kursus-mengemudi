<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('M_admin');
		if($_SESSION['status'] != TRUE)
		{
			return redirect(base_url('index.php/loginadmin'));
		}
    }

	public function index()
	{   
        $data['judul'] = "KM | Admin";
		$this->load->view('template-admin/header',$data);
		$this->load->view('admin/index');
		$this->load->view('template-admin/footer');
    }
    
    public function data_kursus()
	{   
        $data['judul'] = "KM | Data Kursus";
		$this->load->view('template-admin/header',$data);
		$this->load->view('admin/data_kursus');
		$this->load->view('template-admin/footer');
	}

	public function data_member()
	{
		$data['judul'] = "KM | Data Member";
		$data['member'] = $this->M_admin->tampil_semua_member();
		$this->load->view('template-admin/header',$data);
		$this->load->view('admin/data_member',$data);
		$this->load->view('template-admin/footer');
	}
	
	public function data_paket()
	{
		$data['judul'] = "KM | Data Paket";
		$data['paket'] = $this->M_admin->tampil_semua_paket();
		$this->load->view('template-admin/header',$data);
		$this->load->view('admin/data_paket',$data);
		$this->load->view('template-admin/footer');
	}

	public function tambah_data_paket()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('pertemuan', 'Pertemuan', 'required');
		$this->form_validation->set_rules('biaya', 'Biaya', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
		if($this->form_validation->run() == FALSE){
		    $data['judul'] = "KM | Tambah Data Paket";
			$this->load->view('template-admin/header',$data);
			$this->load->view('admin/tambah_data_paket');
			$this->load->view('template-admin/footer');
		}else {
			$post = $this->input->post();
			$data = array(
                'nama' => $post['nama'],
                'pertemuan' => $post['pertemuan'],
                'biaya' => $post['biaya'],
                'keterangan' => $post['keterangan'],
			);
			$paket = $this->M_admin->tambah_paket($data);
			$url = site_url('admin/data_paket');
			if ($paket) {
				echo "<script>alert('Data Paket Berhasil Disimpan');location.href='".$url."'</script>";
			}else{
				echo "<script>alert('Data Paket Gagal Diubah');location.href='".$url."'</script>";
			}
		}
	}
	
	public function edit_data_paket($id=NULL)
	{
		if (!isset($id)) redirect('admin/data_paket');
        $data["paket"] = $this->M_admin->cek_data_paket($id)->row();
		if (!$data["paket"]){
			show_404();
		} 
		$this->update_data_paket($id);
	}

	protected function update_data_paket($id)
	{
		$post = $this->input->post();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('pertemuan', 'Pertemuan', 'required');
		$this->form_validation->set_rules('biaya', 'Biaya', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
        $data["paket"] = $this->M_admin->cek_data_paket($id)->row();
        if($this->form_validation->run() == FALSE){
			$data['judul'] = "KM | Ubah Data Paket";
			$this->load->view('template-admin/header',$data);
			$this->load->view('admin/edit_data_paket',$data);
			$this->load->view('template-admin/footer');
        }else {
			$data = array(
				'nama' => $post['nama'],
                'pertemuan' => $post['pertemuan'],
                'biaya' => $post['biaya'],
                'keterangan' => $post['keterangan'],
			);
			$paket = $this->M_admin->ubah_paket($id,$data);
			$url = site_url('admin/data_paket');
			if ($paket) {
				echo "<script>alert('Data Paket Berhasil Diubah');location.href='".$url."'</script>";
			}else{
				echo "<script>alert('Data Paket Gagal Diubah');location.href='".$url."'</script>";
			}
		}
	}

	public function hapus_data_paket($id=NULL)
	{
		if (!isset($id)) show_404();
        $this->M_admin->hapus_paket($id);
		echo "<script>alert('Data Paket Berhasil dihapus');location.href='".site_url('admin/data_paket')."'</script>";
	}

	public function data_mobil()
	{
		$data['judul'] = "KM | Data Mobil";
		$data['mobil'] = $this->M_admin->tampil_semua_mobil();
		$this->load->view('template-admin/header',$data);
		$this->load->view('admin/data_mobil',$data);
		$this->load->view('template-admin/footer');
	}

	public function tambah_data_mobil()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('transmisi', 'Transmisi', 'required');
		$this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
		if($this->form_validation->run() == FALSE){
		    $data['judul'] = "KM | Tambah Data Mobil";
			$this->load->view('template-admin/header',$data);
			$this->load->view('admin/tambah_data_mobil');
			$this->load->view('template-admin/footer');
		}else {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 1024;
				// $config['max_width'] = 1024;
				// $config['max_height'] = 768;

			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')){
				$upload_data = $this->upload->data();
				$featured_image = $upload_data['file_name'];
				$post = $this->input->post();
				$data = array(
					'transmisi'=> $post['transmisi'],
					'nama' => $post['nama'],
					'foto' => 'uploads/'.$featured_image
				);
				$mobil = $this->M_admin->tambah_mobil($data);
				$url = site_url('admin/data_mobil');
				if ($mobil) {
					echo "<script>alert('Data Mobil Berhasil Disimpan');location.href='".$url."'</script>";
				}else{
					echo "<script>alert('Data Mobil Gagal Diubah');location.href='".$url."'</script>";
				}
			}else{
				$error = array('error' => $this->upload->display_errors());
				$data['judul'] = "KM | Tambah Data Mobil";
				$this->load->view('template-admin/header',$data);
				$this->load->view('admin/tambah_data_mobil',$error);
				$this->load->view('template-admin/footer');
			}
		}
	}
	
	public function edit_data_mobil($id=NULL)
	{
		if (!isset($id)) redirect('admin/data_mobil');
        $data["mobil"] = $this->M_admin->cek_data_mobil($id)->row();
		if (!$data["mobil"]){
			show_404();
		} 
		$this->update_data_mobil($id);
	}

	protected function update_data_mobil($id)
	{
		$post = $this->input->post();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('transmisi', 'Transmisi', 'required');
		$this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
        $data["mobil"] = $this->M_admin->cek_data_mobil($id)->row();
        if($this->form_validation->run() == FALSE){
			$data['judul'] = "KM | Ubah Data Mobil";
			$this->load->view('template-admin/header',$data);
			$this->load->view('admin/edit_data_mobil',$data);
			$this->load->view('template-admin/footer');
        }else {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 1024;
				// $config['max_width'] = 1024;
				// $config['max_height'] = 768;

			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')){
				$upload_data = $this->upload->data();
				$featured_image = $upload_data['file_name'];
				$post = $this->input->post();
				$data = array(
					'transmisi'=> $post['transmisi'],
					'nama' => $post['nama'],
					'foto' => 'uploads/'.$featured_image
				);
				$mobil = $this->M_admin->ubah_mobil($id,$data);
				$url = site_url('admin/data_mobil');
				if ($mobil) {
					echo "<script>alert('Data Mobil Berhasil Disimpan');location.href='".$url."'</script>";
				}else{
					echo "<script>alert('Data Mobil Gagal Diubah');location.href='".$url."'</script>";
				}
			}else if (!$this->upload->do_upload('foto')){
				$post = $this->input->post();
				$data = array(
					'transmisi'=> $post['transmisi'],
					'nama' => $post['nama'],
				);
				$mobil = $this->M_admin->ubah_mobil($id,$data);
				$url = site_url('admin/data_mobil');
				if ($mobil) {
					echo "<script>alert('Data Mobil Berhasil Disimpan');location.href='".$url."'</script>";
				}else{
					echo "<script>alert('Data Mobil Gagal Diubah');location.href='".$url."'</script>";
				}
			}else{
				$error = array('error' => $this->upload->display_errors());
				$data['judul'] = "KM | Tambah Data Mobil";
				$this->load->view('template-admin/header',$data);
				$this->load->view('admin/tambah_data_mobil',$error);
				$this->load->view('template-admin/footer');
			}
		}
	}

	public function hapus_data_mobil($id=NULL)
	{
		if (!isset($id)) show_404();
		$data = $this->M_admin->cek_data_mobil($id)->row();
		unlink($data->foto);
        $this->M_admin->hapus_mobil($id);
		echo "<script>alert('Data Mobil Berhasil dihapus');location.href='".site_url('admin/data_mobil')."'</script>";
	}

	public function data_buku_tamu()
	{
		$data['judul'] = "KM | Data Buku Tamu";
		$data['buku'] = $this->M_admin->tampil_semua_buku_tamu();
		$this->load->view('template-admin/header',$data);
		$this->load->view('admin/data_buku_tamu',$data);
		$this->load->view('template-admin/footer');
	}

	public function hapus_data_buku_tamu($id=NULL)
	{
		if (!isset($id)) show_404();
        $this->M_admin->hapus_buku_tamu($id);
		echo "<script>alert('Data Buku Tamu Berhasil dihapus');location.href='".site_url('admin/data_buku_tamu')."'</script>";
	}

	public function data_instruktur()
	{
		$data['judul'] = "KM | Data Instruktur";
		$data['instruktur'] = $this->M_admin->tampil_semua_instruktur();
		$this->load->view('template-admin/header',$data);
		$this->load->view('admin/data_instruktur',$data);
		$this->load->view('template-admin/footer');
	}

	public function tambah_data_instruktur()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('pengalaman', 'Pengalaman', 'required');
		$this->form_validation->set_rules('rating', 'Rating', 'required');
		$this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
		if($this->form_validation->run() == FALSE){
		    $data['judul'] = "KM | Tambah Data Instruktur";
			$this->load->view('template-admin/header',$data);
			$this->load->view('admin/tambah_data_instruktur');
			$this->load->view('template-admin/footer');
		}else {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 1024;
				// $config['max_width'] = 1024;
				// $config['max_height'] = 768;

			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')){
				$upload_data = $this->upload->data();
				$featured_image = $upload_data['file_name'];
				$post = $this->input->post();
				$data = array(
					'nama'=> $post['nama'],
					'pengalaman' => $post['pengalaman'],
					'rating' => $post['rating'],
					'foto' => 'uploads/'.$featured_image
				);
				$mobil = $this->M_admin->tambah_instruktur($data);
				$url = site_url('admin/data_instruktur');
				if ($mobil) {
					echo "<script>alert('Data Instruktur Berhasil Disimpan');location.href='".$url."'</script>";
				}else{
					echo "<script>alert('Data Instruktur Gagal Diubah');location.href='".$url."'</script>";
				}
			}else{
				$error = array('error' => $this->upload->display_errors());
				$data['judul'] = "KM | Tambah Data Buku Tamu";
				$this->load->view('template-admin/header',$data);
				$this->load->view('admin/tambah_data_instruktur',$error);
				$this->load->view('template-admin/footer');
			}
		}
	}
	
	public function edit_data_instruktur($id=NULL)
	{
		if (!isset($id)) redirect('admin/data_instruktur');
        $data["instruktur"] = $this->M_admin->cek_data_instruktur($id)->row();
		if (!$data["instruktur"]){
			show_404();
		} 
		$this->update_data_instruktur($id);
	}

	protected function update_data_instruktur($id)
	{
		$post = $this->input->post();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('pengalaman', 'Pengalaman', 'required');
		$this->form_validation->set_rules('rating', 'Rating', 'required');
		$this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
        $data["instruktur"] = $this->M_admin->cek_data_instruktur($id)->row();
        if($this->form_validation->run() == FALSE){
			$data['judul'] = "KM | Ubah Data Instruktur";
			$this->load->view('template-admin/header',$data);
			$this->load->view('admin/edit_data_instruktur',$data);
			$this->load->view('template-admin/footer');
        }else {
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 1024;
				// $config['max_width'] = 1024;
				// $config['max_height'] = 768;

			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')){
				$upload_data = $this->upload->data();
				$featured_image = $upload_data['file_name'];
				$post = $this->input->post();
				$data = array(
					'nama'=> $post['nama'],
					'pengalaman' => $post['pengalaman'],
					'rating' => $post['rating'],
					'foto' => 'uploads/'.$featured_image
				);
				$mobil = $this->M_admin->ubah_instruktur($id,$data);
				$url = site_url('admin/data_instruktur');
				if ($mobil) {
					echo "<script>alert('Data Instruktur Berhasil Disimpan');location.href='".$url."'</script>";
				}else{
					echo "<script>alert('Data Instruktur Gagal Diubah');location.href='".$url."'</script>";
				}
			}else if (!$this->upload->do_upload('foto')){
				$post = $this->input->post();
				$data = array(
					'nama'=> $post['nama'],
					'pengalaman' => $post['pengalaman'],
					'rating' => $post['rating'],
				);
				$mobil = $this->M_admin->ubah_instruktur($id,$data);
				$url = site_url('admin/data_instruktur');
				if ($mobil) {
					echo "<script>alert('Data Instruktur Berhasil Disimpan');location.href='".$url."'</script>";
				}else{
					echo "<script>alert('Data Instruktur Gagal Diubah');location.href='".$url."'</script>";
				}
			}else{
				$error = array('error' => $this->upload->display_errors());
				$data['judul'] = "KM | Tambah Data Instruktur";
				$this->load->view('template-admin/header',$data);
				$this->load->view('admin/tambah_data_instruktur',$error);
				$this->load->view('template-admin/footer');
			}
		}
	}

	public function hapus_data_instruktur($id=NULL)
	{
		if (!isset($id)) show_404();
		$data = $this->M_admin->cek_data_instruktur($id)->row();
		unlink($data->foto);
        $this->M_admin->hapus_instruktur($id);
		echo "<script>alert('Data Instruktur Berhasil dihapus');location.href='".site_url('admin/data_instruktur')."'</script>";
	}

	public function ubah_data()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
		if($this->form_validation->run() == FALSE){
			$data['judul'] = "KM | Tambah Data Paket";
			$data['admin'] = $this->M_admin->cek_login(['id_admin' => $_SESSION['id_admin']])->row();
			$this->load->view('template-admin/header',$data);
			$this->load->view('admin/ubah_data_admin',$data);
			$this->load->view('template-admin/footer');
		}else {
			$post = $this->input->post();
			$data = array(
                'username' => $post['username'],
                'password' => $post['password'],
                'nama' => $post['nama'],
			);
			$paket = $this->M_admin->ubah_admin($_SESSION['id_admin'],$data);
			$url = site_url('admin/ubah_data');
			if ($paket) {
				echo "<script>alert('Data Admin Berhasil Disimpan');location.href='".$url."'</script>";
			}else{
				echo "<script>alert('Data Admin Gagal Diubah');location.href='".$url."'</script>";
			}
		}
	}
	// public function tambah_data_kursus()
	// {
	// 	$this->form_validation->set_rules('email', 'Email', 'required');
    //     $this->form_validation->set_rules('password', 'Password', 'required');
    //     $this->form_validation->set_message('required','%s masih kosong, silahkan diisi');
	// 	if($this->form_validation->run() == FALSE){
    //         $data['judul'] = "KM | Tambah Data Kursus";
	// 		$this->load->view('template-admin/header',$data);
	// 		$this->load->view('admin/data_kursus');
	// 		$this->load->view('template-admin/footer');
    //     }else {
	// 		$data['judul'] = "KM | Tambah Data Kursus";
	// 		$this->load->view('template-admin/header',$data);
	// 		$this->load->view('admin/data_kursus');
	// 		$this->load->view('template-admin/footer');
	// 	}	
	// }
}
