jQuery(function(t){var n,a,e=Number(location.href.split("?")[1])||30,i=0,r=0,o=["#0487FF","#ffffff","#47ebc6"];function u(t,a){var e={};return e.x=t,e.y=a,e.color=o[anime.random(0,o.length-1)],e.radius=anime.random(10,20),e.endPos=function(t){var n=anime.random(0,360)*Math.PI/180,a=anime.random(50,180),e=[-1,1][anime.random(0,1)]*a;return{x:t.x+e*Math.cos(n),y:t.y+e*Math.sin(n)}}(e),e.draw=function(){n.beginPath(),n.arc(e.x,e.y,e.radius,0,2*Math.PI,!0),n.fillStyle=e.color,n.fill()},e}function d(t){for(var n=0;n<t.animatables.length;n++)t.animatables[n].target.draw()}function h(t,a){for(var i=function(t,a){var e={};return e.x=t,e.y=a,e.color="#FFF",e.radius=.1,e.alpha=.5,e.lineWidth=6,e.draw=function(){n.globalAlpha=e.alpha,n.beginPath(),n.arc(e.x,e.y,e.radius,0,2*Math.PI,!0),n.lineWidth=e.lineWidth,n.strokeStyle=e.color,n.stroke(),n.globalAlpha=1},e}(t,a),r=[],o=0;o<e;o++)r.push(u(t,a));anime.timeline().add({targets:r,x:function(t){return t.endPos.x},y:function(t){return t.endPos.y},radius:.1,duration:anime.random(1e3,1500),easing:"easeOutExpo",update:d}).add({targets:i,radius:anime.random(800,160),lineWidth:0,alpha:{value:0,easing:"linear",duration:anime.random(600,800)},duration:anime.random(1200,1800),easing:"easeOutExpo",update:d,offset:0})}var c=anime({duration:1/0,update:function(){null!=n&&n.clearRect(0,0,a.width,a.height)}});function s(t){(a=t.children("canvas")).attr("width",2*t.outerWidth()),a.attr("height",2*t.outerHeight()),a.css("width",t.outerWidth()+"px"),a.css("height",t.outerHeight()+"px"),a[0].getContext("2d").scale(2,2)}t(".theme-btn a, .theme-btn input[type=submit]").each(function(){t(this).prepend('<canvas class="fireworks"></canvas>'),s(t(this))}),t(window).resize(function(){t(".theme-btn a, .theme-btn input[type=submit]").each(function(){s(t(this))})}),t(".theme-btn a, .theme-btn input[type=submit]").click(function(e){n=t(this).children("canvas")[0].getContext("2d"),a=t(this).children("canvas")[0],c.play(),function(t,n){var a=n.getBoundingClientRect();i=t.clientX-a.left,r=t.clientY-a.top}(e,a),h(i,r)})});