<?php


namespace common\widgets;

use common\models\Author;
use common\models\BookSearch;
use yii\base\BaseObject;
use yii\base\Widget;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;

class AuthorBooks extends Widget
{
    public $model;

    public function init()
    {
        parent::init();
        if (is_null($this->model)){
            $this->model = Author::findOne($this->id);
        }
    }

    public function run()
    {
        parent::run();
        $dataProvider = new ActiveDataProvider(['query' => $this->model->getBooks()]);

        return $this->render('authorBooks', [
            'dataProvider' => $dataProvider,
        ]);
    }
}