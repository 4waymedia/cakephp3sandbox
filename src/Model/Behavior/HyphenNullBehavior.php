<?php

namespace App\Model\Behavior;

use Cake\ORM\Behavior;

class HyphenNullBehavior extends Behavior
{
    public function initialize(array $config)
    {
        // Some initialization code here
    }

    public function replaceHyphen( $entity)
    {
        // Check each entity field for NULL types and unset
        foreach($entity->toArray() as $key=>$value)
        {
            if($value == '--' || $value == '---'){
                unset($entity->{$key});
            }

        }
    }

    public function beforeSave($event, $entity, $options)
    {
        $this->replaceHyphen($entity);
    }

}