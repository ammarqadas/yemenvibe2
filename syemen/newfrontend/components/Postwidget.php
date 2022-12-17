<?php
namespace frontend\components;
use yii\base\Widget;
use backend\modules\post\models\Post;
use yii;


class PostWidget extends Widget
{
	protected $posts;
	public $limit;

    public function init()
    {
		parent::init();
		$this->posts = Post::find()->select(['id','title','views','created_at','img'])->where(['status'=>1])->orderBy('created_at desc')->limit($this->limit)->asArray()->all();    
    }

    public function run()
    {
		return $this->render('posts',['posts'=>$this->posts]);
	}
}