<?php
require_once 'secure.php';
$size = 4;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$sMap = new StankiMap();
$count = $sMap->count();
$ss = $sMap->findAll1($page*$size-$size, $size);
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
                if ($ss) {
                    ?>

                    <table id="example2" class="table table-bordered table-hover">

                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Дата старта</th>
                            <th>Срок</th>
                            <th>Дата окончания</th>
                            <th>Комплект</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($ss as $s) {
                            echo '<tr>';
                            echo '<td>'.$s->name.'</td>';
                            echo '<td>'.$s->date_start.'</td>';
                            echo '<td>'.$s->srok_exp.'</td>';
                            echo '<td>'.$s->date_end.'</td>';
                            echo '<td>'.$s->komplekt_id.'</td>';
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
