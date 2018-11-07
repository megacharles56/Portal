<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vempleados".
 *
 * @property int $emple_id
 * @property int $autor
 * @property string $historia
 * @property string $modificacion
 * @property int $estad_id
 * @property int $perso_id
 * @property int $emple_num_nomina
 * @property string $emple_nss
 * @property int $perpu_id
 * @property string $emple_horario
 * @property string $emple_jornada_laboral
 * @property string $emple_descanso_semanal
 * @property string $emple_terminacion_contrato
 * @property string $emple_usuario
 * @property string $emple_clave_sistemas
 * @property string $pemodificacion
 * @property int $peestadoid
 * @property int $peautor
 * @property resource $pehistoria
 * @property string $perso_nombre1
 * @property string $perso_nombre2
 * @property string $perso_nombre3
 * @property string $perso_paterno
 * @property string $perso_materno
 * @property string $perso_titulo
 * @property string $perso_sobrenombre
 * @property string $perso_rfc
 * @property string $perso_curp
 * @property string $perso_nombre
 * @property string $perso_nacionalidad
 * @property string $perso_fecha_nacimiento
 * @property string $perso_sexo
 * @property string $peestado
 * @property string $penombre_autor
 * @property string $iniciales
 * @property string $perpu_nombre_completo
 * @property int $estor_id
 * @property string $estor_nombre_completo
 * @property string $estor_superior
 * @property string $estor_sup_nombre_completo
 * @property string $jfenombre
 * @property int $jfeempl_id
 * @property string $estado
 * @property string $nombre_autor
 */
class Vempleados extends \yii\db\ActiveRecord {

    public $prefijo = 'emple';
    public $id_field = 'emple_id';
    public $updateAcc = 'empleados/update';
    public $viewAcc = 'empleados/view';
    public $deleteAcc = 'empleados/delete';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'vempleados';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['emple_id', 'autor', 'estad_id', 'perso_id', 'emple_num_nomina', 'perpu_id', 'peestadoid', 'peautor', 'estor_id', 'jfeempl_id'], 'integer'],
            [['historia', 'emple_terminacion_contrato', 'pehistoria', 'perso_fecha_nacimiento', 'iniciales', 'perpu_nombre_completo', 'estor_nombre_completo', 'estor_superior', 'estor_sup_nombre_completo', 'jfenombre', 'nombre_autor'], 'string'],
            [['modificacion', 'pemodificacion'], 'safe'],
            [['emple_horario', 'emple_jornada_laboral', 'emple_descanso_semanal', ], 'string', 'max' => 48],
            [['emple_usuario', 'emple_clave_sistemas', 'perso_nombre1', 'perso_nombre2', 'perso_nombre3', 'perso_paterno',
                'perso_materno', 'perso_titulo', 'perso_sobrenombre', 'perso_nacionalidad'], 'string', 'max' => 24],
            [['perso_rfc'], 'string', 'max' => 13],
            [['perso_curp'], 'string', 'max' => 18],
            [['perso_nombre', 'penombre_autor'], 'string', 'max' => 256],
            [['perso_sexo', 'emple_nss'], 'string', 'max' => 12],
            [['peestado', 'estado'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'emple_id' => '# Empleado',
            'autor' => '# Autor',
            'historia' => 'Historia',
            'modificacion' => 'Modificación',
            'estad_id' => '# Estado',
            'perso_id' => '# Persona',
            'emple_num_nomina' => 'Num. Nomina',
            'emple_nss'=> 'NSS',
            'perpu_id' => '# Perfil de puesto ',
            'emple_horario' => 'Horario',
            'emple_jornada_laboral' => 'Jornada Laboral',
            'emple_descanso_semanal' => 'Descanso Semanal',
            'emple_terminacion_contrato' => 'Terminacion Contrato',
            'emple_usuario' => 'Usuario',
            'emple_clave_sistemas' => 'Clave Sistemas',
            'pemodificacion' => 'Modificacion persona',
            'peestadoid' => '# Estado persona',
            'peautor' => '# Autor Persona',
            'pehistoria' => 'Historia Persona',
            'perso_nombre1' => 'Nombre1',
            'perso_nombre2' => 'Nombre2',
            'perso_nombre3' => 'Nombre3',
            'perso_paterno' => 'Paterno',
            'perso_materno' => 'Materno',
            'perso_titulo' => 'Titulo',
            'perso_sobrenombre' => 'Sobrenombre',
            'perso_rfc' => 'R.F.C.',
            'perso_curp' => 'C.U.R.P.',
            'perso_nombre' => 'Nombre',
            'perso_nacionalidad' => 'Nacionalidad',
            'perso_fecha_nacimiento' => 'Fecha Nacimiento',
            'perso_sexo' => 'Sexo',
            'peestado' => '# Estado persona',
            'penombre_autor' => 'Nombre de Autor de persona',
            'iniciales' => 'Iniciales',
            'perpu_nombre_completo' => 'Perfil de puesto',
            'estor_id' => '# Estructura orgánica',
            'estor_nombre_completo' => 'Estructura orgánica',
            'estor_superior' => '# Estructura orgánica superior',
            'estor_sup_nombre_completo' => 'Estructura orgánica superior',
            'jfenombre' => 'Nombre del superior',
            'jfeempl_id' => '# Jefe',
            'estado' => 'Estado',
            'nombre_autor' => 'Nombre Autor',
            'emple_ingreso' => 'Fecha de Ingreso',
            'emple_cantidad_dias' => 'Cantidad de Dias',
            'emple_antiguedad' => 'Antiguedad',
            'usuar_tel_1'=> 'Teléfono 1',
            'usuar_tel_2'=> 'Teléfono 2',
            'usuar_ext_1'=> 'Ext 1',
            'usuar_ext_2'=> 'Ext 2',
            'usuar_correo_1'=> 'Correo 1',
            'usuar_correo_2'=> 'Correo 2',
        ];
    }

    public function actionPidePermiso() {
        $htmlContent = $this->renderPartial($despliegue, ['model' => $model, 'imag' => $fileImg]);
        $pdf = Yii::$app->pdf;
        $pdf->content = $htmlContent;
        $pdf->destination = Pdf::DEST_FILE;
        $pdf->filename = $d . "$imagen.pdf";
        $pdf->render();
        $message = Yii::$app->mailer->compose();
        $message->setFrom(['agarcilazo@ccmexico.com.mx' => 'CANACO Cd de México'])
                ->setTo($model->regis_correo_electronico)
                ->setSubject($model->event->event_subject1)
                ->setTextBody($model->event->event_texto1)
                ->setHtmlBody('Anexo esta su pre-registro '
                        . '<span style"font-weight: strong">Instrucciones</span>' . $direct);
        $message->attach($pdf->filename);
        $message->send();
    }

    
      /**
     * @inheritdoc$primaryKey
     */
    public static function primaryKey()
    {
        return ["emple_id"];
    }
    
}
