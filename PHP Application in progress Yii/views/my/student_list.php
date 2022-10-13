<h1>Студенты</h1>

<table border="1">

    <tr>

        <td>Id</td>

        <td>Fname</td>

        <td>Age</td>

        <td>Email</td>

        <td>Ссылка</td>


    </tr>

    <?php foreach ($students as $item) : ?>

        <tr>

            <td><?= $item->id ?></td>

            <td><?= $item->fname ?></td>

            <td><?= $item->age ?></td>

            <td><?= $item->email ?></td>

            <td><a href="onestudent?id=<?=$item->id?>">Детально....</a></td>

        </tr>
    <?php endforeach; ?>

</table>
<hr>
<?= \yii\widgets\LinkPager::widget(['pagination' => $pages])?>
