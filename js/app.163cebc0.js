(function(){"use strict";var t={9362:function(t,e){e.A={host:"http://localhost"}},628:function(t,e,n){var o=n(5130),r=(n(4114),n(6768)),a=n(144),i=n(1387),u=n(5665),s=n(8145);const c={class:"header"},l={class:"container header__content"},f={key:0},h={key:1},d={class:"main"},p=(0,r.Lk)("footer",{class:"footer"},[(0,r.Lk)("div",{class:"container footer__content"},"footer")],-1);var m={__name:"App",setup(t){(0,s.r)().getHost;const e=(0,i.rd)(),n=(0,u.n)(),o=async()=>{await n.logout()&&e.push("/login")};return(0,r.sV)((async()=>{console.log(localStorage.getItem("user")),console.log(localStorage.getItem("isAuth"));const t=localStorage.getItem("user");t&&n.setUser(JSON.parse(t));localStorage.getItem("isAuth");await n.auth()})),(t,e)=>{const i=(0,r.g2)("router-link"),u=(0,r.g2)("router-view");return(0,r.uX)(),(0,r.CE)(r.FK,null,[(0,r.Lk)("header",c,[(0,r.Lk)("div",l,[(0,a.R1)(n).isAuth?((0,r.uX)(),(0,r.CE)("nav",f,[(0,r.bF)(i,{to:"/"},{default:(0,r.k6)((()=>[(0,r.eW)("Home")])),_:1}),(0,r.eW)(" | "),(0,r.bF)(i,{to:"/about"},{default:(0,r.k6)((()=>[(0,r.eW)("About")])),_:1}),(0,r.eW)(" | "),(0,r.Lk)("button",{onClick:o,class:"btn"},"Выход")])):((0,r.uX)(),(0,r.CE)("nav",h,[(0,r.bF)(i,{to:"/login"},{default:(0,r.k6)((()=>[(0,r.eW)("Вход")])),_:1}),(0,r.eW)(" | "),(0,r.bF)(i,{to:"/register"},{default:(0,r.k6)((()=>[(0,r.eW)("Регистрация")])),_:1})]))])]),(0,r.Lk)("main",d,[(0,r.bF)(u)]),p],64)}}};const g=m;var v=g;const b="TradeTrove",y=[{path:"/",name:"home",component:()=>n.e(930).then(n.bind(n,8930)),meta:{title:`Главная | ${b}`}},{path:"/about",name:"about",meta:{title:"О нас"},component:()=>n.e(603).then(n.bind(n,603))},{path:"/login",name:"login",meta:{title:"Авторизация"},component:()=>n.e(914).then(n.bind(n,7914))},{path:"/register",name:"register",meta:{title:"Регистрация"},component:()=>n.e(935).then(n.bind(n,935))},{path:"/restore",name:"restore",meta:{title:"Восстановить пароль"},component:()=>n.e(814).then(n.bind(n,3814))}],k=(0,i.aE)({history:(0,i.LA)("/"),routes:y});var A=k,w=n(8950),C=n(292),S=n(2353),E=n(92),O=n(4996),_=n(3367);n(9362);w.Yv.add(S.X7I,E.C91,O.Cvc),A.beforeEach(((t,e,n)=>{document.title=t.meta.title||"TradeTrove",n()}));const j=(0,o.Ef)(v);j.use(A).use((0,_.Ey)()).component("font-awesome-icon",C.gc).mount("#app")},5665:function(t,e,n){n.d(e,{n:function(){return i}});var o=n(3367),r=n(9362);const a=(t=!1,e=void 0)=>{e.isAuth=t,t||localStorage.removeItem("user"),localStorage.setItem("isAuth",JSON.stringify({isAuth:t}))},i=(0,o.nY)("auth",{state:()=>({user:{token:null,name:null},isAuth:JSON.parse(localStorage.getItem("isAuth"))?.isAuth||!1}),actions:{setUser(t){console.log(t),this.user=t,localStorage.setItem("user",JSON.stringify(t)),a(!0,this)},async auth(){if(!this.user.token)return a(!1,this),!1;const t=await fetch(`${r.A.host}/api/auth`,{headers:{Authorization:`Bearer ${this.user.token}`,"Content-Type":"application/json"}}),e=await t.json();return e?e.success?(a(!0,this),!0):(a(!1,this),!1):void 0},async logout(){if(!this.user.token)return a(!1,this),!1;const t=await fetch(`${r.A.host}/api/logout`,{headers:{Authorization:`Bearer ${this.user.token}`,"Content-Type":"application/json"}}),e=await t.json();return e&&e.success?(a(!1,this),!0):void 0}},getters:{getUser(t){return t.user},getIsAuth(t){return t.isAuth}}})},8145:function(t,e,n){n.d(e,{r:function(){return r}});var o=n(3367);const r=(0,o.nY)("host",{state:()=>({host:"http://localhost"}),actions:{setHost(t){this.host=t}},getters:{getHost(t){return t.host}}})}},e={};function n(o){var r=e[o];if(void 0!==r)return r.exports;var a=e[o]={exports:{}};return t[o].call(a.exports,a,a.exports,n),a.exports}n.m=t,function(){var t=[];n.O=function(e,o,r,a){if(!o){var i=1/0;for(l=0;l<t.length;l++){o=t[l][0],r=t[l][1],a=t[l][2];for(var u=!0,s=0;s<o.length;s++)(!1&a||i>=a)&&Object.keys(n.O).every((function(t){return n.O[t](o[s])}))?o.splice(s--,1):(u=!1,a<i&&(i=a));if(u){t.splice(l--,1);var c=r();void 0!==c&&(e=c)}}return e}a=a||0;for(var l=t.length;l>0&&t[l-1][2]>a;l--)t[l]=t[l-1];t[l]=[o,r,a]}}(),function(){n.n=function(t){var e=t&&t.__esModule?function(){return t["default"]}:function(){return t};return n.d(e,{a:e}),e}}(),function(){n.d=function(t,e){for(var o in e)n.o(e,o)&&!n.o(t,o)&&Object.defineProperty(t,o,{enumerable:!0,get:e[o]})}}(),function(){n.f={},n.e=function(t){return Promise.all(Object.keys(n.f).reduce((function(e,o){return n.f[o](t,e),e}),[]))}}(),function(){n.u=function(t){return"js/"+t+"."+{603:"c9f691b0",814:"1537ba09",914:"7e75771f",930:"b50a0bae",935:"15bd337d"}[t]+".js"}}(),function(){n.miniCssF=function(t){return"css/"+t+"."+{914:"854afe81",935:"910d863b"}[t]+".css"}}(),function(){n.g=function(){if("object"===typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(t){if("object"===typeof window)return window}}()}(),function(){n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)}}(),function(){var t={},e="tradetrove:";n.l=function(o,r,a,i){if(t[o])t[o].push(r);else{var u,s;if(void 0!==a)for(var c=document.getElementsByTagName("script"),l=0;l<c.length;l++){var f=c[l];if(f.getAttribute("src")==o||f.getAttribute("data-webpack")==e+a){u=f;break}}u||(s=!0,u=document.createElement("script"),u.charset="utf-8",u.timeout=120,n.nc&&u.setAttribute("nonce",n.nc),u.setAttribute("data-webpack",e+a),u.src=o),t[o]=[r];var h=function(e,n){u.onerror=u.onload=null,clearTimeout(d);var r=t[o];if(delete t[o],u.parentNode&&u.parentNode.removeChild(u),r&&r.forEach((function(t){return t(n)})),e)return e(n)},d=setTimeout(h.bind(null,void 0,{type:"timeout",target:u}),12e4);u.onerror=h.bind(null,u.onerror),u.onload=h.bind(null,u.onload),s&&document.head.appendChild(u)}}}(),function(){n.r=function(t){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})}}(),function(){n.p="/"}(),function(){if("undefined"!==typeof document){var t=function(t,e,o,r,a){var i=document.createElement("link");i.rel="stylesheet",i.type="text/css",n.nc&&(i.nonce=n.nc);var u=function(n){if(i.onerror=i.onload=null,"load"===n.type)r();else{var o=n&&n.type,u=n&&n.target&&n.target.href||e,s=new Error("Loading CSS chunk "+t+" failed.\n("+o+": "+u+")");s.name="ChunkLoadError",s.code="CSS_CHUNK_LOAD_FAILED",s.type=o,s.request=u,i.parentNode&&i.parentNode.removeChild(i),a(s)}};return i.onerror=i.onload=u,i.href=e,o?o.parentNode.insertBefore(i,o.nextSibling):document.head.appendChild(i),i},e=function(t,e){for(var n=document.getElementsByTagName("link"),o=0;o<n.length;o++){var r=n[o],a=r.getAttribute("data-href")||r.getAttribute("href");if("stylesheet"===r.rel&&(a===t||a===e))return r}var i=document.getElementsByTagName("style");for(o=0;o<i.length;o++){r=i[o],a=r.getAttribute("data-href");if(a===t||a===e)return r}},o=function(o){return new Promise((function(r,a){var i=n.miniCssF(o),u=n.p+i;if(e(i,u))return r();t(o,u,null,r,a)}))},r={524:0};n.f.miniCss=function(t,e){var n={914:1,935:1};r[t]?e.push(r[t]):0!==r[t]&&n[t]&&e.push(r[t]=o(t).then((function(){r[t]=0}),(function(e){throw delete r[t],e})))}}}(),function(){var t={524:0};n.f.j=function(e,o){var r=n.o(t,e)?t[e]:void 0;if(0!==r)if(r)o.push(r[2]);else{var a=new Promise((function(n,o){r=t[e]=[n,o]}));o.push(r[2]=a);var i=n.p+n.u(e),u=new Error,s=function(o){if(n.o(t,e)&&(r=t[e],0!==r&&(t[e]=void 0),r)){var a=o&&("load"===o.type?"missing":o.type),i=o&&o.target&&o.target.src;u.message="Loading chunk "+e+" failed.\n("+a+": "+i+")",u.name="ChunkLoadError",u.type=a,u.request=i,r[1](u)}};n.l(i,s,"chunk-"+e,e)}},n.O.j=function(e){return 0===t[e]};var e=function(e,o){var r,a,i=o[0],u=o[1],s=o[2],c=0;if(i.some((function(e){return 0!==t[e]}))){for(r in u)n.o(u,r)&&(n.m[r]=u[r]);if(s)var l=s(n)}for(e&&e(o);c<i.length;c++)a=i[c],n.o(t,a)&&t[a]&&t[a][0](),t[a]=0;return n.O(l)},o=self["webpackChunktradetrove"]=self["webpackChunktradetrove"]||[];o.forEach(e.bind(null,0)),o.push=e.bind(null,o.push.bind(o))}();var o=n.O(void 0,[504],(function(){return n(628)}));o=n.O(o)})();
//# sourceMappingURL=app.163cebc0.js.map