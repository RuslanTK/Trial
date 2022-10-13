<?php
error_reporting(-1);
require_once('config.php');
$dir = "info_of_students\\";
$dir_file_students = "students.txt";
$dir_foto_students = "foto_students\\";

define('FILENAME', $dir . $dir_file_students);
define('FOTOSTUDENTS', $dir . $dir_foto_students);

if (!is_dir($dir)) {
    mkdir($dir);
    file_put_contents(FILENAME, "");
} elseif (!is_file(FILENAME)) {
    file_put_contents(FILENAME, "");
}
if (!is_dir(FOTOSTUDENTS)) {
    mkdir(FOTOSTUDENTS);
}
$student_new_id = file_get_contents(FILENAME);


$student_new_id = (int)str_replace(PHP_EOL, "", substr($student_new_id, strrpos(rtrim($student_new_id, "\n"), PHP_EOL), strpos(substr($student_new_id, strrpos(rtrim($student_new_id, "\n"), PHP_EOL)), ";")));
$student_new_id++;

if (!empty($_POST)) {
    if (isset($_POST['formSend'])) {
        if ($_POST['formSend'] == "sendInfo") {
            $id = $_POST['id'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $mname = $_POST['mname'];
            $age = $_POST['age'];
            $email = $_POST['email'];


            $query = 'INSERT INTO students (fname, lname, mname, age, email,foto_id) VALUES ("' . $fname . '", "' . $lname . '", "' . $mname . '", "' . $age . '", "' . $email . '","")';
            mysqli_query($db, $query);
            $increment_id = mysqli_insert_id($db);
            
            $sql_update = "UPDATE students SET foto_id= 'foto_{$increment_id}' WHERE fname='$fname'";
            mysqli_query($db, $sql_update);
            


            
            $file_name = uniqid() . strstr($_FILES['foto']['name'], ".");
            move_uploaded_file($_FILES['foto']['tmp_name'], FOTOSTUDENTS . $file_name);
            file_put_contents(FILENAME, $_POST['id'] . ";" . $_POST['fname'] . ";" . $_POST['lname'] . ";" . $_POST['mname'] . ";" . $_POST['age'] . ";" . $_POST['email'] . ";" . $file_name . PHP_EOL, FILE_APPEND);
            header("location:{$_SERVER['PHP_SELF']}");
            exit;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" class="container-md border border-dark mb-3 bg-secondary" method="post" enctype="multipart/form-data">

        <div class="container-md row g-3  ">
            <h3 class="text-center">Данные о студентах</h3>

            <div class="col-md-4">
                <label for="id" class="form-label">номер п/п</label>
                <input type="number" class="form-control" name="id" min="1" max="100" id="num" value=<?= $student_new_id ?> readonly>
            </div>
            <div class="col-md-4">
                <label for="fname" class="form-label">имя</label>
                <input type="text" class="form-control" name="fname" id="" required>
            </div>
            <div class="col-md-4">
                <label for="lname" class="form-label">Фамилия</label>
                <input type="text" class="form-control" name="lname" id="" required>
            </div>
            <div class="col-md-4">
                <label for="mname" class="form-label">Отчество</label>
                <input type="text" class="form-control" name="mname" id="" required>
            </div>
            <div class="col-md-4">
                <label for="age" class="form-label">ВОзраст</label>
                <input type="number" class="form-control" name="age" id="age" min="1" max="100" required>
            </div>
            <div class="col-md-4">
                <label for="email" class="form-label">email</label>
                <input type="email" class="form-control" name="email" id="" required>
            </div>
            <div class="col-md-4">
                <label for="foto" class="form-label">фото</label>
                <input type="file" class="form-control" name="foto" id="foto" accept=".jpg , .jpeg" required>
            </div>


        </div>
        <div class="container-md col-md-4">
            <button type="submit" class="btn btn-dark mb-3" name="formSend" id="btnSave" value="sendInfo">Сохранить</button>
        </div>

    </form>
    <?php if (file_get_contents(FILENAME) != "") : ?>
        <?php if (!file_get_contents(FILENAME)) {
            echo "НЕТ ИНФОРМАЦИИ О СТУДЕНТЕ";
        } ?>

        <div class="container-md">


            <table class="container-md table table-dark table-striped">

                <thead>
                    <tr>
                        <th scope="col">№п/п</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Фамилия</th>
                        <th scope="col">Отчество</th>
                        <th scope="col">Возраст</th>
                        <th scope="col">Email</th>
                        <th scope="col" style="width: 10rem;">Фото Студента</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach (explode(PHP_EOL, file_get_contents(FILENAME)) as $item) : ?>

                        <tr>
                            <?php foreach (explode(";", $item) as $student_info) : ?>
                                <?php if (strtoupper(strstr($student_info, ".")) != '.JPG' && strtoupper(strstr($student_info, ".") != '.JPEG')) : ?>
                                    <td>
                                        <span>
                                            <?php echo $student_info ?>
                                        </span>
                                    </td>
                                <?php else : ?>
                                    <td class="card" style="width: 10rem;">
                                        <img src=<?= FOTOSTUDENTS . $student_info ?> alt="" class="card-img-top">
                                    </td>
                                <?php endif; ?>


                            <?php endforeach; ?>
                        </tr>


                    <?php endforeach; ?>

                </tbody>




            </table>
        </div>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>