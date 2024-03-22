<?php

namespace App\Controllers;
use \App\Models\Core;
use \App\Models\User;
use \App\Models\Galeri;
use \App\Models\Pin;
use \App\Models\Komen;
use \App\Models\Balasan;
use \App\Models\Langganan;

class Admin extends BaseController
{
	protected $Core;
  protected $User;
  protected $Galeri;
  protected $Pin;
  protected $Komentar;
  protected $Balasan;
  protected $Langganan;

  public function __construct()
  {
    $this->Core = new Core;
    $this->User = new User;
    $this->Galeri = new Galeri;
    $this->Pin = new Pin;
    $this->Komentar = new Komen;
    $this->Balasan = new Balasan;
    $this->Langganan = new Langganan;
    $this->email = \Config\Services::email();

  }



  public function login()
  {
    if(session()->has('email'))
    {
      session()->setFlashdata('pesan', 'Anda belum Login.');
      return redirect()->to(base_url('admin'));
    }


    $data = [
      'validation' => \Config\Services::validation(),
      'title' => 'Halaman Login'
    ];

    return view('admin/login', $data);
  }



  public function prosesLogin()
  {
    //Validasi input
    if(!$this->validate([

      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Email tidak boleh kosong.'
        ]
      ],

      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Password tidak boleh kosong.'
        ]
      ]

    ])) {
      return redirect()->to(base_url('admin/login/'))->withInput();
    }

    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    $user = $this->User->where(['email' => $email])->first();

    //jika user ada
    if($user)
    {
        //cek password
        if(password_verify($password, $user->password))
        {
          session()->set('email', $user->email);
          return redirect()->to(base_url('admin'));
        }else{
          session()->setFlashdata('danied', 'Password salah.');
          return redirect()->to(base_url('admin/login'));
        }
      }else{
          session()->setFlashdata('danied', 'Email tidak terdaftar.');
          return redirect()->to(base_url('admin/login'));
    }
  }



  public function logout()
  {
    session()->remove('email');
    session()->setFlashdata('pesan', 'Anda telah logout.');
    return redirect()->to(base_url('admin/login'));
  }





  public function index()
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

  	$data = [
  		'title' => 'Halaman Admin',
      'menu' => $this->Core->findAll(),
      'galeri' => $this->Galeri->findAll(),
      'komentar' => $this->Komentar->findAll(),
      'berlangganan' => $this->Langganan->findAll()
  	];

    return view('admin/index', $data);
  }



  public function akun()
  {

        if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    $data = [
      'title' => 'Pengaturan Akun',
      'validation' => \Config\Services::validation(),
      'data' => $this->User->getAkun(1)
    ];

    return view('admin/akun', $data);
  }



  public function editAkun()
  {

       if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    //Validasi input
    if(!$this->validate([

      'password' => [
        'rules' => 'min_length[8]',
        'errors' => [
          'min_length' => 'Password minimal 8 karakter.'
        ]
      ]

    ])) {
      return redirect()->to(base_url('admin/akun/'))->withInput();
    }

    $id = $this->request->getVar('id');
    $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

    $this->User->save([
      'id' => $id,
      'password' => $password
    ]);

    session()->setFlashdata('pesan', 'Pasword telah diubah.');
    return redirect()->to(base_url('admin/akun'));

  }





  public function menu($slug = false)
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }


    if($slug)
    {
      $data = [
      'title' => 'Halaman admin | Menu',
      'validation' => \Config\Services::validation(),
      'data' => $this->Core->getMenu($slug)
    ];
      return view('admin/editMenu', $data);
    }

    $data = [
      'title' => 'Halaman admin | Menu',
      'data' => $this->Core->getMenu()
    ];

    return view('admin/menu', $data);
    
  }


  public function tambahMenu()
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }


    $data = [
      'title' => 'Halaman admin | Menu',
      'validation' => \Config\Services::validation(),
      'data' => $this->Core->getMenu()
    ];

    return view('admin/tambahMenu', $data);
  }


  public function simpanMenu()
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    //Validasi input
    if(!$this->validate([

      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} menu harus diisi.'
        ]
      ],

      'kategory' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} menu harus diisi.'
        ]
      ],

      'harga' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} menu harus diisi.'
        ]
      ],

      'deskripsi' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} menu harus diisi.'
        ]
      ],

      'gambar' => [
        'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran gambar terlalu besar',
          'is_image' => 'File harus berupa gambar',
          'mime_in' => 'File harus berupa gambar'
        ]
      ]

    ])) {
      return redirect()->to(base_url('admin/tambahMenu/'))->withInput();
    }

    $gambar = $this->request->getFile('gambar');

    if($gambar->getError() ==  4){
      $namaSampul = 'default.jpg';
    }else{
    $namaSampul = $gambar->getName();
    $gambar->move('public/assets/img/', $namaSampul);
    }

    $slug = url_title($this->request->getVar('nama'), '-', true);
    $this->Core->save([
      'slug' => $slug,
      'nama' => htmlspecialchars($this->request->getVar('nama')),
      'kategory' => htmlspecialchars($this->request->getVar('kategory')),
      'harga' => htmlspecialchars($this->request->getVar('harga')),
      'keterangan' => htmlspecialchars($this->request->getVar('keterangan')),
      'deskripsi' => htmlspecialchars($this->request->getVar('deskripsi')),
      'gambar' => $namaSampul
    ]);

    session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

    return redirect()->to(base_url('admin/menu'));
  }



  public function updateMenu()
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    //Validasi input
    if(!$this->validate([

      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} menu harus diisi.'
        ]
      ],

      'kategory' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} menu harus diisi.'
        ]
      ],

      'harga' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} menu harus diisi.'
        ]
      ],

      'deskripsi' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} menu harus diisi.'
        ]
      ],

      'gambar' => [
        'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran gambar terlalu besar',
          'is_image' => 'File harus berupa gambar',
          'mime_in' => 'File harus berupa gambar'
        ]
      ]

    ])) {
      return redirect()->to(base_url('admin/editMenu/'.$this->request->getVar('slug')))->withInput();
    }

    $gambar = $this->request->getFile('gambar');
    $gambarLama = $this->request->getVar('gambarLama');

    if($gambar->getError() ==  4){
      $namaSampul = $gambarLama;
    }else{
    $namaSampul = $gambar->getName();
    $gambar->move('public/assets/img/', $namaSampul);
    unlink('public/assets/img/'.$gambarLama);
    }

    $slug = url_title($this->request->getVar('nama'), '-', true);
    $this->Core->save([
      'id' => $this->request->getVar('id'),
      'slug' => $slug,
      'nama' => htmlspecialchars($this->request->getVar('nama')),
      'kategory' => htmlspecialchars($this->request->getVar('kategory')),
      'harga' => htmlspecialchars($this->request->getVar('harga')),
      'keterangan' => htmlspecialchars($this->request->getVar('keterangan')),
      'deskripsi' => htmlspecialchars($this->request->getVar('deskripsi')),
      'gambar' => $namaSampul
    ]);

    session()->setFlashdata('pesan', 'Data berhasil diubah.');

    return redirect()->to(base_url('admin/menu/'.$slug));
  }



  public function hapusMenu($id = false)
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    if(!$id)
    {
      session()->setFlashdata('danied', 'ACCESS DANIED!');
      return redirect()->to(base_url('admin/menu'));
    }

    $data = $this->Core->getMenuId($id);
    foreach($data as $d)
    {
      unlink('public/assets/img/'.$d->gambar);
    }

    $this->Core->delete($id);

    session()->setFlashdata('pesan', 'Menu berhasil dihapus');
    return redirect()->to(base_url('admin/menu'));
  }



  public function galeri($slug = false)
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }


    if($slug)
    {
      $data = [
        'title' => 'Halaman admin | Galeri',
        'validation' => \Config\Services::validation(),
        'data' => $this->Galeri->getGaleri($slug)
      ];

      return view('admin/lihatGaleri', $data);    
    }

    $data = [
      'title' => 'Halaman admin | Galeri',
      'data' => $this->Core->getMenu()
    ];

    return view('admin/galeri', $data); 

  }



  public function tambahGaleri()
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    $data = [
      'title' => 'Halaman admin | Tambah Galeri',
      'validation' => \Config\Services::validation(),
      'data' => $this->Core->findAll()
    ];

    return view('admin/tambahGaleri', $data);
  }



  public function simpanGaleri()
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    //Validasi input
    if(!$this->validate([
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} galeri harus diisi.'
        ]
      ],

      'alt' => [
        'rules' => 'required|max_length[100]',
        'errors' => [
          'required' => '{field} galeri harus diisi.',
          'max_length' => '{field} galeri harus diisi.'
        ]
      ],

      'galeri' => [
        'rules' => 'max_size[galeri,6000]|is_image[galeri]|mime_in[galeri,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran galeri terlalu besar',
          'is_image' => 'File harus berupa galeri',
          'mime_in' => 'File harus berupa galeri'
        ]
      ]

    ])) {
      session()->setFlashdata('danger', 'ada yang salah.');
      return redirect()->to(base_url('admin/tambahGaleri'))->withInput();
    }

    $gambar = $this->request->getFile('galeri');
    $slug = url_title($this->request->getVar('nama'), '-', true);

    if($gambar->getError() ==  4){
      $namaSampul = 'default.jpg';
    }else{
    $namaSampul = $gambar->getRandomName();
    $gambar->move('public/assets/'.$slug.'/', $namaSampul);
    }

    $this->Galeri->save([
      'slug' => $slug,
      'kategori' => htmlspecialchars($this->request->getVar('nama')),
      'alt' => htmlspecialchars($this->request->getVar('alt')),
      'galeri' => $namaSampul
    ]);

    session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

    return redirect()->to(base_url('admin/galeri/'.$slug));
  }



  public function editGaleri($slug = false)
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    if(!$slug)
    {
      return redirect()->to(base_url('admin/galeri'));
    }


    $data = [
      'title' => 'Halaman admin | Edit Galeri',
      'validation' => \Config\Services::validation(),
      'data' => $this->Galeri->getGaleri($slug)
    ];

    return view('admin/editGaleri', $data);
  }


  public function updateGaleri()
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    //Validasi input
    if(!$this->validate([
      'kategori' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} galeri harus diisi.'
        ]
      ],

      'alt' => [
        'rules' => 'required|max_length[100]',
        'errors' => [
          'required' => '{field} galeri harus diisi.',
          'max_length' => '{field} galeri harus diisi.'
        ]
      ],

      'galeri' => [
        'rules' => 'max_size[galeri,6000]|is_image[galeri]|mime_in[galeri,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'Ukuran galeri terlalu besar',
          'is_image' => 'File harus berupa galeri',
          'mime_in' => 'File harus berupa galeri'
        ]
      ]

    ])) {
      session()->setFlashdata('danger', 'ada yang salah.');
      return redirect()->to(base_url('admin/tambahGaleri'))->withInput();
    }

    $gambar = $this->request->getFile('galeri');
    $gambarLama = $this->request->getVar('gambarLama');
    $slug = url_title($this->request->getVar('kategori'), '-', true);

    if($gambar->getError() ==  4){
      $namaSampul = $gambarLama;
    }else{
    $namaSampul = $gambar->getName();
    $gambar->move('public/assets/'.$slug.'/', $namaSampul);
    unlink('public/assets/'.$slug.'/'.$gambarLama);
    }

    $this->Galeri->save([
      'id' => $this->request->getVar('id'),
      'slug' => $slug,
      'kategori' => htmlspecialchars($this->request->getVar('kategori')),
      'alt' => htmlspecialchars($this->request->getVar('alt')),
      'galeri' => $namaSampul
    ]);

    session()->setFlashdata('pesan', 'Data berhasil diubah.');

    return redirect()->to(base_url('admin/galeri/'.$slug));
  }



  public function hapusGaleri($id = false)
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    if(!$id)
    {
      session()->setFlashdata('danied', 'ACCESS DANIED!');
      return redirect()->to(base_url('admin/galeri'));
    }

    $data = $this->Galeri->getGaleriId($id);
    foreach($data as $d)
    {
      unlink('public/assets/'.$d->slug.'/'.$d->galeri);
    }

    $this->Galeri->delete($id);

    session()->setFlashdata('pesan', 'Galeri berhasil dihapus');
    return redirect()->to(base_url('admin/galeri'));
  }





  public function komentar($id = false)
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }


    if($id)
    {
      $data = [
      'title' => 'Halaman admin | Edit komentar',
      'validation' => \Config\Services::validation(),
      'd' => $this->Pin->getPin($id)
    ];

    return view('admin/editKomentar', $data);
    }


    $data = [
      'title' => 'Halaman admin | Komentar',
      'data' => $this->Pin->getPin()
    ];

    return view('admin/komentar', $data);
  }
  


  public function tambahKomentar()
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    $data = [
      'title' => 'Dapur Mama Ain | Buat PIN Komentar',
      'validation' => \Config\Services::validation()
    ];

    return view('admin/tambahKomentar', $data);
  }



  public function simpanKomentar()
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    //Validasi input
    if(!$this->validate([
      'pin' => [
        'rules' => 'required|max_length[6]',
        'errors' => [
          'required' => '{field} harus diisi.',
          'max_length' => 'Maksimal 6 angka'
        ]
      ],

      'kategori' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.'
        ]
      ],

      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi'
        ]
      ]

    ])) {
      return redirect()->to(base_url('admin/tambahKomentar'))->withInput();
    }

    $kategori = url_title($this->request->getVar('kategori'), '-', true);
    $this->Pin->save([
      'pin' => htmlspecialchars($this->request->getVar('pin')),
      'kategori' => $kategori,
      'foto' => 'default.jpg',
      'nama' => htmlspecialchars($this->request->getVar('nama')),
    ]);

    session()->setFlashdata('pesan', 'PIN berhasil dibuat.');
    return redirect()->to(base_url('admin/komentar'));
  }



  public function updateKomentar()
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    //Validasi input
    if(!$this->validate([
      'pin' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.'
        ]
      ],

      'kategori' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.'
        ]
      ],

      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi'
        ]
      ]

    ])) {
      return redirect()->to(base_url('admin/komentar/'.$this->request->getVar('id')))->withInput();
    }

    $kategori = url_title($this->request->getVar('kategori'), '-', true);
    $this->Pin->save([
      'id' => $this->request->getVar('id'),
      'pin' => htmlspecialchars($this->request->getVar('pin')),
      'kategori' => $kategori,
      'foto' => 'default.jpg',
      'nama' => htmlspecialchars($this->request->getVar('nama')),
    ]);

    session()->setFlashdata('pesan', 'PIN berhasil diubah.');
    return redirect()->to(base_url('admin/komentar'));
  }



  public function hapusKomentar($id = false)
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    $this->Pin->delete($id);

    session()->setFlashdata('pesan', 'PIN berhasil dihapus.');
    return redirect()->to(base_url('admin/komentar'));
  }



  public function hapusKomen($id = false)
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }


    $data = $this->Komentar->where(['id' => $id])->first();
    $d = $this->Core->where(['slug' => $data->kategori])->first();
    $this->Komentar->delete($id);
    $this->Balasan->delete($id);

    session()->setFlashdata('pesan', 'Komentar telah dihapus.');
    return redirect()->to(base_url('menu/'.$d->slug.'#komentar'));
  }






  public function balas($id =  false)
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    if(!$id)
    {
      return redirect()->to(base_url('menu'));
    }

    $data = [
      'title' => 'Dapur Mama Ain | Balas komentar',
      'validation' => \Config\Services::validation(),
      'data' => $this->Komentar->getKomen($id)
    ];

    return view('admin/balas', $data);
  }



  public function simpanBalas()
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    //Validasi input
    if(!$this->validate([
      'kategori' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.'
        ]
      ],

      'balasan' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.'
        ]
      ]

    ])) {
      return redirect()->to(base_url('admin/balas/'.$this->request->getVar('id')))->withInput();
    }

    $this->Balasan->insert([
      'id' => $this->request->getVar('id'),
      'kategori' => htmlspecialchars($this->request->getVar('kategori')),
      'gambar' => 'icon.jpg',
      'nama' => 'Dapur Mama Ain',
      'balasan' => htmlspecialchars($this->request->getVar('balasan')),
      'tanggal' => date('d-m-Y')
    ]);

    session()->setFlashdata('pesan', 'Komentar telah dibalas.');
    return redirect()->to(base_url('menu/'.htmlspecialchars($this->request->getVar('kategori'))).'#komentar');
  }



  public function editBalasan($id = false)
  {
    if(session()->has('email'))
    {
      session()->setFlashdata('pesan', 'Anda belum Login.');
      return redirect()->to(base_url('admin'));
    }

    if(!$id)
    {
      return redirect()->to(base_url('menu'));
    }

    $data = [
      'title' => 'Dapur Mama Ain | Edit balasan',
      'validation' => \Config\Services::validation(),
      'k' => $this->Komentar->getKomen($id),
      'd' => $this->Balasan->where('id', $id)->first()
    ];

    return view('admin/editBalasan', $data);
  }



  public function updateBalasan()
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    //Validasi input
    if(!$this->validate([
      'kategori' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.'
        ]
      ],

      'balasan' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus diisi.'
        ]
      ]

    ])) {
      return redirect()->to(base_url('admin/balas/'.$this->request->getVar('id')))->withInput();
    }

    $this->Balasan->save([
      'id' => $this->request->getVar('id'),
      'kategori' => htmlspecialchars($this->request->getVar('kategori')),
      'gambar' => 'icon.jpg',
      'nama' => 'Dapur Mama Ain',
      'balasan' => htmlspecialchars($this->request->getVar('balasan')),
      'tanggal' => date('d-m-Y')
    ]);

    session()->setFlashdata('pesan', 'Balasan telah diedit.');
    return redirect()->to(base_url('menu/'.htmlspecialchars($this->request->getVar('kategori'))).'#komentar');
  }



  public function hapusBalasan($id = false)
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }


    $data = $this->Komentar->where(['id' => $id])->first();
    $d = $this->Core->where(['slug' => $data->kategori])->first();
    $this->Balasan->delete($id);

    session()->setFlashdata('pesan', 'Balasan telah dihapus.');
    return redirect()->to(base_url('menu/'.$d->slug.'#komentar'));
  }







  public function langganan()
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    $data = [
      'title' => 'Halaman admin | Email berlangganan',
      'data' => $this->Core->langganan()
    ];

    return view('admin/langganan', $data);
  }


  public function hapusLangganan($id = false)
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }

    if(!$id)
    {
      return redirect()->to(base_url('admin/langganan'));
    }

    $this->Langganan->delete($id);

    session()->setFlashdata('pesan', 'Email langganan telah dihapus.');
    return redirect()->to(base_url('admin/langganan'));    
  }
  
  
  
  function acak($panjang)
{
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
    $pos = rand(0, strlen($karakter)-1);
    $string .= $karakter[$pos];
    }
    return $string;
}
  
  
  
  
  public function resetPassword()
  {
  	$to = $this->User->first();
  	$random = $this->acak(8);
  	
  	$from = "admin@dapurmamaain.xyz";    
    $to = $to->email;    
    $subject = "Reset Password";    
    $message = "Password sementara anda : $random \r\n Segera ubah password anda!";   
    $headers = "From:" . $from;    
    if(mail($to, $subject, $message, $headers))
    {
      $this->User->save([
      'id' => $to->id,
      'email' => $to->email,
      'password' => password_hash($random, PASSWORD_DEFAULT)
      ]);
      
    session()->setFlashdata('pesan', 'Password telah dikirim ke email anda.');
    return redirect()->to(base_url('admin/login'));  
    }else{
  	return $this->email->printDebugger();
  	}
  	
  }





  public function email()
  {
    if(!session()->has('email'))
    {
      session()->setFlashdata('danied', 'Anda belum Login.');
      return redirect()->to(base_url('admin/login'));
    }
    
    $data = [
      'title' => 'Halaman admin | Kirim email',
      'validation' => \Config\Services::validation()
    ];

    return view('admin/email', $data);
  }
  
  
  
  
  public function kirimEmail()
  {
  	$to = $this->Langganan->FindAll();
  	$subject = $this->request->getVar('subject');
  	$pesan= $this->request->getVar('pesan');
  	
  	$this->email->setFrom('admin@dapurmamaain.xyz', 'Dapur Mama Ain');
	foreach($to as $t) {
  	$this->email->setTo($t->email);
	}
  	$this->email->setReplyTo('dapurmamaain@gmail.com' , 'Dapur Mama Ain');
  	
  	$this->email->setSubject($subject);
  	$this->email->setMessage($pesan);
  	
  	if($this->email->send())
  	{
  		session()->setFlashdata('pesan', 'Pesan telah terkirim.');
    		return redirect()->to(base_url('admin/email'));  
  	}else{
  		return $this->email->printDebugger();
  	}
  	
  }



}