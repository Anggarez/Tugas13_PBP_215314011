<?php

namespace App\Controllers;

use \App\Models\AsistenModel;
use \App\Models\LoginModel;

class AsistenController extends BaseController
{
    protected $AsistenModel;
    protected $LoginModel;
    public function __construct()
    {
        $this->AsistenModel = new AsistenModel();
        $this->LoginModel = new LoginModel();
    }

    public function index()
    {
        $session = session();
        if ($session->has('pengguna')) {
            $asisten = $this->AsistenModel->findAll();

            $data = [
                'list' => $asisten
            ];
            return view('AsistenView', $data);
        }else {
            return view('asisten/login');
        }
    }
    public function simpan()
    {
        $session = session();
        if ($session->has('pengguna')) {
            helper('form');
            // Memeriksa apakah melakukan submit data atau tidak.
            if (!$this->request->is('post')) {
                return view('/asisten/simpan');
            }

            // Mengambil data yang disubmit dari form
            $post = $this->request->getPost([
                'nim',
                'nama',
                "praktikum",
                "ipk"
            ]);
            // Mengakses Model untuk menyimpan data
            $model = model(AsistenModel::class);
            $model->simpan($post);
            return view('/asisten/success');
        } else {
            return view('asisten/login');
        }
    }

    public function update()
    {
        $session = session();
        if ($session->has('pengguna')) {
            $db = \Config\Database::connect();
            $Builder = $db->table('asisten');

            helper('form');
            if (!$this->request->is('post')) {
                return view('/asisten/update');
            }

            $data = [
                'nama' => [$this->request->getPost('nama'),],
                'praktikum' => [$this->request->getPost('praktikum'),],
                'ipk' => [$this->request->getPost('ipk'),]

            ];
            $Builder->where('nim', $this->request->getPost('nim'));
            $Builder->update($data);
            return view('/asisten/success');
        } else {
            return view('asisten/login');
        }
    }

    public function delete()
    {
        $session = session();
        if ($session->has('pengguna')) {
            $db = \Config\Database::connect();
            $Builder = $db->table('asisten');

            helper('form');
            if (!$this->request->is('post')) {
                return view('/asisten/delete');
            }
            $post = $this->request->getPost(['nim']);
            $Builder->where('nim', $post);
            $Builder->delete();
            return view('/asisten/success');
        } else {
            return view('asisten/login');
        }
    }

    public function search()
    {
        $session = session();
        if ($session->has('pengguna')) {
            if (!$this->request->is('post')) {
                return view('/asisten/search');
            }

            $nim = $this->request->getPost(['key']);

            $model = model(AsistenModel::class);
            $asisten = $model->ambil($nim['key']);

            $data = ['hasil' => $asisten];
            return view('/asisten/search', $data);
        } else {
            return view('asisten/login');
        }
    }

    public function check()
    {
        if (!$this->request->is('post')) {
            return view('/asisten/login');
        }

        $model = model(LoginModel::class);

        $post = $this->request->getPost(['usr', 'pwd']);
        $asisten = $model->ambil($post['usr']);
        if ($post['usr'] == $asisten['Username'] && $post['pwd'] == $asisten['Password']) {
            $session = session();
            $session->set('pengguna', $post['usr']);
            return view('asisten/home');
        } else {
            return view('asisten/fail');
        }
    }

    public function home()
    {
        $key = $this->request->getPost(['usr', 'pwd']);
        $model = model(LoginModel::class);
        $session = session();
        if ($session->has('pengguna')) {
            $item = $session->get('pengguna');
            if ($item == $model->ambil($key['usr'])) {
                return view('asisten/home');
            } else {
                return view('asisten/login');
            }
        } else {
            return view('asisten/login');
        }
    }

    public function kembali()
    {
        $session = session();
        if ($session->has('pengguna')) {
            return view('/asisten/home');
        } else {
            return view('asisten/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('pengguna');
        return view('asisten/login');
    }

    public function login()
    {
        return view('asisten/login');
    }
}
