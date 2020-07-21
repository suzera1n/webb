<?php function createLink($href, $icon, $text) {
    $is_active = $_SERVER['PHP_SELF'] === '/' . $href;
    $class_name = $is_active ? 'active' : '';

    print("
        <li class='$class_name'>
            <a href='$href'>
                <i class='fa $icon'></i>
                <span>$text</span>
            </a>
        </li>
    ");
} ?>
<!-- Sidebar Menu -->
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Справочники</li>
            <?php
            createLink("Add-TypeStanok.php", "fa-users", "Добавить типы");
            ?>
            <li class="header">Списки складов</li>
            <?php createLink("list-naklad.php", "fa-users", "Список накладных"); ?>
            <?php createLink("list-komplekt.php", "fa-users", "Список комплектов"); ?>
            <?php createLink("list-organ.php", "fa-users", "Список организаций"); ?>
            <?php createLink("list-sklad.php", "fa-users", "Список складов"); ?>
            <?php createLink("List-Type.php", "fa-users", "Список типов"); ?>
            <li class="header">Запросы</li>
            <?php createLink("list-query1.php", "fa-users", "1 Станки по текущей дате "); ?>
            <?php createLink("list-sklad.php", "fa-users", "2 "); ?>
        </ul>
    </section>
</aside>
<!-- /.sidebar-menu -->