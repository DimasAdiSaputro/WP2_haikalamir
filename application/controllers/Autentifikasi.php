<?php 

class Autentifikasi extends CI_Controller{

    public function index()
    {
        $this->form_validation->set_rules('email','Alamat_Email','required|trim|valid_email',[
            'required' => "Email Harus Diisi",
            'Valid_email' => "Email tidak benar!"
        ]);

        $this->form_validation->set_rules('password','password','required|trim',[
            'required' => "password Harus Diisi",
        ]);

        if($this->form_validation->run() == false)
        {
            $data['judul'] = 'Login';
            $data['user'] = '';
            $this->load->view('templates/auto_header', $data);
            $this->load->view('autentifikasi/login');
            $this->load->view('templates/auto_footer');
        }
        else
        {
            $this->_login();
        }
    }

        private function _login()
        {
            $email = htmlspecialchars($this->input->post('email', true));
            $password = $this->input->post('password', true);

            $user = $this->ModelUser->cekData(['email' => $email])->row_array();

            // jika usernya ada
            if($user)
            {

                // jika user sudah aktif
                if($user['is_active'] == 1)
                {
                    // cek password
                    $md5pass = md5($password);
                    if($md5pass == $user['password'])
                    {
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);

                        if($user['role_id'] == 1)
                        {
                            redirect('admin');
                        }
                        else
                        {
                            if($user['image'] == 'default.jpg')
                            {
                                $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Silahkan Ubah Profile Anda untuk Ubah Photo Profil</div>');
                                }
                                redirect('user');
                        }
                    }
                    else
                    {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
                        redirect('Autentifikasi');
                    }
                }
                else 
                {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User tidak aktif!!</div>');
                    redirect('Autentifikasi');
                }
            }
            else 
            {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!!</div>');
                redirect('Autentifikasi');
            }
        }

}
