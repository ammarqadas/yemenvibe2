<style>
@keyframes atop{from {top:-300px;opacity:0}to {top:0;opacity:1}}@keyframes abtm{from {bottom:-300px;opacity:0}to {bottom:0;opacity:1}}.close { float:left;margin-left:.3em;font-weight:bold;font-size:3em}.close:hover{color:red;cursor:pointer}
#share{left:1%;bottom:0;background:#f9f6f6;animation-name:abtm;animation-duration:0.7s;text-align:center;border:3px solid #faa21b;border-radius:4px}#share h4{font-size:unset;color:blue}.sm a:hover span{opacity:.7}
.nt{position:fixed;width:96%;z-index:1;animation-duration:.7s}
</style>
<div id="share" class=" nt hide">
<span class="close">&times;</span>
<?=$this->render('_social',['title'=>$title,'url'=>$url,'turl'=>$turl])?>
</div><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script>
var fbjs;var fmodal=ById('share');const hideF=()=>{fmodal.style.display='none'};const fclose=fmodal.querySelector('.close');fclose.addEventListener('click',hideF);document.addEventListener("DOMContentLoaded",function(){setTimeout(function(){fmodal.style.display='block'},1000)});
</script>
