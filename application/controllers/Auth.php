<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends MY_Controller {
    function __construct()
    {       
        parent::__construct();
        $this->load->model('user_model'); 
    }
    function login(){
        $this->_header();
        $this->load->view('login', array('returnURL'=>$this->input->get('returnURL')));
        $this->_footer();
    }
    function logout(){
        $this->session->sess_destroy();
        redirect('/');
    }
    function register(){
        $this->_header();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', '이메일 주소', 'required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('nickname', '닉네임', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('password', '비밀번호', 'required|min_length[6]|max_length[30]|matches[re_password]');
        $this->form_validation->set_rules('re_password', '비밀번호 확인', 'required');
        if($this->form_validation->run() === false){
            $this->load->view('register');    
        } else {
            // PHP 5.5 이하 버전에서만
            if(!function_exists('password_hash')){
                $this->load->helper('password');
            }
            $hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

            $this->user_model->add(array(
                'email'=>$this->input->post('email'),
                'password'=>$hash,
                'nickname'=>$this->input->post('nickname')
                ));

            $this->session->set_flashdata('message', '회원가입에 성공했습니다.');
            redirect('/');
        }
        $this->_footer();
    }
    function authentication(){
        $user = $this->user_model->getByEmail(array('email'=>$this->input->post('email')));
        if($this->input->post('email') == $user->email && password_verify($this->input->post('password'), $user->password)) {
            $this->session->set_userdata('is_login', true);
            $returnURL = $this->input->get('returnURL');
            if($returnURL===false){
                $returnURL = '/';
            }
            redirect($returnURL);
        } else {
            $this->session->set_flashdata('message', '로그인에 실패 했습니다.');
            $returnURL = $this->input->get('returnURL');
            if($returnURL===false){
                redirect('/auth/login');
            }
            redirect('/auth/login?returnURL='.rawurlencode($returnURL));
        }
    }
}
?>