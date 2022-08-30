<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Websid_model');
        $this->load->library('form_validation');
    }

    // Dashboard

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesan'] = $this->Websid_model->getPesan();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/index', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function hapuspesan($id)
    {
        $this->Websid_model->hapusPesan($id);
        $this->session->set_flashdata('pesandua', '<div class="alert alert-success" role="alert">Data pesan, kritik atau saran berhasil dihapus!</div>');
        redirect('admin');
    }

    // Perangkat Desa

    public function perangkatdesa()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['kepaladesa'] = $this->Websid_model->getKepalaDesa();
        $data['perangkatdesa'] = $this->Websid_model->getPerangkatDesa();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/perangkatdesa', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function editkepaladesa()
    {
        $data['kepaladesa'] = $this->Websid_model->getKepalaDesa();

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');

        $upload_image = $_FILES['gambar']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['max_width']      = '960';
            $config['max_height']      = '1280';
            $config['upload_path'] = './assets/img/perangkatdesa/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $old_image = $data['kepaladesa']['gambar'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/perangkatdesa/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                $this->session->set_flashdata('pesansatu', '<div class="alert alert-danger mb-3" role="alert">Data kepala desa gagal diubah!</div>');
                redirect('admin/perangkatdesa');
            }
        }

        $this->db->set('nama', $nama);
        $this->db->where('id', $id);
        $this->db->update('kepaladesa');

        $this->session->set_flashdata('pesansatu', '<div class="alert alert-success mb-3" role="alert">Data kepala desa berhasil diubah!</div>');
        redirect('admin/perangkatdesa');
    }

    public function tambahperangkatdesa()
    {
        $config['upload_path']          = './assets/img/perangkatdesa/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        $config['max_width']            = 1280;
        $config['max_height']           = 960;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('pesandua', '<div class="alert alert-danger mb-3" role="alert">Gagal menambahkan data perangkat desa!</div>');
            redirect('admin/perangkatdesa');
        } else {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];
            $nama = $this->input->post('nama', true);
            $jabatan = $this->input->post('jabatan', true);
            $deskripsi = $this->input->post('deskripsi', true);
            $data = [
                'nama' => $nama,
                'jabatan' => $jabatan,
                'deskripsi' => $deskripsi,
                'gambar' => $gambar
            ];

            $this->db->insert('perangkatdesa', $data);

            $this->session->set_flashdata('pesandua', '<div class="alert alert-success mb-3" role="alert">Data perangkat desa berhasil ditambahkan!</div>');
            redirect('admin/perangkatdesa');
        }
    }

    public function editperangkatdesa()
    {
        $data['perangkatdesa'] = $this->Websid_model->getPerangkatDesa();

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $jabatan = $this->input->post('jabatan');
        $deskripsi = $this->input->post('deskripsi', true);

        $upload_image = $_FILES['gambar']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['max_width']      = '960';
            $config['max_height']      = '1280';
            $config['upload_path'] = './assets/img/perangkatdesa/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $old_image = $data['perangkatdesa']['gambar'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/perangkatdesa/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                $this->session->set_flashdata('pesandua', '<div class="alert alert-danger mb-3" role="alert">Data perangkat desa gagal diubah!</div>');
                redirect('admin/perangkatdesa');
            }
        }

        $this->db->set('nama', $nama);
        $this->db->set('jabatan', $jabatan);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->where('id', $id);
        $this->db->update('perangkatdesa');

        $this->session->set_flashdata('pesandua', '<div class="alert alert-success mb-3" role="alert">Data perangkat desa berhasil diubah!</div>');
        redirect('admin/perangkatdesa');
    }

    public function hapusperangkatdesa($id)
    {
        $this->Websid_model->hapusPerangkatDesa($id);
        $this->session->set_flashdata('pesandua', '<div class="alert alert-success" role="alert">Data perangkat desa berhasil dihapus!</div>');
        redirect('admin/perangkatdesa');
    }

    // Papan Informasi

    public function papaninformasi()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['papaninformasi'] = $this->Websid_model->getPapanInformasi();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/papaninformasi', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function editpapaninformasi()
    {
        $nama = $this->input->post('nama');
        $isi = $this->input->post('isi');

        $this->db->set('isi', $isi);
        $this->db->where('nama', $nama);
        $this->db->update('papaninformasi');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success mb-3" role="alert">Papan informasi berhasil diubah!</div>');
        redirect('admin/papaninformasi');
    }

    // Kontak

    public function kontak()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['kontak'] = $this->Websid_model->getKontak();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/kontak', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function editkontak()
    {
        $nama = $this->input->post('nama');
        $isi = $this->input->post('isi');

        $this->db->set('isi', $isi);
        $this->db->where('nama', $nama);
        $this->db->update('kontak');

        $this->session->set_flashdata('pesansatu', '<div class="alert alert-success mb-3" role="alert">Data kontak berhasil diubah!</div>');
        redirect('admin/kontak');
    }

    // Potensi Desa

    public function potensidesa()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['potensi'] = $this->Websid_model->getPotensi();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/potensidesa', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function tambahpotensidesa()
    {
        $config['upload_path']          = './assets/img/potensi/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 1280;
        $config['max_height']           = 960;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger mb-3" role="alert">Gagal menambahkan data potensi desa baru!</div>');
            redirect('admin/potensidesa');
        } else {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];
            $nama = $this->input->post('nama', true);
            $isi = $this->input->post('isi');
            $data = [
                'nama' => $nama,
                'gambar' => $gambar,
                'isi' => $isi
            ];

            $this->db->insert('potensi', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success mb-3" role="alert">Data potensi desa baru berhasil ditambahkan!</div>');
            redirect('admin/potensidesa');
        }
    }

    public function editpotensidesa()
    {
        $data['potensi'] = $this->Websid_model->getPotensi();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/potensidesa', $data);
        $this->load->view('admin/templates/footer', $data);

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $isi = $this->input->post('isi');

        $this->db->set('nama', $nama);
        $this->db->set('isi', $isi);
        $this->db->where('id', $id);
        $this->db->update('potensi');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success mb-3" role="alert">Data potensi desa berhasil diubah!</div>');
        redirect('admin/potensidesa');
    }

    public function hapuspotensidesa($id)
    {
        $this->Websid_model->hapusPotensi($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data potensi desa berhasil dihapus!</div>');
        redirect('admin/potensidesa');
    }

    // JDIH

    public function jdih()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['perdes'] = $this->Websid_model->getPerdes();
        $data['perkades'] = $this->Websid_model->getPerkades();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/jdih', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function tambahperdes()
    {
        $tahun = $this->input->post('tahun', true);
        $link = $this->input->post('link', true);
        $data = [
            'tahun' => $tahun,
            'link' => $link
        ];

        $this->db->insert('perdes', $data);

        $this->session->set_flashdata('pesansatu', '<div class="alert alert-success mb-3" role="alert">Data Peraturan Desa baru berhasil ditambahkan!</div>');
        redirect('admin/jdih');
    }

    public function editperdes()
    {
        $id = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $link = $this->input->post('link');

        $this->db->set('tahun', $tahun);
        $this->db->set('link', $link);
        $this->db->where('id', $id);
        $this->db->update('perdes');

        $this->session->set_flashdata('pesansatu', '<div class="alert alert-success mb-3" role="alert">Data Peraturan Desa berhasil diubah!</div>');
        redirect('admin/jdih');
    }

    public function hapusperdes($id)
    {
        $this->Websid_model->hapusPerdes($id);
        $this->session->set_flashdata('pesansatu', '<div class="alert alert-success" role="alert">Data Peraturan Desa berhasil dihapus!</div>');
        redirect('admin/jdih');
    }

    public function tambahperkades()
    {
        $tahun = $this->input->post('tahun', true);
        $link = $this->input->post('link', true);
        $data = [
            'tahun' => $tahun,
            'link' => $link
        ];

        $this->db->insert('perkades', $data);

        $this->session->set_flashdata('pesandua', '<div class="alert alert-success mb-3" role="alert">Data Peraturan Kepala Desa baru berhasil ditambahkan!</div>');
        redirect('admin/jdih');
    }

    public function editperkades()
    {
        $id = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $link = $this->input->post('link');

        $this->db->set('tahun', $tahun);
        $this->db->set('link', $link);
        $this->db->where('id', $id);
        $this->db->update('perkades');

        $this->session->set_flashdata('pesandua', '<div class="alert alert-success mb-3" role="alert">Data Peraturan Kepala Desa berhasil diubah!</div>');
        redirect('admin/jdih');
    }

    public function hapusperkades($id)
    {
        $this->Websid_model->hapusPerkades($id);
        $this->session->set_flashdata('pesandua', '<div class="alert alert-success" role="alert">Data Peraturan Kepala Desa berhasil dihapus!</div>');
        redirect('admin/jdih');
    }

    // Galeri

    public function galeri()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['galeri'] = $this->Websid_model->getGaleri();
        $data['filter'] = $this->Websid_model->getFilter();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/galeri', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function tambahgaleri()
    {
        $config['upload_path']          = './assets/img/galeri/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 1280;
        $config['max_height']           = 960;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('pesandua', '<div class="alert alert-danger mb-3" role="alert">Gagal menambahkan data galeri baru!</div>');
            redirect('admin/galeri');
        } else {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];
            $judul = $this->input->post('judul', true);
            $filter = $this->input->post('filter', true);
            $data = [
                'judul' => $judul,
                'gambar' => $gambar,
                'filter' => $filter,
                'tanggal' => time()
            ];

            $this->db->insert('galeri', $data);

            $this->session->set_flashdata('pesandua', '<div class="alert alert-success mb-3" role="alert">Data galeri baru berhasil ditambahkan!</div>');
            redirect('admin/galeri');
        }
    }

    public function editgaleri()
    {
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $filter = $this->input->post('filter');

        $this->db->set('judul', $judul);
        $this->db->set('filter', $filter);
        $this->db->where('id', $id);
        $this->db->update('galeri');

        $this->session->set_flashdata('pesandua', '<div class="alert alert-success mb-3" role="alert">Data galeri berhasil diubah!</div>');
        redirect('admin/galeri');
    }

    public function hapusgaleri($id)
    {
        $this->Websid_model->hapusGaleri($id);
        $this->session->set_flashdata('pesandua', '<div class="alert alert-success" role="alert">Data galeri berhasil dihapus!</div>');
        redirect('admin/galeri');
    }

    public function tambahfilter()
    {
        $nama = $this->input->post('nama', true);
        $filter = $this->input->post('filter', true);
        $data = [
            'nama' => $nama,
            'filter' => $filter
        ];

        $this->db->insert('filter', $data);

        $this->session->set_flashdata('pesansatu', '<div class="alert alert-success mb-3" role="alert">Data filter galeri baru berhasil ditambahkan!</div>');
        redirect('admin/galeri');
    }

    public function editfilter()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $filter = $this->input->post('filter');

        $this->db->set('nama', $nama);
        $this->db->set('filter', $filter);
        $this->db->where('id', $id);
        $this->db->update('filter');

        $this->session->set_flashdata('pesansatu', '<div class="alert alert-success mb-3" role="alert">Data filter galeri berhasil diubah!</div>');
        redirect('admin/galeri');
    }

    public function hapusfilter($id)
    {
        $this->Websid_model->hapusFilter($id);
        $this->session->set_flashdata('pesansatu', '<div class="alert alert-success" role="alert">Data filter galeri berhasil dihapus!</div>');
        redirect('admin/galeri');
    }

    // Artikel dan Berita

    public function artikeldanberita()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['artikeldanberita'] = $this->Websid_model->getArtikeldanberita();
        $data['kategori'] = $this->Websid_model->getKategori();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/artikeldanberita', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function tambahartikeldanberita()
    {
        $config['upload_path']          = './assets/img/artikeldanberita/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 1280;
        $config['max_height']           = 960;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger mb-3" role="alert">Gagal menambahkan data artikel dan berita baru!</div>');
            redirect('admin/artikeldanberita');
        } else {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];
            $judul = $this->input->post('judul', true);
            $id_kategori = $this->input->post('id_kategori');
            $isi = $this->input->post('isi');
            $data = [
                'judul' => $judul,
                'id_kategori' => $id_kategori,
                'gambar' => $gambar,
                'isi' => $isi,
                'tanggal' => time()
            ];

            $this->db->insert('artikeldanberita', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success mb-3" role="alert">Data artikel dan berita baru berhasil ditambahkan!</div>');
            redirect('admin/artikeldanberita');
        }
    }

    public function editartikeldanberita()
    {
        $data['artikeldanberita'] = $this->Websid_model->getArtikeldanberita();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/artikeldanberita', $data);
        $this->load->view('admin/templates/footer', $data);

        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $id_kategori = $this->input->post('id_kategori');
        $isi = $this->input->post('isi');

        $this->db->set('judul', $judul);
        $this->db->set('id_kategori', $id_kategori);
        $this->db->set('isi', $isi);
        $this->db->where('id', $id);
        $this->db->update('artikeldanberita');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success mb-3" role="alert">Data artikel dan berita berhasil diubah!</div>');
        redirect('admin/artikeldanberita');
    }

    public function hapusartikeldanberita($id)
    {

        $this->Websid_model->hapusArtikeldanberita($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data artikel dan berita berhasil dihapus!</div>');
        redirect('admin/artikeldanberita');
    }

    public function tambahkategori()
    {
        $kategori = $this->input->post('kategori', true);
        $data = [
            'kategori' => $kategori
        ];

        $this->db->insert('kategori', $data);

        $this->session->set_flashdata('pesansatu', '<div class="alert alert-success mb-3" role="alert">Data kategori baru berhasil ditambahkan!</div>');
        redirect('admin/artikeldanberita');
    }

    public function editkategori()
    {
        $id = $this->input->post('id');
        $kategori = $this->input->post('kategori');

        $this->db->set('kategori', $kategori);
        $this->db->where('id', $id);
        $this->db->update('kategori');

        $this->session->set_flashdata('pesansatu', '<div class="alert alert-success mb-3" role="alert">Data kategori berhasil diubah!</div>');
        redirect('admin/artikeldanberita');
    }

    public function hapuskategori($id)
    {
        $this->Websid_model->hapusKategori($id);
        $this->session->set_flashdata('pesansatu', '<div class="alert alert-success" role="alert">Data kategori berhasil dihapus!</div>');
        redirect('admin/artikeldanberita');
    }

    // BUMDes

    public function bumdes()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['pengurus'] = $this->Websid_model->getPengurus();
        $data['bumdes'] = $this->Websid_model->getBumdes();
        $data['unitusaha'] = $this->Websid_model->getUnitusaha();

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/bumdes', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function tambahpengurus()
    {
        $config['upload_path']          = './assets/img/bumdes/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        $config['max_width']            = 1280;
        $config['max_height']           = 960;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('pesansatu', '<div class="alert alert-danger mb-3" role="alert">Gagal menambahkan data pengurus BUMDes!</div>');
            redirect('admin/bumdes');
        } else {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];
            $nama = $this->input->post('nama', true);
            $jabatan = $this->input->post('jabatan', true);
            $data = [
                'nama' => $nama,
                'jabatan' => $jabatan,
                'gambar' => $gambar
            ];

            $this->db->insert('pengurus', $data);

            $this->session->set_flashdata('pesansatu', '<div class="alert alert-success mb-3" role="alert">Data pengurus BUMDes berhasil ditambahkan!</div>');
            redirect('admin/bumdes');
        }
    }

    public function editpengurus()
    {
        $data['pengurus'] = $this->Websid_model->getPengurus();

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $jabatan = $this->input->post('jabatan');

        $upload_image = $_FILES['gambar']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['max_width']      = '960';
            $config['max_height']      = '1280';
            $config['upload_path'] = './assets/img/bumdes/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $old_image = $data['bumdes']['gambar'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/bumdes/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                $this->session->set_flashdata('pesansatu', '<div class="alert alert-danger mb-3" role="alert">Data pengurus BUMDes diubah!</div>');
                redirect('admin/bumdes');
            }
        }

        $this->db->set('nama', $nama);
        $this->db->set('jabatan', $jabatan);
        $this->db->where('id', $id);
        $this->db->update('pengurus');

        $this->session->set_flashdata('pesansatu', '<div class="alert alert-success mb-3" role="alert">Data pengurus BUMDes berhasil diubah!</div>');
        redirect('admin/bumdes');
    }

    public function hapuspengurus($id)
    {
        $this->Websid_model->hapusPengurus($id);
        $this->session->set_flashdata('pesansatu', '<div class="alert alert-success" role="alert">Data pengurus BUMDes berhasil dihapus!</div>');
        redirect('admin/bumdes');
    }

    public function editdatabumdes()
    {
        $nama = $this->input->post('nama');
        $isi = $this->input->post('isi');

        $this->db->set('isi', $isi);
        $this->db->where('nama', $nama);
        $this->db->update('bumdes');

        $this->session->set_flashdata('pesandua', '<div class="alert alert-success mb-3" role="alert">Data BUMDes berhasil diubah!</div>');
        redirect('admin/bumdes');
    }

    public function tambahunitusaha()
    {
        $nama = $this->input->post('nama', true);
        $isi = $this->input->post('isi');
        $data = [
            'nama' => $nama,
            'isi' => $isi
        ];

        $this->db->insert('unitusaha', $data);

        $this->session->set_flashdata('pesantiga', '<div class="alert alert-success mb-3" role="alert">Data unit usaha BUMDes baru berhasil ditambahkan!</div>');
        redirect('admin/bumdes');
    }

    public function editunitusaha()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama', true);
        $isi = $this->input->post('isi');

        $this->db->set('nama', $nama);
        $this->db->set('isi', $isi);
        $this->db->where('id', $id);
        $this->db->update('unitusaha');

        $this->session->set_flashdata('pesantiga', '<div class="alert alert-success mb-3" role="alert">Data unit usaha BUMDes berhasil diubah!</div>');
        redirect('admin/bumdes');
    }

    public function hapusunitusaha($id)
    {
        $this->Websid_model->hapusunitusaha($id);
        $this->session->set_flashdata('pesantiga', '<div class="alert alert-success" role="alert">Data unit usaha BUMDes berhasil dihapus!</div>');
        redirect('admin/bumdes');
    }

    // Pengaturan

    public function pengaturan()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('name', 'Nama', 'trim|required', ['required' => 'Nama desa tidak boleh kosong!']);
        $this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Email tidak boleh kosong!']);

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/pengaturan', $data);
            $this->load->view('admin/templates/footer', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $username = $this->input->post('username');

            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['max_width']      = '1280';
                $config['max_height']      = '960';
                $config['upload_path'] = './assets/img/admin/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['admin']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/admin/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger mb-3" role="alert">Pengaturan gagal diubah!</div>');
                    redirect('admin/perangkatdesa');
                }
            }

            $this->db->set('name', $name);
            $this->db->set('email', $email);
            $this->db->where('username', $username);
            $this->db->update('admin');

            $this->session->set_flashdata('pesansatu', '<div class="alert alert-success mb-3" role="alert">Pengaturan berhasil diubah!</div>');
            redirect('admin/pengaturan');
        }
    }

    // Ganti Kata Sandi

    public function katasandi()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Kata Sandi Lama', 'required|trim', ['required' => 'Isi kata sandi lama!']);
        $this->form_validation->set_rules('new_password', 'Kata Sandi Baru', 'required|trim|min_length[8]', ['required' => 'Isi kata sandi baru!', 'min_length' => 'Kata sandi baru terlalu pendek!']);

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/pengaturan', $data);
            $this->load->view('admin/templates/footer', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            if (!password_verify($current_password, $data['admin']['password'])) {
                $this->session->set_flashdata('pesandua', '<div class="alert alert-danger" role="alert">Kata sandi lama salah!</div>');
                redirect('admin/pengaturan');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('pesandua', '<div class="alert alert-danger" role="alert">Kata sandi baru tidak boleh sama dengan kata sandi lama!</div>');
                    redirect('admin/pengaturan');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('admin');

                    $this->session->set_flashdata('pesandua', '<div class="alert alert-success" role="alert">Kata sandi berhasil diubah!</div>');
                    redirect('admin/pengaturan');
                }
            }
        }
    }
}
