<?php
namespace app\commands;
 
use Yii;
use yii\console\Controller;
use \app\rbac\UserGroupRule;
 
class RbacController extends Controller
{
    public function actionInit()
    {
        $authManager = Yii::$app->authManager;
 
        // Create roles
        $guest = $authManager->createRole('guest');
        //$user = $authManager->createRole('user');
        //$admin = $authManager->createRole('admin');
 
        // Create simple, based on action{$NAME} permissions
       /* $login  = $authManager->createPermission('login');
        $logout = $authManager->createPermission('logout');
        $error  = $authManager->createPermission('error');
        $signUp = $authManager->createPermission('sign-up');
        $index  = $authManager->createPermission('index');
        $view   = $authManager->createPermission('view');
        $update = $authManager->createPermission('update');
        $delete = $authManager->createPermission('delete');
 
        // Add permissions in Yii::$app->authManager
        $authManager->add($login);
        $authManager->add($logout);
        $authManager->add($error);
        $authManager->add($signUp);
        $authManager->add($index);
        $authManager->add($view);
        $authManager->add($update);
        $authManager->add($delete);
 
 
        // Add rule, based on UserExt->group === $user->group
        $userGroupRule = new UserGroupRule();
        $authManager->add($userGroupRule);
 
        // Add rule "UserGroupRule" in roles
        $guest->ruleName  = $userGroupRule->name;
        $user->ruleName  = $userGroupRule->name;
        $admin->ruleName  = $userGroupRule->name;
 
        // Add roles in Yii::$app->authManager
        $authManager->add($guest);
        $authManager->add($user);
        $authManager->add($admin);
 
        // Add permission-per-role in Yii::$app->authManager
        // Guest
        $authManager->addChild($guest, $login);
        $authManager->addChild($guest, $logout);
        $authManager->addChild($guest, $error);
        $authManager->addChild($guest, $signUp);
        $authManager->addChild($guest, $index);
        $authManager->addChild($guest, $view);
 
        // user
        $authManager->addChild($user, $update);
        $authManager->addChild($user, $guest);
 
        // Admin
        $authManager->addChild($admin, $delete);
        $authManager->addChild($admin, $user);
*/

        $authManager->removeAll(); //удаляем старые данные
        //Создадим для примера права для доступа к админке
        //Включаем наш обработчик
        $rule = new UserGroupRule();
        $authManager->add($rule);
        //Добавляем роли
        $user = $authManager->createRole('user');
        $user->description = 'Пользователь';
        $user->ruleName = $rule->name;
        $authManager->add($user);
        //Добавляем потомков
        $admin = $authManager->createRole('admin');
        $admin->description = 'Администратор';
        $admin->ruleName = $rule->name;
        $authManager->add($admin);
    
        $guest->ruleName  = $rule->name;
        
        // Add roles in Yii::$app->authManager
        $authManager->add($guest);
    }

    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }
}