<?php
require_once 'secure.php';
$size = 4;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$nMap = new NakladnayaMap();
$count = $nMap->count();
$ns = $nMap->findAll($page*$size-$size, $size);
$header = 'Список рационов';
require_once 'template/header.php';?>
    <div class="row">

        <div class="col-xs-12">
            <div class="box">
                <section class="content-header">
                    <h1><?=$header;?></h1>
                    <ol class="breadcrumb">
                        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                        <li class="active"><?=$header;?></li>
                    </ol>
                </section>
                <div class="box-body">


                </div>
                <div class="box-body">
                    <?php
                    if ($ns) {
                        ?>

                        <table id="example2" class="table table-bordered table-hover">

                            <thead>
                            <tr>
                                <th>Адрес</th>
                                <th>Дата старта</th>
                                <th>Наименование запчасти</th>
                                <th>Цена</th>
                                <th>Ремонт</th>
                                <th>Цена Ремонта</th>


                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($ns as $n) {
                                echo '<tr>';
                                echo '<td>'.$n->sklad_id.'</td>';
                                echo '<td>'.$n->date_start.'</td>';
                                echo '<td>'.$n->name.'</td>';
                                echo '<td>'.$n->price.'</td>';
                                echo '<td>'.$n->remont.'</td>';
                                echo '<td>'.$n->remont_stanka.'</td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else {
                        echo 'Ни одного рациона не найдено';
                    } ?>
                </div>
                <div class="box-body">
                    <?php Helper::paginator($count, $page,$size); ?>
                </div>
            </div>
        </div>
    </div>
<?php
require_once 'template/footer.php';
?>