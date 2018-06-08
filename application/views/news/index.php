<?php foreach ($news as $news_item): ?>
	<div class="row">
        <div class="col-xs-6 news"><h3><?php echo $news_item['title']; ?></h3>
                <?php echo $news_item['text']; ?><br>
                 <p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>
        </div>
    </div>    
<?php endforeach; ?>
