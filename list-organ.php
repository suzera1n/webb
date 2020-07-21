<?php
require_once 'secure.php';
$size = 4;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$oMap = new OrganMap();
$count = $oMap->count();
$os = $oMap->findAll($page*$size-$size, $size);
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
                    if ($os) {
                        ?>

                        <table id="example2" class="table table-bordered table-hover">

                            <thead>
                            <tr>
                                <th>Название</th>
                                <th>Дата старта</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($os as $o) {
                                echo '<tr>';

                                echo '<td>'.$o->name.'</td>';
                                echo '<td>'.$o->date_start.'</td>';

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