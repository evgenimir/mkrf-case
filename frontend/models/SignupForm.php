<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Форма регистрации
 *
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $last_name;
    public $first_name;
    public $father_name;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Данный логин уже используется в системе.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            [['last_name', 'first_name'], 'required'],
            [['last_name', 'first_name', 'father_name'], 'string', 'max' => 255],
            
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Данный E-mail уже используется в системе.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'email' => 'E-mail',
            'last_name' => 'Фамилия',
            'first_name' => 'Имя',
            'father_name' => 'Отчество'
        ];
    }

    /**
     * Регистрация пользователя
     *
     * @return bool|null
     * @throws \yii\base\Exception
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->last_name = $this->last_name;
        $user->first_name = $this->first_name;
        $user->father_name = $this->father_name;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save();
    }
}
