<?php
namespace backend\models;

use Yii;
use common\models\LoginForm;
use common\models\User;
/**
 * Login form
 */
class AdminLoginForm extends LoginForm
{

    private $_user;
    public function getUser()
    {
        if ($this->_user === null ) {
            $this->_user = User::findByUsername($this->username);
            if (!Yii::$app->authManager->checkAccess($this->_user->id,'admin')) {
                $this->_user = null;
            }
        }
        return $this->_user;
    }
}
