<?php

use yii\db\Migration;

/**
 * Class m220221_092715_add_forign_key_books_authors_table
 */
class m220221_092715_add_forign_key_books_authors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-books_authors-author_id',
            'books_authors',
            'author_id'
        );

        $this->addForeignKey(
            'fk-books_authors-author_id',
            'books_authors',
            'author_id',
            'authors',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-books_authors-book_id',
            'books_authors',
            'book_id'
        );

        $this->addForeignKey(
            'fk-books_authors-book_id',
            'books_authors',
            'book_id',
            'books',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-books_authors-author_id',
            'post'
        );

        $this->dropForeignKey(
            'fk-books_authors-book_id',
            'post'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220221_092715_add_forign_key_books_authors_table cannot be reverted.\n";

        return false;
    }
    */
}
