<h1>Tasks</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
        <tr>
            <?php $order = $_GET["order"] == "DESC" ? "ASC" : "DESC" ?>
            <th><a href="/?order_by=name&order=<?= $order ?>">name</a></th>
            <th><a href="/?order_by=email&order=<?= $order ?>">email</a></th>
            <th><a href="/?order_by=text&order=<?= $order ?>">text</a></th>
            <?php if ($_SESSION['admin']) {
                echo "<th><a href=\"/?order_by=status&order=" . $order . "\">Status</a></th>";
                echo "<th>edited</th>";
            } ?>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <?php
        foreach ($tasks as $task) {
            echo '<tr>';
            echo "<td>" . $task['name'] . "</td>";
            echo "<td>" . $task['email'] . "</td>";
            echo "<td>" . $task['text'] . "</td>";
            echo "<td>" . ($task['status'] ? "end" : "in process") . "</td>";
            if ($_SESSION['admin']) {
                echo "<td class='text-center'><a class='btn btn-info btn-xs' href='/tasks/edit/" . $task["id"] . "' ><span class='glyphicon glyphicon-edit'></span> Edit</a></td>";
                echo "<td>" . ($task['edited'] ? "y" : "n") . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <div>
        <nav>
            <ul class="pagination">
                <?php
                for ($i = 1; $i <= $pages; $i++) { ?>
                    <li class="page-item"><a class="page-link"
                                             href="/?order_by=<?= $_GET["order_by"] ?>&order=<?= $_GET["order"] ?>&page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <? } ?>
            </ul>
        </nav>
    </div>
    <?php if ($success) { ?>
        <div class="alert alert-success" role="alert">
            <?= success ?>
        </div>
    <? } ?>
</div>