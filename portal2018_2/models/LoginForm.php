<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Usuarios;
use yii\web\NotFoundHttpException;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model {

    public $username;
    public $password;
    public $rememberMe = true;
    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login() {
        if ($this->validate()) {
            
            $r = \Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 : 0);
            /*
            if ($r) {
                Yii::$app->user->identity->notSuper();
                $tipoUsr = Yii::$app->user->identity->usuar_relacion_nombre;
                Yii::$app->params['super'] = false;
                Yii::trace('param super' .  Yii::$app->params['super']);
          
                if ($tipoUsr == 'personal_canaco') {// administrador puede hacer todo
                    $aplicacion = Aplicaciones::find()->where(['aplic_nombre' => 'Sistemas'])->one();
                    $apers = AplicacionPersonal::find()->where(['perca_id' => Yii::$app->user->identity->usuar_relacion_id, 'aplic_id' => $aplicacion->aplic_id])->one();
                    Yii::$app->params['super'] = ($apers && ($apers->apers_rol == 'ADMINISTRADOR'));
                    

                    
                }
             * 
             */
                return $r;
//            }
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser() {
        $this->_user = Usuarios::findByUsername($this->username);
        return $this->_user;
    }

    public function attributeLabels() {
        return [
            'username' => 'Usuario',
            'password' => 'Clave'
        ];
    }

}
