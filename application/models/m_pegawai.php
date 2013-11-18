<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	Class m_pegawai extends CI_Model
{
	
	public function simpan($data)
	{
			
		$masukan = array(
					"nip" => $data['nip'],
					"nama_lengkap" => $data['nama_lengkap'],
					"jenis_kelamin" => $data['jenis_kelamin'],
					"tempat_lahir" => $data['tempat_lahir'],
					"tanggal_lahir" => $data['tanggal_lahir'],
					"no_telp" => $data['no_telp'],
					"alamat_lengkap" => $data['alamat_lengkap'],
					"id_jabatan" => $data['id_jabatan'],
					"alamat_pekerjaan" => $data['alamat_pekerjaan']);
					
		$this->db->insert("master_pegawai", $masukan);			
			
	}
	public function hapus($id)
	{
		$this->db->where("nip",$id);
		$this->db->delete("master_pegawai");
	}

	public function get_anggota($id)
	{
		$data = array();
		$this->db->select('*');
		$this->db->from('master_anggota');
		$this->db->where('no_ba',$id);		
		$Q = $this->db->get();
		if( $Q->num_rows() > 0)
		{
			$data = $Q->row_array();
		}
		$Q->free_result();
		return $data;			
	} 

	public function update($data)
	{
			
		$masukan = array(
					"nip" => $data['nip'],
					"nama_lengkap" => $data['nama_lengkap'],
					"jenis_kelamin" => $data['jenis_kelamin'],
					"tempat_lahir" => $data['tempat_lahir'],
					"tanggal_lahir" => $data['tanggal_lahir'],
					"no_telp" => $data['no_telp'],
					"alamat_lengkap" => $data['alamat_lengkap'],
					"id_jabatan" => $data['id_jabatan'],
					"alamat_pekerjaan" => $data['alamat_pekerjaan'],
					);
		$this->db->where('nip',$this->input->post('nip'));
		$this->db->update("master_pegawai", $masukan);			
			
	}
}
	