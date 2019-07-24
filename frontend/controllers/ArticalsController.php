<?php

namespace frontend\controllers;

use common\models\User;
use Yii;
use common\models\Comment;
use common\models\CommentSearch;
use common\models\Articals;
use common\models\ArticalsSearch;
use yii\base\Model;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\services\ArticalsService;
use common\services\CommentService;
use common\services\UserService;

/**
 * ArticalsController implements the CRUD actions for Articals model.
 */
class ArticalsController extends Controller
{

    protected $articalsService;
    protected $commentService;
    protected $userService;

    public function __construct($id, $module,
                                ArticalsService $articalsService, CommentService $commentService,
                                UserService $userService, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->articalsService = $articalsService;
        $this->commentService = $commentService;
        $this->userService = $userService;
    }

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
        $articleModel = $this->articalsService->findModel($slug);
        $commentModel = $this->commentService->newCommentModel();
        $userModel = $this->userService->newUserModel();
        if ($commentModel->load(Yii::$app->request->post())) {
            $commentModel->articals_id = $this->articalsService->articleModelId($slug);
//            echo "<pre>";
//            die(print_r($this->articalsService->articleModelId($slug)));
            if (!$commentModel->save())
            {
                die(print_r($commentModel->errors));
            }
            Yii::$app->session->setFlash('success', 'comment added');
        }
        $commentModel = $this->commentService->newCommentModel();
        return $this->render('view', [
            'model' => $articleModel,
            'commentModel' => $commentModel,
            'userModel' => $userModel
        ]);
    }


    /**
     * @param $id
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionFilialComment($id, $slug)
    {
        $filialComment = $this->commentService->newCommentModel();
        $articleModel = $this->articalsService->findModel($slug);
        if ($filialComment->load(Yii::$app->request->post())) {
            $filialComment->articals_id = $articleModel->id;
            $filialComment->parrent_comment_id = $id;
            Yii::$app->session->setFlash('success', 'comment added');
            if (!$filialComment->save()) {
                die(print_r($filialComment->errors));
            }

            return $this->redirect(Url::to(['articals/view', 'slug' => $slug]));

        }

        return $this->render('_formparrent', [
            'filialComment' => $filialComment,
            'parentCommentId' => $id,
            'model' => $articleModel,

        ]);
    }


    /**
     * Finds the Articals model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articals the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

//    protected function findModel($slug)
//    {
//        if (($model = Articals::findOne(['slug' => $slug])) !== null) {//перенес в сервис
//            return $model;
//        }
//
//        throw new NotFoundHttpException('The requested page does not exist.');
//    }
}
