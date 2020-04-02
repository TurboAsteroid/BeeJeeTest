<?php

class tasks extends Controller
{
    function index()
    {
        require(ROOT . 'Models/Task.php');

        $tasks = new Task();

        $d['tasks'] = $tasks->showTasks();
        $d['pages'] = $tasks->getPagination();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        $d['errors'] = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->secure_form($_POST);
            if (!$_POST["name"]) {
                $d['errors'][] = 'Name is required';
            }
            if (!$_POST["email"]) {
                $d['errors'][] = 'email is required';
            }
            if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $d['errors'][] = 'email is incorrect';
            }
            if (count($d["errors"])) {

                $this->set($d);
                $this->render("create");
                return;
            }

            require(ROOT . 'Models/Task.php');

            $task = new Task();

            if ($task->create($_POST["name"], $_POST["email"], $_POST["text"])) {
                $d['success'] = 'Task added';
                $_POST = [];

                $d['tasks'] = $task->showTasks();
                $d['pages'] = $task->getPagination();
                $this->set($d);
                $this->render("index");
            } else {
                $d["errors"][] = "something went wrong";
            }
        }
        $this->set($d);
        $this->render("create");
    }

    function edit($id)
    {
        $this->secure_form($_POST);
        require(ROOT . 'Models/Task.php');
        $task = new Task();

        $d["task"] = $task->showTask($id);

        if (isset($_POST["text"])) {
            if ($task->edit($id, $_POST["text"], $_POST["status"] || 0)) {
                header("Location: /");
            }
        }
        $this->set($d);
        $this->render("edit");
    }
}

?>