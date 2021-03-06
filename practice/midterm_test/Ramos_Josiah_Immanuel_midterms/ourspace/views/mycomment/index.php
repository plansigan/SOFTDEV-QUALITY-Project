<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\mycommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mycomment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create a comment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [

                'attribute'=>'myaddress_id', 
                'value' => 'myaddress.lastname',
            ],
            'myaddress.lastname',
            'author',
            'body:ntext',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
