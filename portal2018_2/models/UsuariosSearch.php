<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

/**
 * UsuariosSearch represents the model behind the search form of `app\models\Usuarios`.
 */
class UsuariosSearch extends Usuarios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuar_id', 'usuar_relacion_id'], 'integer'],
            [['usuar_usuario', 'usuar_nombre', 'usuar_clave', 'usuar_correo_1', 'usuar_correo_2', 'usuar_tel_1', 'usuar_tel_2', 'usuar_ext_1', 'usuar_ext_2', 'usuar_relacion_nombre'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Usuarios::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'usuar_id' => $this->usuar_id,
            'usuar_relacion_id' => $this->usuar_relacion_id,
        ]);

        $query->andFilterWhere(['like', 'upper (usuar_usuario)', 
            strtoupper($this->usuar_usuario)])
            ->andFilterWhere(['like', 'upper (usuar_nombre)', 
                strtoupper($this->usuar_nombre)])
            ->andFilterWhere(['like', 'upper (usuar_clave)', 
                strtoupper($this->usuar_clave)])
            ->andFilterWhere(['like', 'usuar_correo_1', $this->usuar_correo_1])
            ->andFilterWhere(['like', 'usuar_correo_2', $this->usuar_correo_2])
            ->andFilterWhere(['like', 'usuar_tel_1', $this->usuar_tel_1])
            ->andFilterWhere(['like', 'usuar_tel_2', $this->usuar_tel_2])
            ->andFilterWhere(['like', 'usuar_ext_1', $this->usuar_ext_1])
            ->andFilterWhere(['like', 'usuar_ext_2', $this->usuar_ext_2])
            ->andFilterWhere(['like', 'usuar_relacion_nombre', $this->usuar_relacion_nombre]);

        return $dataProvider;
    }
}
