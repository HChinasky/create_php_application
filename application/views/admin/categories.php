<!-- Left col -->
<section class="col-lg-12">
    <div class="box-info">
        <h3 class="box-title">Список категорий</h3>
        <a href="/admin/categories/add" class="btn btn-success">Добавить категорию</a>
        <br/><br/>
        <table class="table table-bordered col-lg-4">
            <tr>
                <th style="">#</th>
                <th>Название</th>
                <th>ред.</th>
                <th style="">удал.</th>
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
                        <td>
                            <a href="/admin/categories/delete/<?= $categories['id'] ?>" class="delete_item"
                               data-confirm-title="Удалить запись?"
                               data-confirm-message="Вы действительно хотите удалить эту запись?">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                <? endforeach ?>
            <? endif ?>
        </table>
        <div class="clearfix"></div>
    </div>
</section>