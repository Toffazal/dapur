<?php

namespace App\Controllers;
use \App\Models\Komen;
use \App\Models\Pin;

class Komentar extends BaseController
{
	protected $Komentar;
  protected $Pin;

  public function __construct()
  {
    $this->Komentar = new Komen; 
    $this->Pin = new Pin;
  }

  public function index()
  {
  	$data = [
  		'title' => 'Dapur Mama Ain | Komentar',
      'validation' => \Config\Services::validation()
  	];

    return view('komentar', $data);
  }



  public function simpan()
  {
    //Validasi input
    if(!$this->validate([
      'pin' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} komentar harus diisi.'
        ]
      ],

      'tanggapan' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.'
        ]
      ],

      'komentar' => [
        'rules' => 'required|max_length[300]',
        'errors' => [
          'required' => 'Komentar harus diisi',
          'max_length' => 'Komentar terlalu panjang'
        ]
      ]

    ])) {
      session()->setFlashdata('danger', 'ada yang salah.');
      return redirect()->to(base_url('komentar'))->withInput();
    }

    $pin = $this->request->getVar('pin');
    $d = $this->Pin->where(['pin' => $pin])->first();

    if($d == false)
    {
      session()->setFlashdata('danied', 'PIN tidak terdaftar.');
      return redirect()->to(base_url('komentar'));
    }

      $idPin = $d->id;
      $kategori = $d->kategori;
      $foto = $d->foto;
      $nama = $d->nama;

    $this->Komentar->save([
      'kategori' => $kategori,
      'foto' => $foto,
      'nama' => $nama,
      'tanggapan' => htmlspecialchars($this->request->getVar('tanggapan')),
      'komentar' => htmlspecialchars($this->request->getVar('komentar')),
      'tanggal' => date('d-m-Y')
    ]);

    $this->Pin->delete($idPin);

    session()->setFlashdata('pesan', 'Komentar berhasil ditambahkan.');

    return redirect()->to(base_url('komentar'));
  }

}