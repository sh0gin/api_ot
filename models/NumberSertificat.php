<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "number_sertificat".
 *
 * @property int $id
 * @property int $student_id
 * @property int $course_id
 * @property string $number
 * @property string $clientId
 */
class NumberSertificat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'number_sertificat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'course_id', 'clientId'], 'required'],
            ['number', 'safe'],
            [['student_id', 'course_id'], 'integer'],
            [['number', 'clientId'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'course_id' => 'Course ID',
            'number' => 'Number',
            'clientId' => 'Client ID',
        ];
    }
}
