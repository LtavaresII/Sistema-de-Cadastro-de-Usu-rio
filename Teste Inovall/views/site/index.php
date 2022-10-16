<?php

/** @var yii\web\View $this */

use app\classes\widgets\HelloWidget;
use app\classes\widgets\HelloWorldBeginEndWidget;
use yii\jui\DatePicker;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <br>
        <br>

        <h1 class="display-4">Sistema de Cadastro de Usuarios</h1>

        <p class="lead">
            <br>
        </p>

        <p class="lead">Cadastro, Login e funções CRUD de Usuarios.</p>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Cadastro: </h2>

                <p>Clique na barra de navegação para adicionar um novo usuario, cadastro feito com Usuario, Nome ,Email e Senha.</p>

            </div>
            <div class="col-lg-4">
                <h2>Login: </h2>

                <p>Clique na barra de navegação para logar como usuario, login feito feito Email e Senha.</p>

            </div>
            <div class="col-lg-4">
                <h2>Sistema CRUD: </h2>

                <p>Depois de logar como usuario, terá acesso ou sistema CRUD, onde será possivel Ver, Atualizar
                    e Deletar um usuario.</p>

            </div>
        </div>

    </div>
</div>
