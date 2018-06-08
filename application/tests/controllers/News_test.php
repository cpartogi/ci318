<?php
class News_test extends TestCase
{
	public function test_news_archive_title()
	{
		$output = $this->request('GET', 'news');
		$this->assertContains('<title>News archive</title>', $output);
	}

	public function test_news_view_title()
	{
		$output = $this->request('GET', 'news/bla-bla-bla');
		$this->assertContains('<title>bla bla bla</title>', $output);
	}	

	public function test_news_create_title()
	{
		$_SESSION['uname'] = 'reporter';
		$output = $this->request('GET', 'news/create');
		$this->assertContains('<title>Create a news item</title>', $output);
	}

	public function test_news_create_form_title_exist() {
		$_SESSION['uname'] = 'reporter';
		$output = $this->request('GET', 'news/create');
		$this->assertContains('<input type="input" name="title"/>', $output);
	}

	public function test_news_create_form_text_exist() {
		$_SESSION['uname'] = 'reporter';
		$output = $this->request('GET', 'news/create');
		$this->assertContains('<textarea name="text">', $output);
	}

	public function test_news_create_form_date_exist() {
		$_SESSION['uname'] = 'reporter';
		$output = $this->request('GET', 'news/create');
		$this->assertContains('type="input" name="date"', $output);
	}

	public function test_news_create_form_validation() {
		$_SESSION['uname'] = 'reporter';
		$output = $this->request('POST', 'news/create', ['title' => '', 'text' => '', 'date' => '']);
		$this->assertContains('The Title field is required.', $output);
		$this->assertContains('The Text field is required.', $output);
		$this->assertContains('The Date field is required.', $output);
	}	

	public function test_news_create_form_validation_title() {
		$_SESSION['uname'] = 'reporter';
		$output = $this->request('POST', 'news/create', ['title' => '', 'text' => 'text title']);
		$this->assertContains('The Title field is required.', $output);
	}

	public function test_news_create_form_validation_text() {
		$_SESSION['uname'] = 'reporter';
		$output = $this->request('POST', 'news/create', ['title' => 'title test', 'text' => '']);
		$this->assertContains('The Text field is required.', $output);
	}

	public function test_news_create_form_validation_date() {
		$_SESSION['uname'] = 'reporter';
		$output = $this->request('POST', 'news/create', ['title' => 'title test', 'text' => '', 'date' => '']);
		$this->assertContains('The Date field is required.', $output);
	}

	public function test_news_create_post() 
	{
		$_SESSION['uname'] = 'reporter';
		$output = $this->request('POST', 'news/create', ['title' => 'title test', 'text' => 'text title', 'date' => date("Y-m-d H:i:s")]);
		$this->assertContains('success add news', $output);
	}

}
