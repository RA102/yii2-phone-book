<?php

namespace app\controllers;

use app\models\PhoneList;
use app\models\PhoneType;
use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $phoneList = new PhoneList();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'phoneList' => $phoneList
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $phoneList = new PhoneList();

        if ($model->load(Yii::$app->request->post()) ) {
            $request = Yii::$app->request->post();
            $model->name = ArrayHelper::getValue($request, 'User.name');
            $model->save();
            $phoneList->user_id = $model->id;
            $phoneList->phone = ArrayHelper::getValue($request, 'PhoneList.phone');
            $phoneList->phone_type = ArrayHelper::getValue($request, 'PhoneList.phone_type');
            $phoneList->save();

            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'phoneList' => $phoneList
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $phoneList = PhoneList::find()->where(['user_id' => $id])->all();

        if ($model->load(Yii::$app->request->post()) && $model->save() ) {
            $request = Yii::$app->request->post();
            $arrayPhoneList = ArrayHelper::getValue($request, 'PhoneList');

            foreach ($arrayPhoneList as $item) {
                $alterRow = PhoneList::findOne($item['id']);
                $alterRow->phone = $item['phone'];
                $alterRow->phone_type = $item['phone_type'];
                $alterRow->update();
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'phoneList' => $phoneList
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        PhoneList::deleteAll(['user_id' => $id]);
        $this->findModel($id)->delete();


        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionAdd($id)
    {
        $model = $this->findModel($id);
        $phoneList = new PhoneList();

        if (Yii::$app->request->post()){
            $request = Yii::$app->request->post();

            $phoneList->user_id = $model->id;

            $phoneList->phone = ArrayHelper::getValue($request, 'PhoneList.phone');
            $phoneList->phone_type = ArrayHelper::getValue($request, 'PhoneList.phone_type');
            $phoneList->save();

            $this->redirect('index');
        }


        return $this->render('add', [
           'phoneList' => $phoneList,
        ]);
    }
}
