<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Usuarios $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="usuarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Usuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Senha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CPF')->widget(MaskedInput::className(),['mask' => '999.999.999-99']) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefone')->widget(MaskedInput::className(),['mask' => '+99 (99) 99999-9999']) ?>

    <?= $form->field($model, 'FotoUsuario')->fileInput() ?>

    <?= $form->field($model, 'Data_de_Nascimento')->widget(DatePicker::className()) ?>

    <?= $form->field($model, 'Ativo')->textInput() ?>

    <?= $form->field($model, 'CEP')->widget(MaskedInput::className(),['mask' => '99999-999']) ?>

    <?= $form->field($model, 'Endereco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Complemento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Bairro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Estado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Sair'), ['view', 'Email' => $model->Email], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
