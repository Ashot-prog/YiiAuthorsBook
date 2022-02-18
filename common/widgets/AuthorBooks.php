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
    public $id;
    public $model;

    public function rules()
    {
        return [
            [['id'], 'required'],
        ];
    }

    public function init()
    {
        parent::init();
        $this->model = Author::findOne($this->id);
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