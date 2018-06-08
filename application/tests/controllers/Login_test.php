<?php
class Login_test extends TestCase 
{
	public function test_Login_title() {
		$output = $this->request('GET', 'login');
		$this->assertContains('<title>Login Page</title>', $output);
	}

	public function test_Login_label_username_exist() {
		$output = $this->request('GET', 'login');
		$this->assertContains('<label for="username">Username</label>', $output);	
	}

	public function test_Login_form_username_exist() {
		$output = $this->request('GET', 'login');
		$this->assertContains('type="input" name="username"', $output);	
	}

	public function test_Login_label_password_exist() {
		$output = $this->request('GET', 'login');
		$this->assertContains('<label for="password">Password</label>', $output);	
	}	

	public function test_Login_form_password_exist() {
		$output = $this->request('GET', 'login');
		$this->assertContains('type="password" name="password"', $output);	
	}

	public function test_Login_form_submit_exist() {
		$output = $this->request('GET', 'login');
		$this->assertContains('<input type="submit" name="submit" value="Login" />', $output);	
	}

	public function test_Login_form_validation() {
		$output = $this->request('POST', 'login/submit', ['username' => '', 'password' => '']);
		$this->assertContains('The Username field is required.', $output);
		$this->assertContains('The Password field is required.', $output);
	}

	public function test_Login_form_validation_username() {
		$output = $this->request('POST', 'login/submit', ['username' => '', 'password' => 'asdasda']);
		$this->assertContains('The Username field is required.', $output);
	}

	public function test_Login_form_validation_password() {
		$output = $this->request('POST', 'login/submit', ['username' => 'asssss', 'password' => '']);
		$this->assertContains('The Password field is required.', $output);
	}

	public function test_Login_failed () {
		$output = $this->request('POST', 'login/submit', ['username' => 'asssss', 'password' => 'dasdad']);
		$this->assertContains('Invalid login', $output);
	}

	public function test_Login_success () {
    	$_SESSION['uname'] = 'reporter';
		$output = $this->request('GET', 'login/adminpage');
		$this->assertContains('Welcome reporter', $output);
	}

	public function test_Logout_link_exist () {
		$_SESSION['uname'] = 'reporter';
		$output= $this->request('GET', 'login/adminpage');
		$this->assertContains('<a href="../login/logout">Log Out</a>', $output);
	}

	public function test_Logout_process () {
		$_SESSION['uname'] = 'reporter';
		$output= $this->request('GET', 'login/logout');
		$this->assertContains('You have been logout',$output);
	}

	public function test_Direct_without_login () {
		$output = $this->request('GET', 'login/adminpage');
		$this->assertContains('Invalid login', $output);
	}

	public function test_Create_news_link () {
		$_SESSION['uname'] = 'reporter';
		$output = $this->request('GET', 'login/adminpage');
		$this->assertContains('<a href="../news/create">Create News</a>', $output);
	}

}
?>