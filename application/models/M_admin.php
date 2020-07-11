<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function tampil_semua_kursus()
    {
        return $this->db->get('kursus')->result();
    }

    public function tampil_semua_member()
    {
        return $this->db->get('member')->result();
    }

    public function tampil_semua_paket()
    {
        return $this->db->get('paket')->result();
    }

    public function tambah_paket($data)
    {
        return $this->db->insert('paket',$data);
    }

    public function cek_data_paket($id)
    {
        return $this->db->get_where('paket',['id_paket' => $id]);
    }

    public function ubah_paket($id,$data)
    {
        $this->db->where('id_paket',$id);
        return $this->db->update('paket',$data);
    }

    public function hapus_paket($id)
    {
        $this->db->where('id_paket',$id);
        return $this->db->delete('paket');
    }
    
    //Mobil
    public function tampil_semua_mobil()
    {
        return $this->db->get('mobil')->result();
    }

    public function tambah_mobil($data)
    {
        return $this->db->insert('mobil',$data);
    }

    public function cek_data_mobil($id)
    {
        return $this->db->get_where('mobil',['id_mobil' => $id]);
    }

    public function ubah_mobil($id,$data)
    {
        $this->db->where('id_mobil',$id);
        return $this->db->update('mobil',$data);
    }

    public function hapus_mobil($id)
    {
        $this->db->where('id_mobil',$id);
        return $this->db->delete('mobil');
    }

    //Buku Tamu
    public function tampil_semua_buku_tamu()
    {
        return $this->db->get('buku_tamu')->result();
    }

    public function hapus_buku_tamu($id)
    {
        $this->db->where('id_buku_tamu',$id);
        return $this->db->delete('buku_tamu');
    }

    //Instruktur
    public function tampil_semua_instruktur()
    {
        return $this->db->get('instruktur')->result();
    }

    public function tambah_instruktur($data)
    {
        return $this->db->insert('instruktur',$data);
    }

    public function cek_data_instruktur($id)
    {
        return $this->db->get_where('instruktur',['id_instruktur' => $id]);
    }

    public function ubah_instruktur($id,$data)
    {
        $this->db->where('id_instruktur',$id);
        return $this->db->update('instruktur',$data);
    }

    public function hapus_instruktur($id)
    {
        $this->db->where('id_instruktur',$id);
        return $this->db->delete('instruktur');
    }

    //login
    public function cek_login($id)
    {
        return $this->db->get_where('admin',$id);
    }

    public function ubah_admin($id,$data)
    {
        $this->db->where('id_admin',$id);
        return $this->db->update('admin',$data);
    }
}