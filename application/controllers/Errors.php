<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Errors extends MY_Controller {
	function __construct()
	{       
		parent::__construct();    
	}
	public function notfound(){
		// $this->_header();
		$this->output->set_status_header('404'); 
        $data['content'] = 'error_404'; // View name 
        $this->load->view('404',$data);
        // $this->_footer();
    }
}
?>