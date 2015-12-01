<?php

namespace app\controllers;

use amnah\yii2\user\controllers\DefaultController as BaseUserController;
use Yii;
use app\models\UserKeychain;
use yii\web\Response;
use yii\widgets\ActiveForm;


class UserController extends BaseUserController{

    public function init(){
        parent::init();
        Yii::$app->i18n->translations['user'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@app/messages',
            //'forceTranslation' => true,
        ];
    }

    public function actionAuth(){
        return "wrong!";
    }

    /**
     * Account
     */
    public function actionAccount()
    {

        /** @var \amnah\yii2\user\models\User $user */
        /** @var \amnah\yii2\user\models\UserToken $userToken */

        // set up user and load post data
        $user = Yii::$app->user->identity;
        $user->setScenario("account");
        $loadedPost = $user->load(Yii::$app->request->post());

        // validate for ajax request
        if ($loadedPost && Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($user);
        }

        // validate for normal request
        $userToken = $this->module->model("UserToken");
        if ($loadedPost && $user->validate()) {

            // check if user changed his email
            $newEmail = $user->checkEmailChange();
            if ($newEmail) {
                $userToken = $userToken::generate($user->id, $userToken::TYPE_EMAIL_CHANGE, $newEmail);
                if (!$numSent = $user->sendEmailConfirmation($userToken)) {

                    // handle email error
                    //Yii::$app->session->setFlash("Email-error", "Failed to send email");
                }
            }

            // save, set flash, and refresh page
            $user->save(false);
            Yii::$app->session->setFlash("Account-success", "Senha Alterada com sucesso");
            return $this->refresh();
        } else {
            $userToken = $userToken::findByUser($user->id, $userToken::TYPE_EMAIL_CHANGE);
        }

        return $this->render("account", compact("user", "userToken"));
    }
}