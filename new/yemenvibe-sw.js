//verstion=V4.3
var CACHE_NAME = 'yemenvibe-static';
let fget=true;
var cacheFirstFiles = [
'/f/s.css',
'/static/image/logo2.svg',
//'/static/image/apps100.png',
'/f/syi.woff2',
'/f/syi.woff',
'/f/syi.svg',
'/f/syi.eot',
'/f/syi.ttf',
'/manifest.json',
'/images/Icon-144.png',
'/images/Icon-192.png',
'/static/vdb2.js'
];
var networkFirstFiles = [
'/',
//'/?',
'/standalone',
'/index.php'
];
self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME).then(cache => {
	//	console.log('install action');
      return cache.addAll(cacheFirstFiles);
    }).then(function() {
   //     console.log('WORKER: install completed');
		return self.skipWaiting();
      })
  );
});

self.addEventListener('activate', function(e) {
  //console.log('[ServiceWorker] Activate');
  return self.clients.claim();
});
self.addEventListener('fetch', event => {
	 const requestUrl = new URL(event.request.url);
	 	   if (event.request.method !== 'GET') { return; }
  if (event.request.url.startsWith(self.location.origin)) {  
  if(networkFirstFiles.indexOf(requestUrl.pathname) !== -1)
  {
	 //   console.log('WORKER: pathname'+requestUrl.pathname);
		
		oFirst(event);
  }
  else if (cacheFirstFiles.indexOf(requestUrl.pathname) !== -1) {
    event.respondWith(cacheElseNetwork(event));
  }
  }
});
function cacheElseNetwork (event) {
	
  return caches.match(event.request).then(response => {
	 // console.log('cacheelsenet action:'+  event.request.url);
	return response || fetchAndCache(event.request);
  });
}
function fetchAndCache(url) {
  return fetch(url)
  .then(function(response) {
    if (!response.ok) {
      throw Error(response.statusText);
    }
    return caches.open(CACHE_NAME)
    .then(function(cache) {
		if(response.status < 400) 
		{
      cache.put(url, response.clone());
		}
      return response;
    });
  });
}
self.addEventListener('message', event => { 
  var msg=JSON.parse(event.data);
   // console.log('WORKER:msg:'+msg);
  if(/refresh/.test(msg.type))
  {
	  fget=false;
	 
	  
  }
	  
  
});
function fromCache(request) {
		return caches.open(CACHE_NAME).then(function (cache) {	
		return cache.match(request).then(res=>{//console.log('prev cached request return');
		return res;}).catch(()=>{//console.log('no cached request fount');
		fetchAndCache(request);});
		});
		}
const oFirst =(evt)=>{
	
		//console.log('fget22:'+fget);
	function update(request) {
			  return caches.open(CACHE_NAME).then(function (cache) {
				return fetch(request).then(function (response) {
							if(response.status < 400) 
				  return cache.put(request, response.clone()).then(function () {
				//	console.log('updateing cache..');
					return response;
				  });
				});
			  });
			}
			
	function refresh(response) {
		if (!response) return;
    //console.log('requesing refresh');
		  return self.clients.matchAll().then(function (clients) {
			clients.forEach(function (client) {
				var message = {
				type: 'showNotif',
				LastMod: response.headers.get('Last-Modified')
			  };
			  client.postMessage(JSON.stringify(message));
			});
		  });
		};
	//	console.log('fget:'+fget);
		if(fget)
		{
			evt.respondWith(fromCache(evt.request));
	evt.waitUntil(update(evt.request).then(refresh));
		}
		else{
			evt.respondWith(fromCache(evt.request));
			fget=true;
		}
};

