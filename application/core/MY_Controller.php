<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	function __construct(){
		parent::__construct();
		// date_default_timezone_set('GMT');
		// date_default_timezone_set('Asia/Seoul');

		// 페이지 전체 캐쉬
		// if($peak = $this->config->item('peak_page_cache')){
		// 	if($peak == current_url()){
		// 		$this->output->cache(5);
		// 	}
		// }

		$this->load->database();  // 이미 config.php 에서 $config['sess_driver'] = 'database'; 로 db로드 완료
		
		if(!$this->input->is_cli_request()){
			$this->load->library('session');
		}

		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
	}
	function _header(){
		// var_dump($this->session->userdata('session_test'));
		// $this->session->set_userdata('session_test', 'gold9ine');
		// var_dump($this->session->all_userdata());
		$this->load->config('nowDev');
		$this->load->view('head');
	}
	function _sidebar(){
		// 페이지 부분 캐쉬
		if ( ! $topics = $this->cache->get('topics')){
			$topics = $this->topic_model->gets();
			$this->cache->save('topics', $topics, 300);
		}
		$this->load->view('topic_list', array('topics'=>$topics));
	}
	function _footer(){
		$this->load->view('foot');
	}
	function _require_login($return_url){
        // 로그인이 되어 있지 않다면 로그인 페이지로 리다이렉션
        if(!$this->session->userdata('is_login')){
            // $this->load->helper('url');
            redirect('/auth/login?returnURL='.rawurlencode($return_url));
        }
    }
}
?>