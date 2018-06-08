<?php

class News_model_test extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('news_model');
        $this->obj = $this->CI->news_model;
    }

    public function test_get_news_list()
    {
        $a=0;    
        $expected_title = 'bla bla bla';
        $expected_slug = 'bla-bla-bla';

        $list = $this->obj->get_news();

        foreach ($list as $news) 
        {
            if ($a == 0) 
            {    
               $this->assertEquals($expected_title, $news['title']);
               $this->assertEquals($expected_slug, $news['slug']);
            }    
            $a++;
        }
           
    }
}
?>
