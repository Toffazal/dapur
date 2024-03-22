<?php

namespace App\Models;

use CodeIgniter\Model;

class Pin extends Model
{

  protected $table = 'pin';
  protected $allowedFields = ['pin', 'kategori', 'foto', 'nama'];



  public function getPin($id = false)
  {

  	if($id)
  	{
  		return $this->where(['id' => $id])->first();
  	}

  	return $this->findAll();
  }


}