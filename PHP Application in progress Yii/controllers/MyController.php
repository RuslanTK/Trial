<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Student;
use yii\data\Pagination;

class MyController extends Controller {

    public function actionIndex(){

        /* $user =  "Andrey_AV";

        $mail = "aav@i.ua"; */

        $my_name =  "Andrey_A_V";

        $email = "a_a_v@i.ua";



        //return $this->render('view1', ["my_name" => $user, "email" => $mail]);

        return $this->render("view1", compact("my_name", "email"));

    }
    public function actionIndex2()
    {
        return $this->render('view2');
    }
    public function actionIndex3()
    {
        return $this->render('view3');
    }
    public function actionTestMy()
    {
        return $this->render('view3');
    }

    public function actionStudents()
    {
        // $students = Student::find()->select("id,fname,age,email")->all();

        $query = Student::find()->
        select("id,fname,age,email")->
        orderBy("age DESC")
        ;

        $pages = new Pagination(['totalCount'=>$query->count(),
        'pageSize' => 3
    ]);



        // die($students);

        $students = $query->
        offset($pages->offset)->
        limit($pages->limit)->all();


        return $this->render("student_list",compact("students","pages")
    );
    }
    
    public function actionOnestudent(){

        $id = \Yii::$app->request->get('id');



        $student =  Student::findOne($id);



        return $this->render("onestudent", compact("student"));



        //die($id);

    }
}