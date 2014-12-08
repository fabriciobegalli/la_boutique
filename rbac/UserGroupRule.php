<?php
namespace app\rbac;

use Yii;
use yii\rbac\Rule;

class UserGroupRule extends Rule
{
    public $name = 'userGroup';

    public function execute($user, $item, $params)
    {
        if (!\Yii::$app->user->isGuest) {
            $group = \Yii::$app->user->identity->getId();//TODO: group in login
            if ($item->name === 'admin') {
                return $group == 'admin';
            } elseif ($item->name === 'user') {
                return $group == 'user' || $group == 'admin';
            } elseif ($item->name === 'guest') {
                return $group == 'guest' || $group == 'user';
            }
        }
        return true;
    }
}
