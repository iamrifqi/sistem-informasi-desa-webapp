<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Forgot_model');
        $this->load->library('form_validation');
    }

    // Masuk Admin

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('admin');
        }

        $this->form_validation->set_rules('username', 'Nama Pengguna', 'trim|required', ['required' => 'Masukkan nama pengguna!']);
        $this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required', ['required' => 'Masukkan kata sandi!']);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header');
            $this->load->view('auth/index');
            $this->load->view('auth/templates/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['username' => $username])->row_array();

        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                $data = ['username' => $admin['username']];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil masuk ke halaman Admin!</div>');
                redirect('admin');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Kata Sandi yang anda masukkan salah!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Nama Pengguna/Kata Sandi yang anda masukkan salah!</div>');
            redirect('auth');
        }
    }

    // Keluar Admin

    public function logout()
    {
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil keluar dari halaman Admin!</div>');
        redirect('auth');
    }

    // Lupa Password

    public function lupapassword()
    {
        if ($this->session->userdata('username')) {
            redirect('admin');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Masukkan email admin!']);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/templates/header');
            $this->load->view('auth/lupapassword');
            $this->load->view('auth/templates/footer');
        } else {
            $email = $this->input->post('email');
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->Forgot_model->getUserInfoByEmail($clean);

            if (!$userInfo) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email yang anda masukkan salah!</div>');
                redirect('auth/lupapassword');
            }

            $this->sendEmail($email);
            redirect('auth/lupapassword');
        }
    }

    private function sendEmail($email)
    {
        $this->load->library('PHPMailer_load');
        $mail = $this->phpmailer_load->load();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'iamnotlipky@gmail.com';
        $mail->Password = 'msommnkiaklvrioz';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('iamnotlipky@gmail.com', 'Website Desa Sutapranan');
        $mail->addAddress($email, 'Iam Not Lipky');
        $mail->Subject = "Reset Kata Sandi";

        $clean = $this->security->xss_clean($email);
        $userInfo = $this->Forgot_model->getUserInfoByEmail($clean);
        $token = $this->Forgot_model->insertToken($userInfo->id);
        $qstring = $this->base64url_encode($token);
        $url = base_url('auth/resetpassword/') . $qstring;
        $link = '<a href="' . $url . '">' . $url . '</a>';

        $mail->msgHtml("Klik link berikut untuk melakukan reset kata sandi : " . $link);

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Permintaan reset kata sandi berhasil terkirim, silahkan cek email anda!</div>');
            redirect('auth');
        }
    }

    public function resetpassword()
    {
        if ($this->session->userdata('username')) {
            redirect('admin');
        }

        $token = $this->base64url_decode($this->uri->segment(3));
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->Forgot_model->isTokenValid($cleanToken);

        if (!$user_info) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Token telah kadaluarsa!</div>');
            redirect('auth');
        }

        $data = array(
            'name' => $user_info->name,
            'email' => $user_info->email,
            'token' => $this->base64url_encode($token)
        );

        $this->form_validation->set_rules('password', 'Masukkan Kata Sandi Baru', 'required|min_length[8]', ['required' => 'Isi kata sandi baru!', 'min_length' => 'Kata sandi baru terlalu pendek!']);
        $this->form_validation->set_rules('password2', 'Masukkkan Ulang Kata Sandi Baru', 'required|matches[password]', ['required' => 'Isi kata sandi baru!', 'matches' => 'Kata sandi baru tidak sama!']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/templates/header');
            $this->load->view('auth/resetpassword', $data);
            $this->load->view('auth/templates/footer');
        } else {
            $post = $this->input->post(NULL, TRUE);
            $password = $this->input->post('password');
            $cleanPost = $this->security->xss_clean($post);
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $cleanPost['password'] = $password_hash;
            $cleanPost['id'] = $user_info->id;
            unset($cleanPost['password2']);
            if (!$this->Forgot_model->updatePassword($cleanPost)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Ubah kata sandi gagal!</div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Kata sandi telah diubah, silahkan masuk!</div>');
            }
            redirect('auth');
        }
    }

    public function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}
