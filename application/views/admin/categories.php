<!-- Left col -->
<section class="col-lg-12">
    <div class="box-info">
        <h3 class="box-title">Список категорий</h3>
        <a href="/admin/category/add" class="btn btn-success">Добавить категорию</a>
        <br/><br/>
        <table class="table table-bordered col-lg-4">
            <tr>
                <th style="">#</th>
                <th>Название</th>
                <th></th>
                <!-- <th style=""></th> -->
            </tr>
            <? if (!empty($data['categories'])): ?>
                <? foreach ($data['categories'] as $categories): ?>
                    <tr>
                        <td><?= $categories['id'] ?></td>
                        <td><?= $categories['name'] ?></td>
                        <td>
                            <a href="/admin/categories/category/<?= $categories['id'] ?>">
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