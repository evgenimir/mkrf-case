<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

use yii\bootstrap\Html;

$this->title = $user->fullName . ', приветствуем Вас!';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-md-12"><h3>Здравствуйте, <?= $user->fullName; ?>!</h3></div>
            <div class="col-md-4">
                <?= Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выйти',
                    ['class' => 'btn btn-primary']
                )
                . Html::endForm()
                ?>
            </div>
        </div>

    </div>
</div>
