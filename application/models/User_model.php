<?php
class User_model extends CI_Model {

    public function register()
    {
        $enc_pass = password_hash($this->input->post('pass1'), PASSWORD_DEFAULT);
        $email = $this->input->post('email');
        $nama = $this->input->post('nama');
        $uuid = uniqid('pustaka_') . microtime(true);
        $data = [
            'uid' => $uuid,
            'image' => 'default.jpg',
            'email' => $email,
            'nama' => $nama,
            'password' => $enc_pass,
            'role_id' => 2
        ];
        
        $query = $this->db->query('SELECT * from user WHERE email="' . $email . '";');
        $long_data = count($query->result());
        
        if($long_data < 1) {
            $this->db->insert('user', $data);
            $this->session->set_flashdata('msg_success', 'Akun berhasil dibuat!');
            redirect(base_url() . 'auth');
        } else {
            $this->session->set_flashdata('msg_error', 'Akun sudah pernah dibuat!');
            redirect(base_url() . 'auth');
        }
    }
    
    public function login()
    {
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');
        $query = $this->db->query('SELECT * from user WHERE email="' . $email . '";');
        $result = $query->result();

        if(count($result) < 1) {
            $this->session->set_flashdata('msg_error', 'User tidak ditemukan!');
            redirect(base_url() . 'auth');
        }

        $is_correct = password_verify($pass, $result[0]->password);
        if($is_correct) {
            $userdata = [
                'nama' => $result[0]->nama,
                'email' => $result[0]->email,
                'uid' => $result[0]->uid,
                'role' => $result[0]->role_id,
                'img' => $result[0]->image
            ];
            $this->session->set_userdata($userdata);
            $this->session->set_flashdata('msg_success', 'Selamat datang ' . $result[0]->nama . '!');
            redirect(base_url() . 'user');
        } else {
            $this->session->set_flashdata('msg_error', 'Password salah!');
            redirect(base_url() . 'auth');
        }
    }

}