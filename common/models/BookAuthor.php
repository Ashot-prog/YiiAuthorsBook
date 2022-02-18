<?php

namespace common\models;

use Yii;
use yii\base\BaseObject;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class BookAuthor extends ActiveRecord
{

    public static function tableName()
    {
        return 'books_authors';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['book_id', 'author_id'], 'required'],
        ];
    }

    public static function createBookAuthors($book, $id)
    {
        $authorsBook = new BookAuthor();
        $authorsBook->book_id = $book->id;
        $authorsBook->author_id = $id;
        return $authorsBook->save();
    }
}