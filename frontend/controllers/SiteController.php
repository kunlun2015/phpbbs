<?php
/**
 * 首页
 * @authors: Amos (735767227@qq.com)
 * @date: 2017-08-04 17:45
 * @version $Id$
 */
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use frontend\models\Index;
use frontend\models\Posts;
use yii\web\NotFoundHttpException;

class SiteController extends AppController{

    private $indexModel;
    private $posts;

    public function init()
    {
        parent::init();
        $this->indexModel = new Index;
        $this->posts = new Posts;

    }

    public function actionError()
    {
        print_r(Yii::$app->errorHandler->exception);
        $exception = Yii::$app->errorHandler->exception;
        if($exception && isset($exception->statusCode) && $exception->statusCode === 404){
            return $this->tipsPage('404');
        }else{
            return $this->tipsPage('500');
        }
    }

    /**
     *首页
     * @return mixed
     */
    public function actionIndex()
    {
        $data['bannerList'] = $this->indexModel->bannerList($cateId=1);
        //左侧文章列表
        $data['leftList'] = $this->posts->recommendCateList(1, 10, 1, $totalPage);
        return $this->render('index', $data);
    }

    public function actionTest()
    {
        /*Yii::$app->set('mailer', [
            //配置邮箱'service@debugphp.com'
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport'=>[
                'class'=>'Swift_SmtpTransport',
                'host'=>'smtp.exmail.qq.com',
                'username'=>'service1@debugphp.com',
                'password'=>'2XpG6YBj7WDQyhEu',
                'port'=> 465,
                'encryption'=>'ssl',
            ],
        ]);
        var_dump(Yii::$app->mailer);*/
        /*$mail = Yii::$app->mailer->compose();
        $mail->setFrom('service@debugphp.com');
        $mail->setTo('735767227@qq.com');
        $mail->setSubject("test");
        $mail->setHtmlBody('test');
        $rst = $mail->send();
        var_dump($rst);*/
    }

}
