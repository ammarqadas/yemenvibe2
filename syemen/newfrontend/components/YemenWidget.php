<?phpnamespace newfrontend\components;use yii\base\Widget;use common\models\Items;use yii;class YemenWidget extends Widget{	//public $limit = 6;	protected $items;	public $fromDate;    public $toDate;    public $limit =0;	public $type="aside";    public function init()    {		parent::init();		$itemq = Items::find()->select(['Items.id','feedId','Items.title','Items.url','read','itemDate','enclosureUrl','content','Items.slug'])->innerJoinWith(							[								'feed' => function ($query) {								$query->select(['Feeds.id','Feeds.cat','Feeds.resID'])->innerJoinWith(['res'=>function($q){$q->select(['Res.id','rName']);}
,'topics',]);								}
,							]);//->where('itemDate >= '.strtotime('-1 days'))->orderBy('read desc ,itemDate desc')->limit(6)->asArray()->all();if($this->limit)$itemq->limit($this->limit);$this->items =$itemq->where('ItemDate > '.strtotime($this->fromDate).' and ItemDate <= '.strtotime($this->toDate))//->andWhere(['Res.scrap' => true])->orderBy('read desc')->asArray()->all();			    }
    public function run()    {
		if($this->type=='aside')		return $this->render('yemen',['items'=>$this->items]);
	return $this->render('yemen2',['items'=>$this->items]);
		;	}
}
