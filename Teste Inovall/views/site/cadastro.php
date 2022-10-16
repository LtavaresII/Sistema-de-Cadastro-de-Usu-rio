<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

$this->title = 'Cadastro';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-login">
    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <p>Preencha os campos a seguir para realizar o cadastro:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>

        <?= $form->field($model, 'Email')->textInput(['autofocus' => true, 'placerholder' => 'Email do Usuarios']) ?>

        <?= $form->field($model, 'Usuario')->textInput(['autofocus' => true, 'placerholder' => 'Nick do Usuarios']) ?>

        <?= $form->field($model, 'Nome')->textInput(['autofocus' => true, 'placerholder' => 'Nome do Usuarios']) ?>

        <?= $form->field($model, 'CPF')->widget(MaskedInput::className(),['mask' => '999.999.999-99']) ?>

        <?= $form->field($model, 'Senha')->passwordInput(['placerholder' => 'Senha']) ?>

        <input type="submit" class="btn btn-success btn-block" value="Cadastra-se">

    <?php ActiveForm::end(); ?>

    <div class="text-center">
        <!--<a href="<?php echo Url::toRoute('site/login')?>">Realizar Login</a>-->
    </div>
</div>
