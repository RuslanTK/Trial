<?php
error_reporting(-1);


if (!empty($_POST)) {
    if (isset($_POST['formSend'])) {
        if ($_POST['formSend'] == "sendInfo") {
            $fname = $_POST['fname'];
            $age = $_POST['age'];
            $email = $_POST['email'];

            $pdo = new PDO(
                'mysql:host=localhost;dbname=l11web12',
                'root',
                ''
            );
            $sql = 'INSERT INTO students (fname, age, email) VALUES ("' . $fname . '", "' . $age . '", "' . $email . '")';
            $result_query = $pdo->exec($sql);
            header("Location: index.php"); exit;
            
            
        } else {
            echo "Произошла ошибка добавления";
        }
    }
}




?>
<?php include("includes/header.php"); ?>
<form action="<?= $_SERVER['PHP_SELF'] ?>" class="container-md border border-dark mb-3 bg-dark" method="post" enctype="multipart/form-data">

    <div class="container-md row g-3 table-dark  ">
        <h3 class="text-center">Ввод данных студента</h3>


        <div class="col-md-4">
            <label for="fname" class="form-label">имя</label>
            <input type="text" class="form-control" name="fname" id="" required>
        </div>

        <div class="col-md-4">
            <label for="age" class="form-label">ВОзраст</label>
            <input type="number" class="form-control" name="age" id="age" min="1" max="100" required>
        </div>
        <div class="col-md-4">
            <label for="email" class="form-label">email</label>
            <input type="email" class="form-control" name="email" id="" required>
        </div>



    </div>
    <div class="container-md col-md-4 mt-2">
        <button type="submit" class="btn btn-warning mb-3" name="formSend" id="btnSave" value="sendInfo">Сохранить</button>
    </div>
    <p><a href="index.php">Назад в главное меню</a></p>



    <?php include("includes/footer.php"); ?>