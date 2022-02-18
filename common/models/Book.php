<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * @var $authors Author[]
 * ContactForm is the model behind the contact form.
 */
class Book extends ActiveRecord
{
    public $author_id;

    /**
     * @return array the validation rules.
     */
    public static function tableName()
    {
        return 'books';
    }

    public function rules()
    {
        return [
            [['name', 'author_id'], 'required'],
        ];
    }

    public function getBookAuthors()
    {
        return $this->hasMany(BookAuthor::class, ['book_id' => 'id']);
    }

    public function getAuthors()
    {
        return $this->hasMany(Author::class, ['id' => 'author_id'])
            ->viaTable(BookAuthor::tableName(), ['book_id' => 'id']);
    }

    public function GetAuthorsId()
    {
        $authors = [];
        foreach ($this->authors as $author) {
            $authors[] = $author->id;
        }
        return $authors;

    }
}