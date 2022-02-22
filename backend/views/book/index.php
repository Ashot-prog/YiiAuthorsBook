<?php

use common\models\Author;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\controllers\BookController;

$this->title = 'Book';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'attribute' => 'authors',
                'format' => 'raw',
                'filter' => Author::authorNameIds(),
                'label' => 'Author',
                'value' => function (\common\models\Book $model) {
                    $html = '<ul>';
                    //     echo '<pre>';print_r($model->id);

                    foreach ($model->authors as $author) {
                        $html .= '<li>' . $author->name . '</li>';
                    }
                    $html .= '</ul>';

                    return $html;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

