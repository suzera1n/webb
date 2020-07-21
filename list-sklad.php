<?php
require_once 'secure.php';
$size = 4;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$skMap = new SkladMap();
$count = $skMap->count();
$sks = $skMap->findAll($page*$size-$size, $size);
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
                    if ($sks) {
                        ?>

                        <table id="example2" class="table table-bordered table-hover">

                            <thead>
                            <tr>
                                <th>Название организации</th>
                                <th>Адрес</th>
                                <th>Номер</th>
                                <th>Дата</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($sks as $sk) {
                                echo '<tr>';
                                echo '<td>'.$sk->organ_id.'</td>';

                                echo '<td>'.$sk->adress.'</td>';
                                echo '<td>'.$sk->kol_vo.'</td>';
                                echo '<td>'.$sk->date_start.'</td>';
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