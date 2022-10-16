<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\UsuariosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="usuarios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // echo $form->field($model, 'Id') ?>

    <?= $form->field($model, 'Usuario') ?>

    <?= $form->field($model, 'Senha') ?>

    <?= $form->field($model, 'Nome') ?>

    <?= $form->field($model, 'CPF') ?>

    <?php $form->field($model, 'Email') ?>

    <?php $form->field($model, 'Telefone') ?>

    <?php $form->field($model, 'Foto') ?>

    <?php $form->field($model, 'Data_de_Nascimento') ?>

    <?php $form->field($model, 'Ativo') ?>

    <?php $form->field($model, 'CEP') ?>

    <?php // echo $form->field($model, 'Endereco') ?>

    <?php // echo $form->field($model, 'Complemento') ?>

    <?php // echo $form->field($model, 'Bairro') ?>

    <?php // echo $form->field($model, 'Cidade') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
