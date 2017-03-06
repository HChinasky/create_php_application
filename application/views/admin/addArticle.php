<!-- Left col -->
<section class="col-lg-10 connectedSortable">
    <!-- quick email widget -->
    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Добавить статью</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i
                        class="fa fa-times"></i></button>
            </div>
            <!-- /. tools -->
        </div>
        <div class="box-body">
            <!--       ////////////////////////////////  form     //////////////////////////////       -->
            <form action="/admin/articles/add" method="post" name="add_article" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Название статьи"/>
                </div>
                <!--          datepicker          -->
                <div class="form-group">
                    <label>Дата:</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" name="date">
                    </div>
                    <!-- /.input group -->
                </div>
                <!--         anons           -->
                <div class="form-group">
                    <label for="anons">Анонс</label><br/>
                    <textarea name="anons" id="anons"></textarea>
                </div>
                <!--          text description          -->
                <div class='box'>
                    <div class='box-header'>
                        <h3 class='box-title'>Текст статьи</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip"
                                    title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip"
                                    title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class='box-body pad'>
                        <div>
                            <textarea name="description" class="textarea" id="editor1"
                                      placeholder="Place some text here"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                    </div>
                </div>
                <!-- Select multiple-->
                <div class="form-group">
                    <label>Выберите категорию:</label>
                    <?=$categories;?>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Загрузка файлов</label>
                    <input name="image[]" type="file" multiple="multiple" id="exampleInputFile">

                    <p class="help-block">Выберите файлы для загрузки</p>
                </div>
                <div class="box-footer clearfix">
                    <button type="submit" class="pull-right btn btn-default" name="send">Добавить <i
                            class="fa fa-arrow-circle-right"></i></button>
                </div>
            </form>
            <!--       ////////////////////////////////  end form   //////////////////////////////       -->
        </div>
    </div>

</section><!-- /.Left col -->