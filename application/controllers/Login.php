<?php
class Login extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('login_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() 
    {
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$data['title'] = "Login Page";
		$data['loginstatus'] = "";
		$this->load->view('templates/header', $data);
        $this->load->view('login/index', $data);
        $this->load->view('templates/footer');   	
    }

    public function submit()
    {
    	$data['title'] = "Login Page";
    	$data['loginstatus'] = "";

    	$this->form_validation->set_rules('username', 'Username', 'required');
    	$this->form_validation->set_rules('password', 'Password', 'required');

    	if ($this->form_validation->run() === FALSE)
    	{
        	$this->load->view('templates/header', $data);
        	$this->load->view('login/index');
        	$this->load->view('templates/footer');
    	}
    	else
    	{
			// cek ke database
			$username = $this->input->post('username');
			$password = hash("sha256",$this->input->post('password'));
    		$data['loginstatus'] = $this->login_model->ceklogin($username, $password);
    		$usercek = $data['loginstatus']['username'];

    		// cek jika data ada
    		if (!$usercek) {
    			$data['loginstatus'] = "Invalid login";
    			$this->load->view('templates/header', $data);
        		$this->load->view('login/index');
        		$this->load->view('templates/footer');
    		} else {
    			$data['loginstatus'] = "Success login";
    			// kasih session
    			$this->load->library('session');
    			$this->session->set_userdata('uname', $username);
    			redirect('login/adminpage', $this->session->userdata('uname'));		
        	}
    	}
    }

    public function adminpage()
    {	
    	$this->load->library('session');
    	$data['title'] = "Admin Page";
        if (!$this->session->userdata('uname')) {
            $data['loginstatus'] = "Invalid login";
            $this->load->view('templates/header', $data);
            $this->load->view('login/index');
            $this->load->view('templates/footer');
        } else {
    	    $data['loginstatus'] = "Welcome ".$this->session->userdata('uname');
            $this->load->view('templates/header', $data);
            $this->load->view('login/page', $data);
            $this->load->view('templates/footer'); 
        }
    }

    public function logout() 
    {
        $this->load->library('session');
        $this->session->unset_userdata('uname');
        $data['title'] = "Admin Page";
        $data['loginstatus'] = "You have been logout";
        $this->load->view('templates/header', $data);
        $this->load->view('login/index');
        $this->load->view('templates/footer');
    }

}
?>