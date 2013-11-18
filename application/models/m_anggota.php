<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	Class m_anggota extends CI_Model
{
	
	public function simpan($data)
	{
			
		$masukan = array(
					"no_ba" => $data['no_ba'],
					"nama_lengkap" => $data['nama_lengkap'],
					"no_ktp" => $data['no_ktp'],
					"jenis_kelamin" => $data['jenis_kelamin'],
					"tempat_lahir" => $data['tempat_lahir'],
					"tanggal_lahir" => $data['tanggal_lahir'],
					"no_telp" => $data['no_telp'],
					"alamat" => $data['alamat'],
					"lingkungan" => $data['lingkungan'],
					"pekerjaan" => $data['pekerjaan'],
					"alamat_pekerjaan" => $data['alamat_pekerjaan'],
					"nama_suamiisteri" => $data['nama_suamiisteri'],
					"orang_tua" => $data['orang_tua'],
					"uang_pangkal" => $data['uang_pangkal'],
					"simpanan_wajib" => $data['simpanan_wajib'],
					"simpanan_pokok" => $data['simpanan_pokok'],
					"iuran_sumbangan" => $data['iuran_sumbangan'],
					"simpanan_sukarela" => $data['simpanan_sukarela'] ,
					"tanggal_masuk" => date('Y-m-d H:i:s'),
					"periode" => date('Y')
					);
		$this->db->insert("master_anggota", $masukan);			
			
	}
	public function hapus($id)
	{
		$this->db->where("no_ba",$id);
		$this->db->delete("master_anggota");
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
					"no_ba" => $data['no_ba'],
					"nama_lengkap" => $data['nama_lengkap'],
					"no_ktp" => $data['no_ktp'],
					"jenis_kelamin" => $data['jenis_kelamin'],
					"tempat_lahir" => $data['tempat_lahir'],
					"tanggal_lahir" => $data['tanggal_lahir'],
					"no_telp" => $data['no_telp'],
					"alamat" => $data['alamat'],
					"lingkungan" => $data['lingkungan'],
					"pekerjaan" => $data['pekerjaan'],
					"alamat_pekerjaan" => $data['alamat_pekerjaan'],
					"nama_suamiisteri" => $data['nama_suamiisteri'],
					"orang_tua" => $data['orang_tua'],
					"uang_pangkal" => $data['uang_pangkal'],
					"simpanan_wajib" => $data['simpanan_wajib'],
					"simpanan_pokok" => $data['simpanan_pokok'],
					"iuran_sumbangan" => $data['iuran_sumbangan'],
					"simpanan_sukarela" => $data['simpanan_sukarela'] ,
					
					);
		$this->db->where('no_ba',$this->input->post('no_ba'));
		$this->db->update("master_anggota", $masukan);			
			
	}
}
	