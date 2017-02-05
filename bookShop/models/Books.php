<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $book_title
 * @property string $short_description
 * @property double $price
 * @property integer $category_id
 * @property integer $author_book_id
 *
 * @property Authorsbooks $authorBook
 * @property Category $category
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_title', 'short_description', 'price'], 'required'],
            [['short_description'], 'string'],
            [['price'], 'number'],
            [['category_id', 'author_book_id'], 'integer'],
            [['book_title'], 'string', 'max' => 100],
            [['author_book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Authorsbooks::className(), 'targetAttribute' => ['author_book_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_title' => 'Book Title',
            'short_description' => 'Short Description',
            'price' => 'Price',
            'category_id' => 'Category ID',
            'author_book_id' => 'Author Book ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorBook()
    {
        return $this->hasOne(Authorsbooks::className(), ['id' => 'author_book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
