<?php

namespace App\Controllers;
use \App\Models\Core;
use \App\Models\Galeri;

class Home extends BaseController
{
	protected $Core;
    protected $Galeri;

  public function __construct()
  {
    $this->Core = new Core;
    $this->Galeri = new Galeri;
  }

  public function index()
  {
  	$data = [
  		'title' => 'Dapur Mama Ain',
      'validation' => \Config\Services::validation(),
  		'data' => $this->Core->orderBy('kunjungan', 'desc')->limit(6)->find(),
  		'raya' => $this->Core->where('kategory', 'Kue raya')->limit(5)->find()
  	];

    return view('index', $data);
  }


  public function berlangganan()
  {
    //Validasi input
    if(!$this->validate([

      'email' => [
        'rules' => 'is_unique[langganan.email]',
        'errors' => [
          'is_unique' => 'Email ini telah terdaftar.'
        ]
      ]

    ])) {
      return redirect()->to(base_url('home/index#langganan'))->withInput();
    }


    $this->Langganan->save([
      'email' => htmlspecialchars($this->request->getVar('email')),
      'tanggal' => date('d-m-Y')
    ]);

    session()->setFlashdata('pesan', 'Email berhasil terdaftar.');
    return redirect()->to(base_url('home/index#langganan'));
  }
  
  public function galeri($slug)
  {
    if(!$slug)
    {
      return redirect()->to(base_url());
    }

    $data = [
      'title' => 'Galeri',
      'validation' => \Config\Services::validation(),
      'data' => $this->Galeri->where('slug', $slug)->findAll()
    ];

    return view('galeri', $data);
  }

}