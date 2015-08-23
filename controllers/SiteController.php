<?php

namespace app\controllers;

use app\models\Link;
use Yii;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'model' => new Link(),
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionApi()
    {
        return $this->render('api');
    }

    public function actionShort()
    {
        $model = new Link();

        if ($model->load(Yii::$app->request->post()) and $model->validate()) {
            $model->short_code = Yii::$app->security->generateRandomString(4);
            $model->save(false);

            Yii::$app->response->format = Response::FORMAT_JSON;

            return [
                'shortUrl' => Url::to(['site/go', 'shortCode' => $model->short_code], true),
                'longUrl' => $model->long_url,
                'id' => $model->id,
            ];
        }

        throw new BadRequestHttpException('Bad parameters');
    }

    public function actionGo($shortCode)
    {
        $model = Link::findOne(['short_code' => $shortCode]);
        /** @var $model Link */

        if (!$model) {
            throw new NotFoundHttpException('Requested link doesn\'t exist');
        }

        return $this->redirect($model->long_url);
    }
}
