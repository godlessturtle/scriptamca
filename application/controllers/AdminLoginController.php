<?php 

class AdminLoginController extends CI_Controller{
    static $data = array();

    public function index(){
        $this->load->helper('captcha');
        $vals = array(
            'img_path' => './captcha/',
            'img_url' => base_url() . 'captcha/',
            'img_width' => '120',
            'img_height' => 40,
            'expiration' => 7200,
            'word_length' => 6,
            'font_size' => 18,
            'img_id' => 'scriptamca-captcha',
            'pool' => 'abcdefghijklmnopqrstuvwxyz',
            'colors' => array(
                'background' => array(0, 0, 0),
                'border' => array(255, 255, 255),
                'text' => array(255, 255, 255),
                'grid' => array(255, 40, 40)
            )
        );
        $cap = create_captcha($vals);
        $data['captcha'] = $cap;
        $this->session->set_userdata('captchaWord', array($cap['filename'], $cap['word']));
        $this->load->view('admin/login', $data);
    }

    public function login(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Kullanıcı Adı', 'trim|required|max_length[32]|min_length[6]|alpha_numeric');
        $this->form_validation->set_rules('password', 'Şifre', 'trim|required|max_length[200]|min_length[6]');
        $this->form_validation->set_rules('cap_code', 'Captcha', 'trim|required|max_length[6]|min_length[6]|alpha');

        $this->form_validation->set_message(array(
            'required'      => 'swal("Hata!", "{field} Alanının doldurulması zorunludur.", "error");',
            'max_length'    => 'swal("Hata!", "{field} Alanı maksimum uzunluk değerini aşıyor.", "error");',
            'min_length'    => 'swal("Hata!", "{field} Alanı minimum uzunluk değerini karşılamıyor.", "error");',
            'alpha_numeric' => 'swal("Hata!", "{field} Alanı geçersiz karakterler içeriyor.", "error");',
            'alpha'         => 'swal("Hata!", "{field} Alanı geçersiz karakterler içeriyor.", "error");'
        ));

        if($this->form_validation->run()){
            $this->load->model('AdminLoginModel');
            $username = strip_tags($this->input->post('username'));
            $password = md5(sha1($this->input->post('password')));

            $captcha = $this->session->userdata('captchaWord')[1];
            $captcha_input = strip_tags($this->input->post('cap_code'));
            if($this->AdminLoginModel->getAdmin($username, $password)->num_rows() == 1){
                if($captcha == $captcha_input){
                    $this->session->set_userdata('admin', $this->AdminLoginModel->getAdmin($username, $password)->result());
                    redirect(base_url('panel/main'));
                }else{
                    //captcha hatalı
                    $this->session->set_flashdata('notification', 'swal("Hata!", "Captcha kodu hatalı.", "error");');
                    redirect(base_url('panel/login'));
                }
            }else{
                //giriş bilgileri hatalı
                $this->session->set_flashdata('notification', 'swal("Hata!", "Geçersiz giriş bilgileri.", "error");');
                redirect(base_url('panel/login'));
            }
        }else{
            //validation
            $this->load->view('admin/login');
        }
    }

    public function logout(){
        if($this->session->userdata('admin')){
            $this->session->unset_userdata('admin');
            redirect(base_url('panel/login'));
        }else{
            redirect(base_url());
        }
    }

}






























?>