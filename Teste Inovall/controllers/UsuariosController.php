<?php

namespace app\controllers;

use app\models\Usuarios;
use app\models\UsuariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

/**
 * UsuariosController implements the CRUD actions for Usuarios model.
 */
class UsuariosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Usuarios models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UsuariosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuarios model.
     * @param string $Email Email
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Email)
    {
        return $this->render('view', [
            'model' => $this->findModel($Email),
        ]);
    }

    /**
     * Creates a new Usuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Usuarios();
        $model->Ativo = '1';
        $model->save();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Email' => $model->Email]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Upload a image file in the attribute Foto
     */

    public function UploadFiles($model){
        if ($model->validate()){
            /*if($model->FotoUsuario == null){
                return false;
            }*/
            $model->FotoUsuario = UploadedFile::getInstance($model, 'FotoUsuario');
            $model->Foto = $model->FotoUsuario->name;

            $model->save();

            $uploadPath = Yii::getAlias('@webroot/file');
            $model->FotoUsuario->saveAs($uploadPath . '/' . $model->FotoUsuario->name,false);
        }

    }

    /**
     * Get the CEP value and Fill the attributes Endereco, Complemento, Bairro, Cidade and Estado
     */

    public function FillCEP($model){
        if($model->CEP == null){
            return false;
        }
        $cep = str_replace("-", "", $model->CEP);
        $url = file_get_contents('https://viacep.com.br/ws/'.$cep.'/json/');

        $json = json_decode($url,true);

        $model->Endereco = $json['logradouro'];
        $model->Complemento = $json['complemento'];
        $model->Bairro = $json['bairro'];
        $model->Cidade = $json['localidade'];
        $model->Estado = $json['uf'];

        $model->save();
    }

    /**
     * Updates an existing Usuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $Email Email
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Email)
    {
        $model = $this->findModel($Email);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $this->UploadFiles($model);
            $this->FillCEP($model);
            return $this->redirect(['view', 'Email' => $model->Email]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Usuarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $Email Email
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Email)
    {
        $this->findModel($Email)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $Email Email
     * @return Usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Email)
    {
        if (($model = Usuarios::findOne(['Email' => $Email])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
