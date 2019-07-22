<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\SignupForm;

/**
 * Главный контроллер
 *
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup', 'signup-success'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'signup-success'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Отобажает главную страницу
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Авторизует пользователя
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->login()) {
                return $this->redirect(['login-success']);
            } else {
                return $this->renderAjax('partials/_login-error-modal');
            }
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Завершает авторизацию (выход)
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('login');
    }

    /**
     * Регистрирует пользователя
     *
     * @return string|\yii\web\Response
     * @throws yii\base\Exception
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Спасибо за регистрацию! Теперь Вам доступна авторизация.');
            return $this->redirect(['login']);
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Отображает страницу привествия пользователя
     * 
     * @return string
     */
    public function actionLoginSuccess()
    {
        $user = Yii::$app->user->identity;

        return $this->render('signup-success', [
            'user' => $user
        ]);
    }
}
