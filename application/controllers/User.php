<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Websid_model');
    }

    public function index()
    {
        $data['papaninformasi'] = $this->Websid_model->getPapanInformasi();
        $data['kepaladesa'] = $this->Websid_model->getKepalaDesa();
        $data['perangkatdesa'] = $this->Websid_model->getPerangkatDesa();

        $this->load->view('user/templates/header');
        $this->load->view('user/index', $data);
        $this->load->view('user/templates/footer');
    }

    public function profildesa()
    {
        $data['potensi'] = $this->Websid_model->getPotensi();

        $this->load->view('user/templates/header');
        $this->load->view('user/profildesa', $data);
        $this->load->view('user/templates/footer');
    }

    public function jdih()
    {
        $data['perdes'] = $this->Websid_model->getPerdes();
        $data['perkades'] = $this->Websid_model->getPerkades();

        $this->load->view('user/templates/header');
        $this->load->view('user/jdih', $data);
        $this->load->view('user/templates/footer');
    }

    public function bumdes()
    {
        $data['pengurus'] = $this->Websid_model->getPengurus();
        $data['bumdes'] = $this->Websid_model->getBumdes();
        $data['unitusaha'] = $this->Websid_model->getUnitusaha();

        $this->load->view('user/templates/header');
        $this->load->view('user/bumdes', $data);
        $this->load->view('user/templates/footer');
    }

    public function galeri()
    {
        $data['filter'] = $this->Websid_model->getFilter();
        $data['galeri'] = $this->Websid_model->getGaleri();

        $this->load->view('user/templates/header');
        $this->load->view('user/galeri', $data);
        $this->load->view('user/templates/footer');
    }

    public function artikeldanberita()
    {
        $data['artikeldanberita'] = $this->Websid_model->getArtikeldanberita();
        $data['kategori'] = $this->Websid_model->getKategori();

        $this->load->library('pagination');

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // $this->db->like('judul', $data['keyword']);
        // $this->db->or_like('isi', $data['keyword']);
        $this->db->from('artikeldanberita');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 8;

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['artikeldanberita'] = $this->Websid_model->getAdb($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('user/templates/header');
        $this->load->view('user/artikeldanberita', $data);
        $this->load->view('user/templates/footer');
    }

    public function kategori()
    {
        $nama_kategori = $this->input->get('filter');
        $kategori = $this->Websid_model->getKategoriByName($nama_kategori);
        $data['artikeldanberita'] = $this->Websid_model->getAdbByKategori($kategori['id']);
        $data['kategori'] = $this->Websid_model->getKategori();

        $this->load->view('user/templates/header');
        $this->load->view('user/artikeldanberita', $data);
        $this->load->view('user/templates/footer');
    }

    public function detailartikeldanberita($id)
    {
        $data['artikeldanberita'] = $this->Websid_model->getArtikeldanberita();
        $data['artikeldanberita'] = $this->Websid_model->getArtikeldanberitaById($id);
        $data['kategori'] = $this->Websid_model->getKategori();

        $this->load->view('user/templates/header');
        $this->load->view('user/detailartikeldanberita', $data);
        $this->load->view('user/templates/footer');
    }

    public function kontak()
    {
        $data['kontak'] = $this->Websid_model->getKontak();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Masukkan nama anda!']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Masukkan alamat rumah anda!']);
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim', ['required' => 'Masukkan pesan, kritik atau saran!']);

        if ($this->form_validation->run() == false) {
            $this->load->view('user/templates/header');
            $this->load->view('user/kontak', $data);
            $this->load->view('user/templates/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $alamat = $this->input->post('alamat', true);
            $isi = $this->input->post('isi', true);
            $data = [
                'nama' => $nama,
                'alamat' => $alamat,
                'tanggal' => time(),
                'isi' => $isi
            ];

            $this->db->insert('pesan', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success mb-3" role="alert">Pesan, kritik dan saran berhasil dikirim!</div>');
            redirect('user/kontak');
        }
    }
}
