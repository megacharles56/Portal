<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Personas;

/**
 * PersonasSearch represents the model behind the search form of `app\models\Personas`.
 */
class PersonasSearch extends Personas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perso_id', 'estad_id', 'autor', 'domic_id'], 'integer'],
            [['modificacion', 'historia', 'perso_nombre1', 'perso_nombre2', 'perso_nombre3', 'perso_paterno', 'perso_materno', 'perso_titulo', 'perso_sobrenombre', 'perso_rfc', 'perso_curp', 'perso_nombre', 'perso_nacionalidad', 'perso_fecha_nacimiento', 'perso_sexo'], 'safe'],
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
        $query = Personas::find();

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
            'perso_id' => $this->perso_id,
            'modificacion' => $this->modificacion,
            'estad_id' => $this->estad_id,
            'autor' => $this->autor,
            'domic_id' => $this->domic_id,
        ]);

        $query->andFilterWhere(['like', 'historia', $this->historia])
            ->andFilterWhere(['like', 'perso_nombre1', strtoupper($this->perso_nombre1)])
            ->andFilterWhere(['like', 'perso_nombre2', strtoupper($this->perso_nombre2)])
            ->andFilterWhere(['like', 'perso_nombre3', strtoupper($this->perso_nombre3)])
            ->andFilterWhere(['like', 'perso_paterno', strtoupper($this->perso_paterno)])
            ->andFilterWhere(['like', 'perso_materno', strtoupper($this->perso_materno)])
            ->andFilterWhere(['like', 'perso_titulo', $this->perso_titulo])
            ->andFilterWhere(['like', 'perso_sobrenombre', $this->perso_sobrenombre])
            ->andFilterWhere(['like', 'perso_rfc', strtoupper($this->perso_rfc)])
            ->andFilterWhere(['like', 'perso_curp', strtoupper($this->perso_curp)])
            ->andFilterWhere(['like', 'perso_nombre', strtoupper($this->perso_nombre)])
            ->andFilterWhere(['like', 'perso_nacionalidad', strtoupper($this->perso_nacionalidad)])
            ->andFilterWhere(['like', 'perso_fecha_nacimiento', $this->perso_fecha_nacimiento])
            ->andFilterWhere(['like', 'perso_sexo', $this->perso_sexo]);

        return $dataProvider;
    }
}
