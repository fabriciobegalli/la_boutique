<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use app\rbac\UserGroupRule;
use app\models\config\Permissions;


class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $accessStore = $auth->createPermission(Permissions::AccessStore);
        $accessStore->description = 'Access store';
        $auth->add($accessStore);

        $accessAdminModule = $auth->createPermission(Permissions::AccessAdminModule);
        $accessAdminModule->description = 'Access admin module';
        $auth->add($accessAdminModule);

        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $accessStore);


        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $accessAdminModule);
        $auth->addChild($admin, $user);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($user, 2);
        $auth->assign($admin, 1);
    }
}