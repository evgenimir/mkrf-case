<?php

/* @var $this yii\web\View */

use yii\bootstrap\Html;
use yii\helpers\Url;

$this->title = 'Кейс MKRF';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Главная</h1>

        <p class="lead">Кейс</p>

        <p>Для проверки системы требуется<br>зарегистрироваться или ввести данные тестового аккаунта в форму авторизации.</p>

        <?php if (Yii::$app->user->isGuest): ?>
            <p><a class="btn btn-lg btn-success" href="<?= Url::to(['site/login']); ?>">Авторизация</a></p>
            <p><a class="btn btn-primary" href="<?= Url::to(['site/signup']); ?>">Регистрация</a></p>
        <?php else: ?>
            <p><?= Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выйти',
                    ['class' => 'btn btn-primary']
                )
                . Html::endForm()
                ?></p>
        <?php endif; ?>
    </div>
</div>
