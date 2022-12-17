<?php

/* @var $this yii\web\View */

$this->title = 'لوحة التحكم  -'.Yii::$app->name;
?>
<div class="site-index">

 
        <h1>لوحة التحكم  - <?=Yii::$app->name;?></h1>


         
			
			<div>
			
			<ul>
			<li><strong><?=t('topics')?></strong>  تستخدم لاضافة وتعديل التصنيفات الخاصة بالاخبار مثل أخبار,تقارير,مقالات ,... 
			<li><strong><?=t('websites')?></strong> هذة الادارة الخاصة بادارة المواقع الالكترونية الخاصة بمصادر الأخبار بعد اضافة الموقع يمكن اضافة اكثر من رابط تغذية ار اس اس   من ادارة الكوقع نفسها او من الادارة الاخرى 
			<li><strong><?=t('feeds')?></strong>تستخدم هذة الادارة لاضافة روابط التغذية والخاصة بالمواقع كما يمكن اضافتها من ادارة المواقع ايضا بعمل تعديل للموقع المحدد واضافة الروابط من هنا
			</ul>
			<table>
			<tr><td><span class="glyphicon glyphicon-eye-open"></span></td><td>ايقونة استعراض البيانات </td></tr>
			<tr><td><span class="glyphicon glyphicon-pencil"></span></td><td>ايقونة تعديل البيانات</td></tr>
			<tr><td><span class="glyphicon glyphicon-trash"></span></td><td>ايقونة الحذف</td></tr>
			<tr><td><span class="btn btn-success btn-xs">نشط</span></td><td> يعني ان الحالة  الان نشط اي فعال عند الضغط علية يعمل على تعطيل الحالة مثل توقيف موقع او رابط تغذية</td></tr>
			<tr><td><span class="btn btn-warning btn-xs">موقف</span></td><td> حالة المصدر موقف او غير فعال عند الضغط عليةيتم التنشيط </td></tr>
			</table>
			</div>
    </div>
