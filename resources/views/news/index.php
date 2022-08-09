
<?php foreach($newsList as $key => $news): ?>
  <div style="border: 1px solid green;">
      <h2><a href="<?=route('news.show', ['id' => $key])?>"><?=$news['title']?></a></h2>
      <p><?=$news['author']?> - <?=$news['created_at']->format('d-m-Y H:i')?></p>
      <p><?=$news['description']?></p>
  </div><br><hr>
<?php endforeach; ?>
