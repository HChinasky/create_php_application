<? if(!empty($articles)): ?>
<div class="arts">
	<? foreach($articles as $art):?>
		<h1><a href="/articles/article/<?=$art['id'];?>"><?=$art['title'];?></a></h1>
		<i><?=$art['date'];?></i><br>
		<img src="/images/<?=$art['preview_pic'];?>" alt="">
		<p><?=$art['anons'];?></p>
	<? endforeach; ?>
</div>
<? endif;?>