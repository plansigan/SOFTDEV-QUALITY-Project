<?php

namespace backend\modules\internship\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\internship\models\Industryprofessors;

/**
 * IndustryprofessorsSearch represents the model behind the search form about `backend\modules\internship\models\Industryprofessors`.
 */
class IndustryprofessorsSearch extends Industryprofessors
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['username', 'firstname', 'lastname', 'company_id', 'email', 'contact_num'], 'safe'],
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
        $query = Industryprofessors::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		
		$query->joinWith('company');
		
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'contact_num', $this->contact_num])
            ->andFilterWhere(['like', 'industry_partners.company_name', $this->company_id]);			

        return $dataProvider;
    }
}
