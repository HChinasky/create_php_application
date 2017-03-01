<h1><?=$article['title'];?></h1>
<div class="arts">
    <article>
        <div class="post-image">
            <img src="images/<?=$article['preview_pic']?>" alt="" />
            <? if(isset($article['image'])){ ?>
                <div class="small_pics_container">
                    <a href="images/<?=$article['image']?>" class="lightbox_pic" data-lightbox="image">
                        <img width="100" src="images/<?=$article['image']?>" alt="" class="small_pic">
                    </a>
                </div>
            <? } ?>
        </div>
        <p>
            <?=$article['description']?>
        </p>
        <span class="date"><b><?=$article['date']?></b></span>
    </article>
</div>
