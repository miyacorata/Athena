<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Idol
 * @property Idol_model $idol_model
 * @property Unit_model $unit_model
 */
class Info extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function hello()
	{
	    $this->load->model('idol_model');
	    $this->load->model('unit_model');
	    $data['birthday'] = $this->idol_model->get_birthday_idol();
	    $data['units'] = $this->unit_model->get_all_unit();
	    $meta['load_css'] = array('top','idollist');
	    $this->load->view('template/header',$meta);
		$this->load->view('welcome_message',$data);
		$this->load->view('template/footer');
	}

	public function about(){
	    $meta['title'] = "このサイトについて";
	    $this->load->view('template/header',$meta);
	    $this->load->view('about');
	    $this->load->view('template/footer');
    }

    public function privacy(){
	    $meta['title'] = "プライバシーポリシー";
	    $this->load->view('template/header',$meta);
	    $this->load->view('privacy');
	    $this->load->view('template/footer');
    }
}
