<?php

use common\widgets\AuthorBooks;
use yii\helpers\Html;

$this->title = 'AuthorsBook';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= AuthorBooks::widget(['id' => \common\models\Author::findOne(3)]); ?>

</div>

