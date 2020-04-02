<?php
class Task extends Model
{
    public function create($name, $email, $text)
    {
        $sql = "INSERT INTO tasks (name, email, text) VALUES (:name, :email, :text)";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'name' => $name,
            'email' => $email,
            'text' => $text

        ]);
    }

    public function showTask($id)
    {
        $sql = "SELECT * FROM tasks WHERE id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    public function getPagination() {
        $tasksCount = "SELECT count(*) as count FROM tasks ";
        $req = Database::getBdd()->prepare($tasksCount);
        $req->execute();
        return ceil($req->fetch()[count] / 3) ;
    }

    public function showTasks()
    {
        $order = "";
        if (in_array($_GET['order'], ["ASC","DESC"]) && in_array($_GET['order_by'], ["name","email", "status"]) ) {
            $order = 'ORDER BY '.$_GET['order_by']." ".$_GET["order"];
        }

        $pages = $this->getPagination();
        $page = 1;
        if ($_GET['page'] && $_GET['page'] <= $pages) $page = $_GET['page'];
        $start_position = ($page - 1) * 3;


        $tasks = "SELECT * FROM tasks ".$order." LIMIT ".$start_position.", 3";
        $req = Database::getBdd()->prepare($tasks);
        $req->execute();
        return $req->fetchAll();
    }

    public function edit($id, $text, $status)
    {
        $task = $this->showTask($id);

        $sql = "UPDATE tasks SET text = :text, status = :status, edited = :edited WHERE id = :id";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'id' => $id,
            'text' => $text,
            'status' => $status ? 1 : 0,
            'edited' => ($task['edited'] || $task["text"]!=$text) ? 1 : 0
        ]);
    }
}
?>