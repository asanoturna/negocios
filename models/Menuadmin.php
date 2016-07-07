<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_items".
 *
 * @property integer $id
 * @property string $name
 * @property string $label
 * @property string $icon
 * @property string $url
 * @property integer $visible
 * @property string $options
 * @property integer $parent_id
 */
class Menuadmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'label'], 'required'],
            [['visible', 'parent_id'], 'integer'],
            [['options'], 'string'],
            [['name', 'label'], 'string', 'max' => 50],
            [['icon'], 'string', 'max' => 25],
            [['url'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'label' => 'Label',
            'icon' => 'Icon',
            'url' => 'Url',
            'visible' => 'Visible',
            'options' => 'Options',
            'parent_id' => 'Parent ID',
        ];
    }
}
