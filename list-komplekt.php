<?php
require_once 'secure.php';
$size = 4;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$kMap = new KomplektMap();
$count = $kMap->count();
$ks = $kMap->findAll($page*$size-$size, $size);
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
                    if ($ks) {
                        ?>

                        <table id="example2" class="table table-bordered table-hover">

                            <thead>
                            <tr>
                                <th>Наименование станка</th>
                                <th>Название запчасти</th>


                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($ks as $k) {
                                echo '<tr>';

                                echo '<td>'.$k->name.'</td>';
                                echo '<td>'.$k->naklad_id.'</td>';

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