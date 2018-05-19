<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->library('pagination');
        $this->load->model('Pegawai_model');
    }

    public function index()
    {
        $data = [];
        $total = $this->Pegawai_model->getTotal();

        if ($total > 0) {
            $limit = 1;
            $start = $this->uri->segment(3, 0);

            $config = [
                'base_url' => base_url() . 'pegawai/index',
                'total_rows' => $total,
                'per_page' => $limit,
                'uri_segment' => 3,

                // Bootstrap 3 Pagination
                'first_link' => 'First',
                'last_link' => 'Last',
                'next_link' => 'Next',
                'prev_link' => 'Prev',
                'full_tag_open' => '<ul class="pagination">',
                'full_tag_close' => '</ul>',
                'num_tag_open' => '<li>',
                'num_tag_close' => '</li>',
                'cur_tag_open' => '<li class="active"><span>',
                'cur_tag_close' => '<span class="sr-only">(current)</span></span></li>',
                'next_tag_open' => '<li>',
                'next_tag_close' => '</li>',
                'prev_tag_open' => '<li>',
                'prev_tag_close' => '</li>',
                'first_tag_open' => '<li>',
                'first_tag_close' => '</li>',
                'last_tag_open' => '<li>',
                'last_tag_close' => '</li>',
            ];
            $this->pagination->initialize($config);
                     

            $data = [
               'results' => $this->Pegawai_model->list($limit, $start),
               'namaDivisi'=> $this->Pegawai_model->nama_divisi(),
                'links' => $this->pagination->create_links()
            ];
        }

        $this->load->view('pegawai/index', $data);
    }

    public function tambah()
    {
        $divisi = $this->Pegawai_model->get_divisi();
        $data = ['data' => $divisi];
        $this->load->view('pegawai/create', $data);
    }

    public function input()
    {
        $data = array(
            'nama'=>$this->input->post('nama'),
            'tanggal_lahir'=>$this->input->post('tanggalLahir'),
            'alamat'=>$this->input->post('alamat'),
            'no_hp'=> $this->input->post('hp'),
            'email'=> $this->input->post('mail'),
            'divisi'=> $this->input->post('divisi')
        );
         
        $perintah = $this->Pegawai_model->insert($data);

        if($perintah)
        {
            redirect('Pegawai/pegawai');
        }
        else
        {
            redirect('Pegawai/tambah');
        }
    }

    public function edit($NIK)
    {
        $pegawai = $this->Pegawai_model->show($NIK);
        $divisi = $this->Pegawai_model->nama_divisi();
        $data = [
            'data' => $pegawai, 
            'namaDivisi' => $divisi,
            'error' => ''
        ];
        $this->load->view('pegawai/edit', $data);
    }

    public function update($NIK)
    {
        $NIK = $this->input->post('NIK');

            $data = array(
                'nama'=>$this->input->post('nama'),
                'tanggal_lahir'=>$this->input->post('tanggalLahir'),
                'alamat'=>$this->input->post('alamat'),
                'no_hp'=> $this->input->post('kontak'),
                'email'=> $this->input->post('email'),
                'divisi'=> $this->input->post('divisi')

        );
         
        $perintah = $this->Pegawai_model->update($NIK, $data);

        if($perintah)
        {
            redirect('pegawai');
        }
        else
        {
            redirect('pegawai/edit');
        }
    }

    public function hapus($NIK)
    {
        $pegawai = $this->Pegawai_model->delete($NIK);
        redirect('pegawai');
    }
    


}


