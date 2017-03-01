<? if(!empty($articles)): ?>
<div class="arts">
	<? foreach($articles as $art):?>
		<h1><a href="/articles/article/<?=$art['id'];?>"><?=$art['title'];?></a></h1>
		<i><?=$art['date'];?></i>
		<img src="/images/<?=$art['image'];?>" alt="">
		<p><?=$art['anons'];?></p>
	<? endforeach; ?>
</div>
<? endif;?>