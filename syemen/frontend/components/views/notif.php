<style>
#notf{max-width:300px;top:.3em;left:15%;background:#FFC107}
</style>
<!-- The notif -->
<div class="in">
<div id="notf" class="nt hide">
<div class="i0">
	  	<h5> أخبار جديدة متوفرة </h5>
		<span id="ref">  تحديث</span>
</div>
<span class="close">&times;</span> 
</div>
</div>
<script>
(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.async='async';js.src='<?=assets()?>/vdb2.js';fjs.parentNode.insertBefore(js,fjs);vdbjs=js}(document,'script','vdb2-js'));const showRef=()=>{const notf=ById('notf');notf.style.display='flex';const close=notf.querySelector('.close');const hideNotif=()=>{notf.style.display='none'};close.addEventListener('click',hideNotif);const refresh=notf.querySelector('#ref');refresh.addEventListener('click',()=>{hideNotif();navigator.serviceWorker.controller.postMessage(JSON.stringify({type:'refresh',url:window.location.href}));window.location.reload()})};window.addEventListener('load',()=>{navigator.serviceWorker.addEventListener('message',(event)=>{if(!event.data)return;var dt=JSON.parse(event.data);console.log('data'+dt);console.log('dt type'+dt.type);const isNotif=dt.type==='showNotif';var lastd=dt.LastMod;_db.get("lastMod").then(function(lastMod){const isNew=lastMod!==dt.LastMod;if(isNotif&&isNew)
{console.log('data lastMod'+dt.LastMod);showRef();d={keyID:'lastMod',keyval:dt.LastMod};_db.put(d)}}).catch((e)=>{console.log('notif error :'+e.message);d={keyID:'lastMod',keyval:dt.LastMod};_db.put(d)})})});
</script>
