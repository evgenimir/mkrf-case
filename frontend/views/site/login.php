<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <h1>Авторизация</h1>

    <div class="row">
        <div class="col-lg-4">
            <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'enableAjaxValidation' => false
            ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<div id="modal"></div>

<?php
$js = <<<JS
    $('#login-form').on('beforeSubmit', function(){
        var data = $('#login-form').serialize();
        $.ajax({
            url: '/site/login',
            type: 'POST',
            data: data,
            success: function(data) {
                $("#modal").html(data);
            },
        });
        return false;
    });
JS;

$this->registerJs($js);
?>