<?php

namespace App\Models;

use CodeIgniter\Model;

class Komen extends Model
{

  protected $table = 'komentar';
  protected $allowedFields = ['kategori', 'foto', 'nama', 'tanggapan', 'komentar', 'tanggal'];


  public function getPin($pin)
  {
  	return $this->db->table('pin')->getWhere(['pin' => $pin])->getResult();
  }


  public function getKomen($id = false)
  {
  	if($id)
  	{
  		return $this->where(['id'=> $id])->first();
  	}

  	return $this->findAll();
  }


}