<?php

namespace App\Models;

use CodeIgniter\Model;

class Galeri extends Model
{

  protected $table = 'gallery';
  protected $allowedFields = ['slug', 'galeri', 'kategori', 'alt'];


public function getGaleri($slug = false)
  {
  	if($slug == false){
  		return $this->findAll();
  	}

  	return $this->where(['slug' => $slug])->findAll();
  }

  public function getGaleriId($id = false)
  {
  	if($id == false){
  		return $this->findAll();
  	}

  	return $this->where(['id' => $id])->find();
  }


}