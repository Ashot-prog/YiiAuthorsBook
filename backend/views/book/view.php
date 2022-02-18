<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Book */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => ' author ',
                'format' => 'html',
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
            'created_at',
        ],
    ]) ?>

</div>
