<?php

namespace app\models;

use yii\web\IdentityInterface;
use app\models\Personas;
use app\models\Empleados;
use yii\web\NotFoundHttpException;
use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $usuar_id
 * @property string $usuar_usuario
 * @property string $usuar_nombre
 * @property string $usuar_clave
 * @property string $usuar_correo_1
 * @property string $usuar_correo_2
 * @property string $usuar_tel_1
 * @property string $usuar_tel_2
 * @property string $usuar_ext_1
 * @property string $usuar_ext_2
 * @property int $usuar_relacion_id
 * @property string $usuar_relacion_nombre
 *  @property int $usuar_status


 * @property UsuarRol[] $usuarRols 
 */
class Usuarios extends \yii\db\ActiveRecord implements IdentityInterface {

    public $prefijo = 'usuar';
    public $id_field = 'usuar_id';
    public $updateAcc = 'usuarios/update';
    public $viewAcc = 'usuarios/view';
    public $deleteAcc = 'usuarios/delete';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['usuar_usuario', 'usuar_nombre', 'usuar_clave', 'usuar_correo_1'], 'required'],
            [['usuar_relacion_id'], 'integer'],
            [['usuar_usuario', 'usuar_nombre', 'usuar_clave', 'usuar_correo_1', 'usuar_correo_2'], 'string', 'max' => 48],
            [['usuar_tel_1', 'usuar_tel_2', 'usuar_ext_1', 'usuar_ext_2', 'usuar_relacion_nombre'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'usuar_id' => 'Usuar ID',
            'usuar_usuario' => 'Usuario',
            'usuar_nombre' => 'Nombre',
            'usuar_clave' => 'Clave',
            'usuar_correo_1' => 'Correo 1',
            'usuar_correo_2' => 'Correo 2',
            'usuar_tel_1' => 'Tel 1',
            'usuar_tel_2' => 'Tel 2',
            'usuar_ext_1' => 'Ext 1',
            'usuar_ext_2' => 'Ext 2',
            'usuar_relacion_id' => 'ID',
            'usuar_relacion_nombre' => 'Relación Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarRols() {
        return $this->hasMany(UsuarRol::className(), ['usuar_id' => 'usuar_id']);
    }

    public function getNombre() {
        return $this->usuar_nombre;
    }

    public function getSuper() {
        return $this->super;
    }

    public function isSuper() {
        $this->super = true;
    }

    public function notSuper() {
        $this->super = false;
    }

    public static function findIdentity($id) {
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        $user = static::findOne([$id]);
        if (!$user) {
            return null;
        } else {
            return new static($user);
            $dbUser = [
                'usuar_id' => $user->usuar_id,
                'usuar_usuario' => $user->usuar_usuario,
                'usuar_nombre' => $user->usuar_nombre,
                'usuar_clave' => $user->usuar_clave,
                'usuar_correo_1' => $user->usuar_correo_1,
                'usuar_correo_2' => $user->usuar_correo_2,
                'usuar_tel1' => $user->usuar_tel1,
                'usuar_ext1' => $user->usuar_ext1,
                'usuar_tel2' => $user->usuar_tel2,
                'usuar_ext2' => $user->usuar_ext2,
                'usuar_relacion_id' => $user->usuar_relacion_id,
                'usuar_relacion_nombre' => $user->usuar_relacion_nombre,
                'super' => $r];
            return new static($dbUser);
        };
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new \yii\base\NotSupportedException\NotSupportedException('No acceso por token NO se implenta');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        $result = static::findOne(['usuar_usuario' => $username]);
        
        return $result;
    }
    
    

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->usuar_id;
    }

    /**
     * 
     */
    public function getPerso() {
        $e = Empleados::find()->where(['emple_id'=>  $this->usuar_relacion_id])->one();        
/*
        throw new NotFoundHttpException('getPerso : relacion_id= ' . 
                $this->usuar_relacion_id . ' usar_id= ' . $this->usuar_id.  ' de E:  emple_usuario'. $e->emple_usuario . ' perso_id' .  $e->perso_id. ' nombre ' . $e->perso->perso_nombre );
 * */

        if ($e)
            return $e->perso_id;
        else
            throw new NotFoundHttpException('error en personas:getPerso:relacion_id= ' . $this->usuar_relacion_id . ' usar_id= ' . $this->usuar_id);
    }

    /**
     * 
     */
    public function getEmple() {
        return $this->usuar_relacion_id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return 1000;  /* $this->authKey; */
    }

    public function get() {
        return $this->usuar_correo_1;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password) {
    $emple = Empleados::find()->where(['emple_id'=>$this->usuar_relacion_id])->One();
    $activo = Variables::find()->where(['varia_tabla' => '*','varia_campo' => 'ESTADO', 'varia_cadena' => 'ACTIVO'])->One();
    if($emple){
        if($emple->estad_id == $activo->varia_id){
            
            return $this->usuar_clave === $password;
        }
    }
                
        
        
          //return Yii::$app->getSecurity()->validatePassword(  $password, $this->usuar_clave);
    }

}
