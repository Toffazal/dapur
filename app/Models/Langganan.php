<?php

namespace App\Models;

use CodeIgniter\Model;

class Langganan extends Model
{

  protected $table = 'langganan';
  protected $allowedFields = ['email', 'tanggal'];


}