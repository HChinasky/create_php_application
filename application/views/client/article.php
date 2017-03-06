<h1><?=$article['title'];?></h1>
<div class="arts">
    <article>
        <div class="post-image">
            <? if(isset($article['image'])){ ?>
                <div class="small_pics_container">
                    <?=$article['image']?>
                </div>
            <? } ?>
        </div>
        <p>
            <?=$article['description']?>
        </p>
        <span class="date"><b><?=$article['date']?></b></span>
    </article>
</div>
