const loadingSpinner=document.querySelector("#loading-spinner");var first_time=!0;let spinnerRight=loadingSpinner.getBoundingClientRect().right,spinnerLeft=loadingSpinner.getBoundingClientRect().left,spinnerTop=loadingSpinner.getBoundingClientRect().top,spinnerBottom=loadingSpinner.getBoundingClientRect().bottom;timeline=gsap.timeline({onComplete:function(){document.getElementById("initial_overlay").classList.add("not-displayed"),document.getElementById("loading-spinner").classList.add("not-displayed"),first_time&&(fullpage_api.setAllowScrolling(!0),fullpage_api.setKeyboardScrolling(!0),first_time=!1)},paused:!0}),timeline.fromTo("#loading-spinner",{opacity:0,scale:0,rotate:-420},{scale:3,opacity:1,rotate:0,duration:3,ease:"elastic.out(1, 0.6)"}).from(".quote",{scale:.1,opacity:0,duration:3,ease:"circ.in"},1).to("#loading-spinner",{x:window.innerWidth-spinnerRight-2*(spinnerRight-spinnerLeft)/3,y:window.innerHeight-spinnerBottom-2*(spinnerBottom-spinnerTop)/3,rotate:360,scale:2,duration:5},">").to("#initial_overlay",{opacity:0,duration:6},"<").from(".hero-text-first-line",{scale:0,opacity:0,duration:3,ease:"elastic.out(1,0.3)"},"<1").from(".hero-text-second-line",{yPercent:500,scale:0,opacity:0,duration:3,ease:"power.out(4)"},"<1").from(".hero-button",{y:300,opacity:0,scale:.2,duration:2,ease:"elastic.out(2, 0.1)"},"<1").to("#loading-spinner",{scale:1,opacity:0,duration:1,onComplete:function(){}},"<1"),"wasShown"!==sessionStorage.getItem("initialAlert")?(timeline.play(),sessionStorage.setItem("initialAlert","wasShown")):timeline.progress(1);