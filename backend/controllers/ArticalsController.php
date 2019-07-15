<?php

namespace backend\controllers;

use Yii;
use common\models\Articals;
use common\models\ArticalsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticalsController implements the CRUD actions for Articals model.
 */
class ArticalsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function cookyCount(){
        $cookies = Yii::$app->request->cookies;
        $countCook = $cookies->getValue('enter', '1');

        return Yii::$app->response->cookies->add(new \yii\web\Cookie([
            'name' => 'enter',
            'value' => $countCook+=1
        ]));
    }



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
     * Lists all Articals models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticalsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->cookyCount();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Articals model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->cookyCount();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Articals model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Articals();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Статья сосоздана");
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $this->cookyCount();
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Articals model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Статья сохранена");
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $this->cookyCount();
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Articals model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Articals model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articals the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Articals::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
