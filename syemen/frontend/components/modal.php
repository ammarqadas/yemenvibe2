<style>
.icon{float:right}#btn{background:#fefefe;padding:.5em 1em;margin:.4em auto;border:none}#btn{border-radius:5px}.modal{display:none;position:fixed;z-index:1;left:0;bottom:0;box-shadow:0 4px 8px 0 rgba(0,0,0,.2),0 6px 20px 0 rgba(0,0,0,.19);width:100%;background:#FAA21A;animation-name:abtm;animation-duration:0.7s}.mtitle span{font-size:x-large;color:darkred}.modal-content{color:#013437;text-align:center;font-weight:700;line-height:1.7em;font-size:large;width:95%;margin:.2em auto}
</style>

<div id="myModal" class="modal">
	  <div class="modal-content">
  <img class="icon" src="<?=assets()?>/image/apps100.png" alt="حمل التطبيق" />
	  	<h3> تصفح أسرع .. حجم أقل  ..تغطية شاملة</h3>

	 <div class="mtitle"> مع نسخة <span>فايب موبايل</span></div>
	<button id="btn"> <h3> جربها الأن </h3></button>
</div>
      <span class="close">&times;</span> 

</div>
<script>
var vdbjs;var timeout=7000;(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.async='async';js.src='<?=assets()?>/vdb2.js';fjs.parentNode.insertBefore(js,fjs);vdbjs=js}(document,'script','vdb2-js'));function isStand(){return(window.matchMedia('(display-mode: standalone)').matches)||(('standalone' in window.navigator)&&(window.navigator.standalone))}
var btnAdd=ById('btn');let deferredPrompt;var modal=ById('myModal');const hideM=()=>{modal.style.display='none'};const close=modal.querySelector('.close');close.addEventListener('click',hideM);function showp()
{let d;_db.get("showTimes").then(function(data){if(data.keyval<8)
{d={keyID:'showTimes',keyval:data.keyval+1};console.log('beforeinstallprompt data'+d);_db.put(d);setTimeout(function(){modal.style.display='block'},timeout)}}).catch(function(err){d={keyID:'showTimes',keyval:1};console.log('beforeinstallprompt catch data'+d);_db.put(d);setTimeout(function(){modal.style.display='block'},timeout)})}
window.addEventListener('DOMContentLoaded',()=>{window.addEventListener('beforeinstallprompt',(e)=>{console.log('beforeinstallprompt action');e.preventDefault();_db.get("appinstall").then(function(data){if(!data.keyval&&!isStand()&&navigator.onLine)
showp()}).catch(function(err){if(!isStand()&&navigator.onLine)
showp()});deferredPrompt=e});});
btnAdd.addEventListener('click',(e)=>{modal.style.display='none';deferredPrompt.prompt();deferredPrompt.userChoice.then((choiceResult)=>{deferredPrompt=null})});
window.addEventListener('appinstalled',(evt)=>{console.log('yemenVibe successfully installed')
gtag('event','apps_installing',{'userchoice':'success'});var data={keyID:'appinstall',keyval:!0};_db.put(data)})
</script> 

