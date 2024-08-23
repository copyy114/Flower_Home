<?php
// public/index.php

require_once '../controllers/NamepageController.php';

$pageName = isset($_GET['page']) ? $_GET['page'] : 'default';

$controller = new NamepageController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['content'])) {
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        $controller->update($pageName, $content);
    } elseif (isset($_POST['newName']) && isset($_POST['oldName'])) {
        $newName = isset($_POST['newName']) ? $_POST['newName'] : '';
        $oldName = isset($_POST['oldName']) ? $_POST['oldName'] : '';
        $controller->rename($oldName, $newName);
    }
} else {
    $controller->show($pageName);
}
