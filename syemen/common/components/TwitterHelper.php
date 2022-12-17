<?php
namespace common\components;

 
 
class TwitterHelper  {
	

 function n($single, $plural, $number) {
  return 1 === $number ? $single : $plural;
}
public static function time_ago($from, $to = '', $text = true) {
 
    if (empty($to)) $to = time();
    $diff = (int) abs($to - $from);
	
	if ($diff < 20) {
            return \Yii::t('main', 'Few seconds ago');
        } // Seconds ago
  elseif ($diff < 60) {
            return \Yii::t('main', '{0, plural, =1{one second ago} other{# seconds ago}}', $diff);
        } // Minutes ago
    elseif ($diff < 3600) {
      $mins = round($diff / 60);
    
      /* translators: min=minute */
    //  $since = sprintf(self::n('%s دقيقة', '%s دقائق', $mins), $mins);
	     return \Yii::t('main', '{0, plural, =1{1 minute ago} other{# minutes ago}}', $mins);
    }
    elseif ($diff < 86400 && $diff >= 3600) {
      $hours = round($diff / 3600);
      if ($hours <= 1)
        $hours = 1;
      //$since = sprintf(self::n('%s ساعة', '%s ساعات', $hours), $hours);
	    return \Yii::t('main', '{0, plural, =1{1 hour ago} other{# hours ago}}', $hours);
    }//604800
    elseif ($diff < 259200 && $diff >= 86400) {
      $days = round($diff / 86400);
      if ($days <= 1)
        $days = 1;
     // $since = sprintf(self::n('%s يوم', '%s أيام', $days), $days);
	   return \Yii::t('main', '{0, plural, =1{1 day ago} other{# days ago}}', $days);
    }
	else 
	{
		return \Yii::$app->formatter->asDate($from, 'php:d M');
		
	}
   
}
}
?>