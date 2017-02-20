<?php

namespace app\modules\productivity\models;
use app\models\User;
use app\models\Location;

use Yii;

class Product extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'product';
    }

    // calculation
    public static $Static_calculation = [
        'Por Comissão',
        'Por Prazo',
        ];   
    public function getCalculation()
    {
        if ($this->calculation_type === null) {
            return null;
        }
        return self::$Static_calculation[$this->calculation_type];
    }

    public function rules()
    {
        return [
            [['name', 'description', 'label'], 'required'],
            [['is_active','parent_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['min_value', 'max_value'], 'number'],
            [['description'], 'string', 'max' => 100]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Produto',
            'label' => 'Título da Categoria',
            'name' => 'Produto',
            'description' => 'Descrição',
            'is_active' => 'Ativo',
            'calculation_type' => 'Tipo de Calculo',
            'min_value' => 'Comissão Mínima',
            'max_value' => 'Comissão Máxima',
            'min_time' => 'Prazo Mínimo',
            'max_time' => 'Prazo Máximo',
        ];
    }
    public static function getHierarchy() {
        $options = [];
         
        $parents = self::find()->where(['parent_id' => null, 'is_active' => 1])->all();
        foreach($parents as $id => $p) {
            $children = self::find()->where("parent_id=:parent_id", [":parent_id"=>$p->id])->all();
            $child_options = [];
            foreach($children as $child) {
                $child_options[$child->id] = $child->name;
            }
            $options[$p->name] = $child_options;
        }
        return $options;
    }

    public function getParent()
    {
        return $this->hasOne(Product::className(), ['id' => 'parent_id']);
    }   
         
}
