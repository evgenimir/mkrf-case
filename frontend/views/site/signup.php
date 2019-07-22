<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <div class="col-md-4">
                    <?= $form->field($model, 'last_name')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'first_name')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'father_name')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>
                </div>

            <?php ActiveForm::end(); ?>
    </div>
</div>