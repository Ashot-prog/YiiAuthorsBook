<?php

use yii\helpers\Html;

/* @var $author_id array */
/* @var $this yii\web\View */
/* @var $model common\models\Book */

$this->title = 'Create Book';
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'author_id' => $author_id,
    ]) ?>

</div>
