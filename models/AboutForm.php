<?php
namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;
use yii\widgets\ActiveForm;


class AboutForm extends ActiveRecord
{
    public static function tableName()
    {
        return 'comment';
    }

    public function  attributeLabels()
    {
        return[
            'user'=>'Имя',
            'comment' => 'Комментарий',
        ];
    }

    public function rules()
    {
        return [
            [['user', 'comment'], 'required', 'message' => 'Обязательно для заполнения']
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
//    public function about()
//    {
//        if (!$this->validate()) {
//            return null;
//        }
//
//        $comment = new Comment();
//        $comment->user = $this->user;
//        $comment->comment = $this->comment;
//        $comment->generateAuthKey();
//
//        return $comment->save() ? $comment: null;
//    }
}