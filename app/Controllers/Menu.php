<?php

namespace App\Controllers;
use \App\Models\Core;
use \App\Models\Balasan;
use \App\Models\Komen;

class Menu extends BaseController
{
	protected $Core;
  protected $Balasan;
  protected $Komentar;

  public function __construct()
  {
    $this->Core = new Core;
    $this->Balasan = new Balasan;
    $this->Komentar = new Komen;
  }

  public function index()
  {

    // DOKUMENTASI FUNCTION SEARCH

    // $search = $this->request->getVar('search');

    // if($search)
    // {
    //   $data = [
    //   'title' => 'Dapur Mama Ain',
    //   'halaman' => 'semua menu',
    //   'data' => $this->Core->search($search),
    //   session()->setFlashdata('pesan', 'Lihat Semua')
    // ];
    // }else{
    //   session()->remove('pesan');
    //   $data = [
    //   'title' => 'Dapur Mama Ain',
    //   'halaman' => 'semua menu',
    //   'data' => $this->Core->getMenu()
    // ];
    // }

    $data = [
      'title' => ' Daftar Menu Dapur Mama Ain',
      'kategory' => 'Kategori',
      'validation' => \Config\Services::validation(),
      'data' => $this->Core->getMenu()
      ];

    return view('menu', $data);
  }


  public function bolu()
  {

    $data = [
      'title' => 'Aneka Bolu',
      'kategory' => 'Bolu',
      'validation' => \Config\Services::validation(),
      'data' => $this->Core->getKategory('bolu')
      ];

    return view('menu', $data);
  }


  public function roti()
  {

    $data = [
      'title' => 'Aneka Roti',
      'kategory' => 'Roti',
      'validation' => \Config\Services::validation(),
      'data' => $this->Core->getKategory('roti')
      ];

    return view('menu', $data);
  }


  public function kuebasah()
  {

    $data = [
      'title' => 'Aneka Kue Basah',
      'kategory' => 'Kue Basah',
      'validation' => \Config\Services::validation(),
      'data' => $this->Core->getKategory('kue basah')
      ];

    return view('menu', $data);
  }


  public function kuekering()
  {

    $data = [
      'title' => 'Aneka Kue Kering',
      'kategory' => 'Kue Kering',
      'validation' => \Config\Services::validation(),
      'data' => $this->Core->getKategory('kue kering')
      ];

    return view('menu', $data);
  }


  public function kueraya()
  {

    $data = [
      'title' => 'Aneka Kue Raya',
      'kategory' => 'Kue Raya',
      'validation' => \Config\Services::validation(),
      'data' => $this->Core->getKategory('kue raya')
      ];

    return view('menu', $data);
  }


  public function cemilan()
  {

    $data = [
      'title' => 'Aneka Cemilan',
      'kategory' => 'Cemilan',
      'validation' => \Config\Services::validation(),
      'data' => $this->Core->getKategory('cemilan')
      ];

    return view('menu', $data);
  }



  public function detail($slug = false)
  {

    $data = [
      'title' => 'Dapur Mama Ain',
      'data' => $this->Core->where('slug', $slug)->first(),
      'datag' => $this->Core->getGallery($slug),
      'komen' => $this->Core->getKomen($slug),
      'komentar' => $this->Core->getKomentar($slug),
      'validation' => \Config\Services::validation(),
      'balasan' => $this->Balasan->findAll()
    ];

    return view('detail', $data);
  }



    public function kunjungan()
  { // Untuk menyimpan history kunjungan

    $id = $_POST['id'];

    $d = $this->Core->where('id', $id)->first();

    $kunjungan = $d->kunjungan + 1;


    $this->Core->save([
      'id' => $d->id,
      'slug' => $d->slug,
      'nama' => $d->nama,
      'kategory' => $d->kategory,
      'harga' => $d->harga,
      'keterangan' => $d->keterangan,
      'deskripsi' => $d->deskripsi,
      'gambar' => $d->gambar,
      'kunjungan' => $kunjungan
    ]);
  }
  







 }