<?php

namespace App\Models;

use CodeIgniter\Model;

class Balasan extends Model
{

  protected $table = 'balasan';
  protected $allowedFields = ['id', 'kategori', 'gambar', 'nama', 'balasan',  'tanggal'];


  public function getBalas($id = false)
  {
  	if($id)
  	{
  		return $this->where(['id'=> $id])->first();
  	}

  	return $this->findAll();
  }


}