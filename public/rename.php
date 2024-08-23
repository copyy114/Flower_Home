<?php
// public/rename.php

require_once '../controllers/NamepageController.php';

$oldName = isset($_POST['oldName']) ? $_POST['oldName'] : '';
$newName = isset($_POST['newName']) ? $_POST['newName'] : '';

if ($oldName && $newName) {
    $controller = new NamepageController();
    try {
        $controller->rename($oldName, $newName);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'Old name and new name are required.';
}
