<?php
if(!empty($_POST)){
    if(isset($_POST['all_Students'])){
        header("Location: Student.php"); exit;
    }
    if(isset($_POST['add_Students'])){
        header("Location: addstudent.php"); exit;
    }
} 

echo "<h1>PDO</h1>";

try {

    $pdo = new PDO(
        'mysql:host=localhost;dbname=l11web12',
        'root',
        ''
    );
    echo "<h1>К БД Подключен!!</h1>";

    $sql = "SELECT * FROM students";
    $result_query = $pdo->query($sql);
    if ($result_query === false) {
        echo "<h1>Ошибка при выполнении запрса!!!</h1>";
    } else {
       
        /* $sql_ins2 = "INSERT INTO students (fname, age, email)  VALUES (:fn, :age, :fn)";
        $res = $pdo->prepare($sql_ins2);
        for ($id = 1; $id <= 10; $id++) {
            $res->bindParam(':fn', $id, PDO::PARAM_STR);
            $res->bindParam(':age', $id, PDO::PARAM_INT);
            $res->execute();
        } */

    }

}

catch (PDOException $ex) {
    echo "<h1>Error!!!!!{$ex->getMessage()}</h1>";
}

finally {
    echo "<h1>Работа окончена</h1>";
}
?>

<?php include("includes/header.php"); ?>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

<button type="submit" name="all_Students" class="btn btn-warning mb-3">Вывести список всех студентов</button>
<button type="submit" name="add_Students" class="btn btn-warning mb-3">Добавить студента в группу</button>
</form>
<?php include("includes/footer.php"); ?>