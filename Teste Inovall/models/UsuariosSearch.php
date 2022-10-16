<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

/**
 * UsuariosSearch represents the model behind the search form of `app\models\Usuarios`.
 */
class UsuariosSearch extends Usuarios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Ativo'], 'integer'],
            [['Usuario', 'Senha', 'Nome', 'CPF', 'Email', 'Telefone', 'Foto', 'Data_de_Nascimento', 'CEP', 'Endereco', 'Complemento', 'Bairro', 'Cidade', 'Estado'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
            'Id' => $this->Id,
            'Ativo' => $this->Ativo,
        ]);

        $query->andFilterWhere(['like', 'Usuario', $this->Usuario])
            ->andFilterWhere(['like', 'Senha', $this->Senha])
            ->andFilterWhere(['like', 'Nome', $this->Nome])
            ->andFilterWhere(['like', 'CPF', $this->CPF])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Telefone', $this->Telefone])
            ->andFilterWhere(['like', 'Foto', $this->Foto])
            ->andFilterWhere(['like', 'Data_de_Nascimento', $this->Data_de_Nascimento])
            ->andFilterWhere(['like', 'CEP', $this->CEP])
            ->andFilterWhere(['like', 'Endereco', $this->Endereco])
            ->andFilterWhere(['like', 'Complemento', $this->Complemento])
            ->andFilterWhere(['like', 'Bairro', $this->Bairro])
            ->andFilterWhere(['like', 'Cidade', $this->Cidade])
            ->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
