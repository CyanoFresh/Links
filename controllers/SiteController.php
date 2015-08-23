<?php

namespace app\controllers;

use app\models\Link;
use Yii;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
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

    /**
     * Render homepage
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'model' => new Link(),
        ]);
    }

    /**
     * Render static About page
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Render static API page
     */
    public function actionApi()
    {
        return $this->render('api');
    }

    /**
     * Short URL via Ajax
     *
     * @return array Data
     * @throws BadRequestHttpException If model not validated
     */
    public function actionShort()
    {
        $model = new Link();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $model->save()) {
            $model->short_code = base_convert($model->id, 20, 36);
            $model->save(false);

            Yii::$app->response->format = Response::FORMAT_JSON;

            return [
                'shortUrl' => Url::to(['site/go', 'shortCode' => $model->short_code], true),
            ];
        }

        throw new BadRequestHttpException('Bad parameters');
    }

    /**
     * Redirect to the long url
     *
     * @param $shortCode
     * @return Response
     * @throws NotFoundHttpException If model with this short code doesn't exist
     * @see findModelByShortCode()
     */
    public function actionGo($shortCode)
    {
        $model = $this->findModelByShortCode($shortCode);

        return $this->redirect($model->long_url);
    }

    /**
     * Find model by short code
     *
     * @param $shortCode
     * @return null|Link
     * @throws NotFoundHttpException
     */
    protected function findModelByShortCode($shortCode)
    {
        $model = Link::findOne(['short_code' => $shortCode]);

        if (!$model) {
            throw new NotFoundHttpException('The requested link doesn\'t exist');
        }

        return $model;
    }
}
