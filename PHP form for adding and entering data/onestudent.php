<?php


if (!empty($_GET['id'])) {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=l11web12',
        'root',
        ''
    );
    $sql_sel = "SELECT * FROM students WHERE id = {$_GET['id']}";
    if (!$sql_sel) {
        echo "Произошла ошибка запроса с базой даных.\n";
        exit;
    } else {
        $result_query = $pdo->query($sql_sel);
        $data = $result_query->fetchAll();
    }
}



?>
<?php include("includes/header.php"); ?>

<div class="container-md">
    <h1>Информация о студенте</h1>
    <table class="container-md table table-dark table-striped">
        <? foreach ($data as $row) : ?>
            <tr>

                <td><?= $row['id'] ?></td>
                <td><?= $row['fname'] ?></td>
                <td><?= $row['age'] ?></td>
                <td><?= $row['email'] ?></td>

            </tr>
        <? endforeach; ?>
    </table>
    <p><a href="index.php">Назад в главное меню</a></p>
</div>


<?php include("includes/footer.php"); ?>