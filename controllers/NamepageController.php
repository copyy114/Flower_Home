<?php
// controllers/NamepageController.php

require_once '../models/PageModel.php';

class NamepageController
{
    private $model;

    public function __construct()
    {
        $this->model = new PageModel();
    }

    public function show($pageName)
    {
        $data = $this->model->getPage($pageName);
        include '../views/page.php';
    }

    public function update($pageName, $content)
    {
        $this->model->updatePage($pageName, $content);
        header("Location: /?page=$pageName");
        exit;
    }

    public function rename($oldName, $newName)
    {
        $this->model->renamePage($oldName, $newName);
        header("Location: /?page=$newName");
        exit;
    }
}
