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

class SiteController extends AppController{

    private $indexModel;

    public function init()
    {
        parent::init();
        $this->indexModel = new Index;
    }

    /**
     *首页
     * @return mixed
     */
    public function actionIndex()
    {
        $data['bannerList'] = $this->indexModel->bannerList($cateId=1);
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
