let Mobile = false, header
let projectsPage = 1
const projectsNumOnOnePage = 8

function cp$(identifier) {
  if(identifier.charAt(0) === '.') {
    return document.getElementsByClassName(identifier)
  }
  else if(identifier.charAt(0) === '#') {
    return document.getElementsByClassName(identifier)
  }
  else {
    return undefined;
  }
}

let stateCheck = setInterval(() => {
  if (document.readyState === 'complete') {
	clearInterval(stateCheck);
	// document ready
    show('page', true);
    show('loading', false);
    document.getElementById('body').style.overflowY = "scroll"


    let projects = document.querySelectorAll(".project")
    const maxPage = Math.ceil(projects.length / projectsNumOnOnePage)

    if(projects.length > 0){
    for(let i = 0; i < Math.min(projectsNumOnOnePage, projects.length); i++) {
        projects[i].style.display = "block"
    }
    
    for(let k = 1; k * projectsNumOnOnePage <= projects.length; k++) {
      projects[k * projectsNumOnOnePage - 1].style.borderBottom = "none"
    }

    const a_nodes_list = document.getElementById("projects").getElementsByTagName("a")
    while(a_nodes_list.length != 0) {
      a_nodes_list[0].parentNode.innerHTML = a_nodes_list[0].innerHTML
      // Notice that the length of a_nodes_list decrements.
    }
  }



    let seenCookie = document.getElementById("seen_cookie");
    let cookieConsent = document.getElementById("cookie_consent");
    if(getCookie("cookieConsent") != 'seen') {
      setTimeout(function () {
        cookieConsent.style.display = "block";
          //$("#cookie_consent").fadeIn(200);
       }, 1000);
       seenCookie.addEventListener("click", function(event) {
        cookieConsent.style.display = "none";
        setCookie('cookieConsent', 'seen', mydomain, 2147483647);
       })

      // $(".seen_cookie").click(function() {
      //     $("#cookie_consent").fadeOut(200);
      //     setCookie('cookieConsent', 'seen', mydomain, 2147483647);
      // }); 
  }

  let collapsibleTableRowHeads = document.getElementsByClassName("collapsible-table-row-head");
  for(let i = 0; i < collapsibleTableRowHeads.length; i++) {
    let collapsibleTableRowHead = collapsibleTableRowHeads[i]
    collapsibleTableRowHead.addEventListener("click", function(e) {
      let collapsibleTableRowContent = e.target.parentNode.children[1]
      // collapsibleTableRowContent.classList.toggle('shown')
      collapsibleTableRowContent.style.display = (collapsibleTableRowContent.style.display == "block")  ? "none" : "block"
  }); 
  }
    
//   $(".collapsible-table-row-head").click(function(){
//     let temp = $(this).parent().children(".collapsible-table-row-content");
//     $(this).toggleClass("shown");
//     temp.fadeToggle();
// });



let previousPageButton = document.getElementById("previous-page-button");
if(previousPageButton) {
previousPageButton.addEventListener("click", function(event) {
  event.preventDefault()
  if(projectsPage == 1) {
    projectsPage = maxPage
  }
  else {
    projectsPage -= 1
  }
  for(let i = 0; i < projects.length; i++) {
    if(i>=(projectsPage * projectsNumOnOnePage - projectsNumOnOnePage) && i < (projectsPage * projectsNumOnOnePage)) {
      projects[i].style.display = "block"
    }
    else {
      projects[i].style.display = "none"
    }
  }
});
}

let nextPageButton = document.getElementById("next-page-button");
if(nextPageButton) {
nextPageButton.addEventListener("click", function(event) {
  event.preventDefault()
  if(projectsPage == maxPage) {
    projectsPage = 1
  }
  else {
    projectsPage += 1
  }
  for(let i = 0; i < projects.length; i++) {
    if(i>=(projectsPage * 8 - 8) && i < (projectsPage * 8)) {
      projects[i].style.display = "block"
    }
    else {
      projects[i].style.display = "none"
    }
  }
}); 
}
    header = new Header()
    header.init()
    header.showTopNav()
    const clientWidth = document.body.clientWidth

    Mobile = clientWidth < 785;
    // Mobile = $(document).width() < 785;
    window.onscroll = function() {
        header.showTopNav();
    }


    let formSubmit = document.getElementById("form-submit");
    if(formSubmit) {
      formSubmit.addEventListener("click", function(event) {
        event.preventDefault();
      })
  
      formSubmit.addEventListener("submit", function(event) {
        event.preventDefault();
      })
    }


        if(document.getElementById("myFootprints")) {
        //setTimeout(function(){
          if(document.createStyleSheet) {
              document.createStyleSheet('https://cdn.jsdelivr.net/npm/jvectormap@2.0.4/jquery-jvectormap.css');
          }
          else {
              var styles = "@import url('https://cdn.jsdelivr.net/npm/jvectormap@2.0.4/jquery-jvectormap.css');";
              var newSS=document.createElement('link');
              newSS.rel='stylesheet';
              newSS.href='data:text/css,'+escape(styles);
              document.getElementsByTagName("head")[0].appendChild(newSS);
              newSS.onload= function(){
                load_map_0();
              };
              }
      //}, 1000);
      function load_map_0() {
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = "https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js";
        head.appendChild(script);
        script.onload= function(){
                load_map_1();
            };
    }

      function load_map_1() {
          var head = document.getElementsByTagName('head')[0];
          var script = document.createElement('script');
          script.type = 'text/javascript';
          script.src = "https://cdn.jsdelivr.net/npm/jvectormap@2.0.4/jquery-jvectormap.min.js";
          head.appendChild(script);
          script.onload= function(){
                  load_map_2();
              };
      }
      
      function load_map_2() {
          var head = document.getElementsByTagName('head')[0];
          var script = document.createElement('script');
          script.type = 'text/javascript';
          script.src = "js/map/jquery-jvectormap-world-mill.js";
          head.appendChild(script);
          script.onload= function(){
              load_map_3();
              };
      }
      
      
      function load_map_3() {
          var head = document.getElementsByTagName('head')[0];
          var script = document.createElement('script');
          script.type = 'text/javascript';
          script.src = "js/map/map.js";
          map_marker = document.getElementById('world-map-markers');
          map_marker.style.height = '400px';
          map_marker.style.marginRight = '10px';
          map_marker.style.marginLeft = '10px';
          head.appendChild(script);
      }
    }

  //   if(document.querySelectorAll('.guestbook-form').length !== 0) {
  //     setTimeout(function(){
  //       let head = document.getElementsByTagName('head')[0];
  //       let script = document.createElement('script');
  //       script.type = 'text/javascript';
  //       script.src = "https://www.recaptcha.net/recaptcha/api.js?onload=onloadCallback&render=explicit";
  //       head.appendChild(script);
  //     }, 2000);
  // }




  }
}, 100);



let slideUp = (target, duration) => {
  target.style.transitionProperty = 'height, margin, padding'; /* [1.1] */
  target.style.transitionDuration = duration + 'ms'; /* [1.2] */
  target.style.boxSizing = 'border-box'; /* [2] */
  target.style.height = target.offsetHeight + 'px'; /* [3] */
  target.style.height = 0; /* [4] */
  target.style.paddingTop = 0; /* [5.1] */
  target.style.paddingBottom = 0; /* [5.2] */
  target.style.marginTop = 0; /* [6.1] */
  target.style.marginBottom = 0; /* [7.2] */
  target.style.overflow = 'hidden'; /* [7] */
  window.setTimeout( () => {
    target.style.display = 'none'; /* [8] */
    target.style.removeProperty('height'); /* [9] */
    target.style.removeProperty('padding-top');  /* [10.1] */ 
    target.style.removeProperty('padding-bottom');  /* [10.2] */ 
    target.style.removeProperty('margin-top');  /* [11.1] */ 
    target.style.removeProperty('margin-bottom');  /* [11.2] */ 
    target.style.removeProperty('overflow');  /* [12] */ 
    target.style.removeProperty('transition-duration');  /* [13.1] */ 
    target.style.removeProperty('transition-property');  /* [13.2] */ 
  }, duration);
}


function sendComment() {
// function sendComment(recaptchaResponse) {
  let name = document.getElementById('form-name').value;
  let email = document.getElementById('form-email').value;
  let content = document.getElementById('form-content').value;

  let notGood = 0;
  if(!name||!email||!content) {
    document.getElementById("send-comment-error").style.display = "block";
    notGood = 1;
  }

  else {
    document.getElementById("send-comment-error").style.display = "none";
  }

  if(!email.includes("@")) {
    document.getElementById("send-comment-error-email").style.display = "block";
    notGood = 1;
  }
  else {
    document.getElementById("send-comment-error-email").style.display = "none";
  }
  if (notGood == 1) {
    return;
  }

  const comment = {name: name, email: email, content: content, recaptchaResponse: recaptchaResponse};
  fetch("api/comment", {
    method: "POST", 
    body: JSON.stringify(comment),
    headers: {
      'content-type': 'application/json'
    },
  }).then(res => {
        if(res == -1) {
          alert("You Are a Bot, Go Away!")
        }
        else {
          let wpComment = {post: 231, author_name: name, author_email: email, content: content}
          fetch("https://www.chen.life/wp-json/wp/v2/comments", {
            method: "POST", 
            body: JSON.stringify(wpComment),
            headers: {
              'content-type': 'application/json'
            },
          }).then(res => {
            if(res) {
              // $('#guestbook-form-body').slideUp();
              //slideUp(document.getElementById("guestbook-form-body"), 200000)
              document.getElementById("guestbook-form-body").style.display = "none";
              document.getElementById("comment-author-name").textContent = name;
              document.getElementById("comment-form-reminder").style.display = "none";
              document.getElementById("thankyou").style.display = "block";
            }
          });
        }
  });
}

function show(id, value) {
    document.getElementById(id).style.visibility = value ? 'visible' : 'hidden';
}


class Header {
    constructor() {
      this.topnav = document.getElementById("topnav");
      this.signature = document.getElementById("my_signature");
      this.self = document.getElementById("header");
      this.modal = document.getElementById("myModal");
      this.name = document.getElementById("name");
      this.contact = document.getElementById("contact");
    }

    init() {
        this.name.style.display = "block";
        this.contact.style.display = "block";
        this.modal.style.display = "none";
    }

    adjust() {
        if (!Mobile) {
            return;
        }
        if (this.topnav.className == "topnav") {
            this.topnav.className += " responsive";
        } 
        else {
            this.topnav.className = "topnav";
        }
        toggle((this.name));
        toggle((this.contact));
        this.showTopNav();
    }

    showTopNav() {
        let currentScrollPos = window.pageYOffset;
        let target = (this.self).clientHeight;
        if (currentScrollPos >= target) {
            this.topnav.style.background= "#fffffb";
            this.topnav.style.top = "0";
            this.topnav.style.position = "fixed";
            this.topnav.style.width = "100%";
            this.topnav.style.zIndex = "1000";
            // if(Mobile){
              if (topnav.className === "topnav") {
                this.signature.classList.add('displayOnMobile');
                // this.signature.style.display= "block";
              }
              else {
                this.signature.classList.remove('displayOnMobile');
                // this.signature.style.display= "none";
              }
            // }
        } 
        else {
            this.topnav.style.background= "transparent";
            this.topnav.style.top = "auto";
            this.topnav.style.position = "relative";
            this.topnav.style.width = "100%";
            this.topnav.style.zIndex = "1000";
            this.signature.classList.remove('displayOnMobile');
        }
    }
}


function recaptchaCallback() {
    document.getElementById("form-submit").removeAttribute("disabled");
    document.getElementById("form-submit").style.opacity = "1";
};

function expiredCallback() {
  document.getElementById("form-submit").setAttribute("disabled", true);
  document.getElementById("form-submit").style.opacity = "0.5";
}