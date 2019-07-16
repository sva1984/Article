<?php

namespace frontend\controllers;

use Yii;
use common\models\Comment;
use common\models\CommentSearch;
use common\models\Articals;
use common\models\ArticalsSearch;
use yii\base\Model;
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
    public function actionView($slug)
    {

        $articleModel = $this->findModel($slug);
        $commentModel = new Comment();
        if ($commentModel->load(Yii::$app->request->post())) {
            $commentModel->articals_id = $articleModel->id;
            if (!$commentModel->save()) {
                die(print_r($commentModel->errors));
            }
            Yii::$app->session->setFlash('success', 'comment added');
        }

        return $this->render('view', [
            'model' => $articleModel,
            'commentModel' => $commentModel
        ]);
    }

    /**
     * @return string
     */

    public function actionFilialComment()
    {
    $filialComment = new Comment();
    if ($filialComment->load(Yii::$app->request->post())) {
    $filialComment->parrent_comment_id = $filialComment->id;
    $filialComment->save();
        }
        return $this->render('filial', [
           'filialComment' => $filialComment
        ]);
    }

    /**
     * Finds the Articals model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articals the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($slug)
    {
        if (($model = Articals::findOne(['slug' => $slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}