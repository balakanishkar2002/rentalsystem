<?php

namespace backend\controllers;
use backend\models\PropertyFloor;
use backend\models\TenantDetails;
use Yii;
use backend\models\HouseDetails;
use backend\models\HouseDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
/**
 * HouseDetailsController implements the CRUD actions for HouseDetails model.
 */
class HouseDetailsController extends Controller
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
     * Lists all HouseDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HouseDetailsSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $query = HouseDetails::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HouseDetails model.
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
     * Creates a new HouseDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HouseDetails();
        $model->created_date = date('Y-m-d h:i:s');
        $model->updated_date = date('Y-m-d h:i:s');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->house_id]);
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing HouseDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->updated_date = date('Y-m-d h:i:s');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->house_id]);
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing HouseDetails model.
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
     * Finds the HouseDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HouseDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HouseDetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionLoadhouse($id)
    {
        $countProperty=propertyfloor::find()->where(['floor_id'=>$id])->count();
        $loadhouse=HouseDetails::find()->where(['floor_id'=>$id])->orderBy('floor_id asc')->all();
        if($countProperty > 0 ) {
            foreach ($loadhouse as $result) echo "<option value='" . $result->house_id . "'>" . $result->house_name . "</option>";
        }else{
            echo "<option>-----</option>";
        }

        //var_dump($loadPropertyfloor);
        //return parent::actions(); // TODO: Change the autogenerated stub
    }
}
