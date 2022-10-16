<?php

namespace app\models;

use app\models\Usuarios;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends Model
{
    public $Email;
    public $Senha;
    public $Ativo;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['Email', 'Senha'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['Senha', 'validatePassword'],
            // Usuarios is validated by validateAtivo()
            ['Email','validateAtivo']
        ];
    }

    public function attributeLabels()
    {
        return [
            'rememberMe' => 'Mantenha-me conectado',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $Usuario = $this->getUser();

            if (!$Usuario || !$Usuario->validatePassword($this->Senha)) {
                $this->addError($attribute, 'Email ou senha incorretos.');
            }
        }
    }

    /**
     * Logs in a user using the provided email and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Checks if the Usuarios is Active
    */
    public function validateAtivo($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = Usuarios::findByEmail($this->Email);

            if ($user->Ativo != '1') {
                $this->addError($attribute, 'Usuarios está Inativo.');
            }
        }
    }

    /**
     * Finds user by [[Email]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Usuarios::findByEmail($this->Email);
        }

        return $this->_user;
    }
}
