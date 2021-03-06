<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * ContactForm is the model behind the contact form.
 */
class Author extends ActiveRecord
{
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
        ];
    }

    public function getBooks()
    {
        return $this->hasMany(Book::class, ['id' => 'book_id'])
            ->viaTable(BookAuthor::tableName(), ['author_id' => 'id']);
    }

    public static function authorNameIds()
    {
        return ArrayHelper::map(Author::find()->asArray()->all(), 'id', 'name');
    }
}