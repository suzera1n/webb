<?php
require_once 'secure.php';
if (isset($_POST['type_id'])) {
    $tp = new TypeStanok();
    $tp->type_id = Helper::clearInt($_POST['type_id']);
    $tp->name = Helper::clearString($_POST['name']);

    if ((new TypeStanokMap())->save($tp)) {
        header('Location: List-Type.php?id='.$tp->type_id);
    } else {
        if ($tp->type_id) {

            header('Location: Add-TypeStanok.php?id='.$tp->type_id);

        } else {
            header('Location: Add-TypeStanok.php');
        }
    }
}
