<?php

namespace app\modules\dashboard\controllers;

use Yii;
use app\models\Tag;
use app\models\Product;
use yii\web\Controller;
use app\models\Category;
use app\models\Utilities;
use yii\web\UploadedFile;
use app\models\ImageUpload;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\ProductSearch;
use yii\web\NotFoundHttpException;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        // categories
        $categories = ArrayHelper::map(Category::find()->all(), 'id', 'title');

        // image
        $image = new ImageUpload();

        // tags
        $tagsAll = ArrayHelper::map(Tag::find()->all(), 'id', 'title');

        if ($model->load(Yii::$app->request->post())) {

            // save image
            $file = UploadedFile::getInstance($image, 'image');
            if ($file != null) $model->saveImage($image->uploadFile($file, $model->thumb));

            // save tags
            $tags = Yii::$app->request->post('tags');
            $model->saveTags($tags);

            // save category
            $category = Yii::$app->request->post('category');
            $model->saveCategory($category);

            if ($model->save())
            {
                return $this->redirect(['view', 
                    'id' => $model->id,
                ]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'image' => $image,
            'selected' => null,
            'categories' => $categories,
            'tags' => null,
            'tagsAll' => $tagsAll,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        // this model
        $model = $this->findModel($id);

        // image
        $image = new ImageUpload();

        // categories
        $selectedCategory = $model->category != null ? $model->category->id : null;
        $categories = ArrayHelper::map(Category::find()->all(), 'id', 'title');

        // tags
        $tags = $model->getSelectedTags();
        $tagsAll = ArrayHelper::map(Tag::find()->all(), 'id', 'title');

        if ($model->load(Yii::$app->request->post())) {

            // save image
            $file = UploadedFile::getInstance($image, 'image');
            if ($file != null) $model->saveImage($image->uploadFile($file, $model->thumb));
            
            // save tags
            $tags = Yii::$app->request->post('tags');
            $model->saveTags($tags);

            // save category
            $category = Yii::$app->request->post('category');
            $model->saveCategory($category);

            if ($model->save())
            {
                return $this->redirect(['view', 
                    'id' => $model->id,
                ]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'image' => $image,
            'selected' => $selectedCategory,
            'categories' => $categories,
            'tags' => $tags,
            'tagsAll' => $tagsAll,
        ]);
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
