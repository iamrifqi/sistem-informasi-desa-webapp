<?php

class Websid_model extends CI_Model
{
    // Dashboard

    public function getPesan()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('pesan')->result_array();
    }

    public function hapusPesan($id)
    {
        $this->db->where(
            'id',
            $id
        );
        $this->db->delete('pesan');
    }

    // Perangkat Desa

    public function getKepalaDesa()
    {
        return $this->db->get('kepaladesa')->result_array();
    }

    public function getPerangkatDesa()
    {
        return $this->db->get('perangkatdesa')->result_array();
    }

    public function hapusPerangkatDesa($id)
    {
        $gambar = $this->db->get_where('perangkatdesa', ['id' => $id])->row();
        if ($gambar->gambar != 'default.jpg') {
            unlink('assets/img/perangkatdesa/' . $gambar->gambar);
        }
        $this->db->where('id', $id);
        $this->db->delete('perangkatdesa');
    }

    // Papan Informasi

    public function getPapanInformasi()
    {
        return $this->db->get('papaninformasi')->result_array();
    }

    // Kontak

    public function getKontak()
    {
        return $this->db->get('kontak')->result_array();
    }

    // Potensi Desa

    public function getPotensi()
    {
        return $this->db->get('potensi')->result_array();
    }

    public function hapusPotensi($id)
    {
        $gambar = $this->db->get_where('potensi', ['id' => $id])->row();
        if ($gambar->gambar != 'default.jpg') {
            unlink('assets/img/potensi/' . $gambar->gambar);
        }
        $this->db->where('id', $id);
        $this->db->delete('potensi');
    }

    // JDIH

    public function getPerdes()
    {
        return $this->db->get('perdes')->result_array();
    }

    public function hapusPerdes($id)
    {
        $this->db->where(
            'id',
            $id
        );
        $this->db->delete('perdes');
    }

    public function getPerkades()
    {
        return $this->db->get('perkades')->result_array();
    }

    public function hapusPerkades($id)
    {
        $this->db->where(
            'id',
            $id
        );
        $this->db->delete('perkades');
    }

    // Galeri

    public function getGaleri()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('galeri')->result_array();
    }

    public function hapusGaleri($id)
    {
        $gambar = $this->db->get_where('galeri', ['id' => $id])->row();
        if ($gambar->gambar != 'default.jpg') {
            unlink('assets/img/galeri/' . $gambar->gambar);
        }
        $this->db->where(
            'id',
            $id
        );
        $this->db->delete('galeri');
    }

    public function getFilter()
    {
        return $this->db->get('filter')->result_array();
    }

    public function hapusFilter($id)
    {
        $this->db->where(
            'id',
            $id
        );
        $this->db->delete('filter');
    }

    // Artikel dan Berita

    public function getArtikeldanberita()
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('artikeldanberita')->result_array();
    }

    public function getArtikeldanberitaById($id)
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('artikeldanberita', ['id' => $id])->row_array();
    }

    public function hapusArtikeldanberita($id)
    {
        $gambar = $this->db->get_where('artikeldanberita', ['id' => $id])->row();
        if ($gambar->gambar != 'default.jpg') {
            unlink('assets/img/artikeldanberita/' . $gambar->gambar);
        }
        $this->db->where(
            'id',
            $id
        );
        $this->db->delete('artikeldanberita');
    }

    public function getAdb($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('isi', $keyword);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get('artikeldanberita', $limit, $start)->result_array();
    }

    public function countAdb()
    {
        return $this->db->get('artikeldanberita')->num_rows();
    }

    public function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function hapusKategori($id)
    {
        $this->db->where(
            'id',
            $id
        );
        $this->db->delete('kategori');
    }

    public function getKategoriByName($nama_kategori)
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get_where('kategori', ['kategori' => $nama_kategori])->row_array();
    }

    public function getAdbByKategori($id_kategori)
    {
        return $this->db->get_where('artikeldanberita', ['id_kategori' => $id_kategori])->result_array();
    }

    // BUMDes

    public function getPengurus()
    {
        return $this->db->get('pengurus')->result_array();
    }

    public function hapusPengurus($id)
    {
        $gambar = $this->db->get_where('pengurus', ['id' => $id])->row();
        if ($gambar->gambar != 'default.jpg') {
            unlink('assets/img/bumdes/' . $gambar->gambar);
        }
        $this->db->where('id', $id);
        $this->db->delete('pengurus');
    }

    public function getUnitusaha()
    {
        return $this->db->get('unitusaha')->result_array();
    }

    public function hapusUnitusaha($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('unitusaha');
    }

    public function getBumdes()
    {
        return $this->db->get('bumdes')->result_array();
    }
}
