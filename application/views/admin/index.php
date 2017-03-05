<!-- Left col -->
<section class="col-lg-12">
    <div class="box-info">
        <h3 class="box-title">Список статей</h3>
        <a href="/admin/articles/add" class="btn btn-success">Добавить статью</a>
        <br/><br/>
        <table class="table table-bordered col-lg-11 articles_table">
            <tr>
                <th style="">#</th>
                <th>Название</th>
                <th>Превью</th>
                <th>Дата</th>
                <th class="anons_td">Анонс</th>
                <th></th>
            </tr>
            <? if (!empty($articles)): ?>
                <? foreach ($articles as $key => $article): ?>
                    <tr>
                        <td><?= $article['id'] ?></td>
                        <td class="title_td"><?= $article['title'] ?></td>
                        <td>
                            <? if (isset($article['preview_pic'])) { ?>
                                <img src="images/<?= $article['preview_pic'] ?>" alt="" class="preview">
                                <? } ?>
                            <? if (isset($article['picture'])) { ?>
                                    <img src="images/<?= $article['picture'] ?>" alt="" class="small_pic">
                                <? } ?>
                        </td>
                        <td><?= $article['date'] ?></td>
                        <td class="anons_td"><?= $article['anons'] ?>...</td>

                        <td>
                            <a href="/admin/articles/article/<?= $article['id'] ?>">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                        </td>
                    </tr>
                <? endforeach ?>
            <? endif ?>
        </table>
        <div class="clearfix"></div>
    </div>
</section>
