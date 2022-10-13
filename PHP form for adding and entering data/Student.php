<?php

class Student
{
    protected $id;
    protected $fname;
    protected $age;

    public function getId()
    {
        return $this->id;
    }

    public function getFname()
    {
        return $this->fname;
    }

    public function getAge()
    {
        return $this->age;
    }
}

?>
<?php



$pdo = new PDO(
    'mysql:host=localhost;dbname=l11web12',
    'root',
    ''
);

$sql = "SELECT * FROM students";
$result_query = $pdo->query($sql);
$data = $result_query->fetchAll();


?>
<?php include("includes/header.php"); ?>
<div class="container-md">
    <table class="container-md table table-dark table-hover">
        <tr>
            <td scope="col">Id</td>
            <td scope="col">fname</td>
            <td scope="col">age</td>
            <td scope="col">email</td>
            <td scope="col">Ссылка</td>
        </tr>
        <? foreach ($data as $row) : ?>
            <tr>

                <td><?= $row['id'] ?></td>
                <td><?= $row['fname'] ?></td>
                <td><?= $row['age'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><a href="onestudent.php?id=<?= $row['id'] ?>">Детально....</a></td>
            </tr>
        <? endforeach; ?>
    </table>
    <p><a href="index.php">Назад в главное меню</a></p>
</div>
<?php include("includes/footer.php"); ?>