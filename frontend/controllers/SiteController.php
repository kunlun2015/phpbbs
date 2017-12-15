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
use frontend\models\Tags;
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

    /**
     *首页
     * @return mixed
     */
    public function actionIndex()
    {
        //轮播图
        $data['bannerList'] = $this->indexModel->bannerList($cateId=1);
        //左侧文章列表
        $data['leftList'] = $this->posts->recommendCateList(1, 10, 1, $leftTotalPage);
        //左侧上文章列表
        $data['leftTopList'] = $this->posts->recommendCateList(2, 10, 1, $leftTopTotalPage);
        //首页上右侧上
        $data['topRightTopList'] = $this->posts->recommendCateList(3, 2, 1, $topRightTopTotalPage);
        //首页上右侧下
        $data['topRightBottomList'] = $this->posts->recommendCateList(4, 8, 1, $topRightBottomListTotalPage);
        //标签
        $data['tagsList'] = (new Tags)->tagsList(1, 1, 10, $tagsToalPage);
        //行业资讯
        $data['industryNews'] = $this->posts->postList(6, 0, '', 0, '', '', 1, 10, $industryNewsTotalPage);
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
        /*$mail = Yii::$app->mailer->compose(['html' => 'registerActive'], ['activeLink' => 'http://www.lovehpy.com']);
        $mail->setFrom('service@debugphp.com');
        $mail->setTo('735767227@qq.com');
        $mail->setSubject("subject");
        //$mail->setHtmlBody('test content');
        $rst = $mail->send();
        var_dump($rst);*/
    }

}
