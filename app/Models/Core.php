<?php

namespace App\Models;

use CodeIgniter\Model;

class Core extends Model
{

  protected $table = "menu";
  protected $allowedFields = ['slug', 'nama', 'kategory', 'harga', 'keterangan', 'deskripsi', 'gambar', 'kunjungan'];


  public function getMenu($slug = false)
  {
  	if($slug == false){
  		return $this->orderBy('kunjungan', 'desc')->find();
  	}

    return $this->where(['slug' => $slug])->find();
  }


  public function getMenuId($id = false)
  {
    if($id == false){
      return $this->findAll();
    }

    return $this->where(['id' => $id])->find();
  }


  public function getGallery($slug = false)
  {
      return $this->db->table('gallery')->getWhere(['slug' => $slug])->getResult();
  }


  public function getTerlaris()
  {

    return $this->where(['keterangan' => 'terlaris'])->find();
  }


  public function getKategory($kategory = false)
  {

    return $this->where(['kategory' => $kategory])->orderBy('kunjungan'. 'desc')->find();
  }


  public function getKomen($slug = false)
  {
    return $this->db->table('komentar')->limit(3)->orderBy('tanggal', 'DESC')->getWhere(['kategori' => $slug])->getResult();
  }


  public function getKomentar($slug = false)
  {
    if($slug == false)
    {
     return $this->db->table('komentar')->get()->getResult(); 
    }

    return $this->db->table('komentar')->orderBy('tanggal', 'DESC')->getWhere(['kategori' => $slug])->getResult();
  }


  public function getTerbatas($slug = false)
  {
    if($slug == false){
      return $this->db->table('terbatas')->getWhere(['status' => 'aktif'])->getResult();
    }

    return $this->db->table('terbatas')->getWhere(['slug' => $slug, 'status' => 'aktif'])->getResult();
  }

  public function getOrder($status = 'aktif')
  {
    if($status == 'semua'){
      return $this->db->table('terbatas')->get()->getResult();
    }

    return $this->db->table('terbatas')->getWhere(['status' => $status])->getResult();
  }




  public function langganan()
  {
    return $this->db->table('langganan')->get()->getResult();
  }

  public function hapusLangganan($id = false)
  {
    return $this->db->table('langganan')->delete('id', $id);
  }



  public function getAkun()
  {
    return $this->db->table('user')->get()->getResult();
  }


  public function search($search = false)
  {
    if($search == false){
      return $this->findAll();
    }

    return $this->like(['nama' => $search])->find();

  }



}