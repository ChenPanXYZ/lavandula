let Mobile = false, header
let projectsPage = 1
const projectsNumOnOnePage = 8
let myFootprints = document.getElementById("myFootprints");
let mapLoaded = false;

let stateCheck = setInterval(() => {
  if (document.readyState === 'complete') {
    clearInterval(stateCheck);
    show('page', true);
    show('loading', false);
    document.getElementById('body').style.overflowY = "scroll"


    let projects = document.querySelectorAll(".project")
    const maxPage = Math.ceil(projects.length / projectsNumOnOnePage)

    if (projects.length > 0) {
      for (let i = 0; i < Math.min(projectsNumOnOnePage, projects.length); i++) {
        projects[i].style.display = "block"
      }

      for (let k = 1; k * projectsNumOnOnePage <= projects.length; k++) {
        projects[k * projectsNumOnOnePage - 1].style.borderBottom = "none"
      }

      const a_nodes_list = document.getElementById("projects").getElementsByTagName("a")
      while (a_nodes_list.length != 0) {
        a_nodes_list[0].parentNode.innerHTML = a_nodes_list[0].innerHTML
      }
    }

    let seenCookie = document.getElementById("seen_cookie");
    let cookieConsent = document.getElementById("cookie_consent");
    if (getCookie("cookieConsent") != 'seen') {
      setTimeout(function () {
        cookieConsent.style.display = "block";
      }, 1000);
      seenCookie.addEventListener("click", function (event) {
        cookieConsent.style.display = "none";
        setCookie('cookieConsent', 'seen', mydomain, 2147483647);
      })
    }

    let collapsibleTableRowHeads = document.getElementsByClassName("collapsible-table-row-head");
    for (let i = 0; i < collapsibleTableRowHeads.length; i++) {
      let collapsibleTableRowHead = collapsibleTableRowHeads[i]
      collapsibleTableRowHead.addEventListener("click", function (e) {
        let collapsibleTableRowContent = e.target.parentNode.children[1]
        collapsibleTableRowContent.style.display = (collapsibleTableRowContent.style.display == "block") ? "none" : "block"
      });
    }
    let previousPageButton = document.getElementById("previous-page-button");
    if (previousPageButton) {
      previousPageButton.addEventListener("click", function (event) {
        event.preventDefault()
        if (projectsPage == 1) {
          projectsPage = maxPage
        }
        else {
          projectsPage -= 1
        }
        for (let i = 0; i < projects.length; i++) {
          if (i >= (projectsPage * projectsNumOnOnePage - projectsNumOnOnePage) && i < (projectsPage * projectsNumOnOnePage)) {
            projects[i].style.display = "block"
          }
          else {
            projects[i].style.display = "none"
          }
        }
      });
    }

    let nextPageButton = document.getElementById("next-page-button");
    if (nextPageButton) {
      nextPageButton.addEventListener("click", function (event) {
        event.preventDefault()
        if (projectsPage == maxPage) {
          projectsPage = 1
        }
        else {
          projectsPage += 1
        }
        for (let i = 0; i < projects.length; i++) {
          if (i >= (projectsPage * 8 - 8) && i < (projectsPage * 8)) {
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

    Mobile = clientWidth < 900;
    window.onscroll = function () {
      header.showTopNav();
      if (myFootprints && isScrolledIntoView(myFootprints) && !mapLoaded) {
        load_mapping();
      }
    }
    let formSubmit = document.getElementById("form-submit");
    if (formSubmit) {
      formSubmit.addEventListener("click", function (event) {
        event.preventDefault();
      })

      formSubmit.addEventListener("submit", function (event) {
        event.preventDefault();
      })
    }






    function load_mapping() {
      if(mapLoaded) return;
      mapLoaded = true;
      load_jquery();
    }
    
    function load_jquery() {
      let head = document.getElementsByTagName('head')[0];
      let script = document.createElement('script');
      script.type = 'text/javascript';
      script.src = "https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js";
      head.appendChild(script);
      script.onload = function () {
        load_mapping_css();
      };
    }
    
    
    function load_mapping_css() {
      let styles = "@import url('https://cdn.jsdelivr.net/npm/jvectormap@2.0.4/jquery-jvectormap.css');";
      let newSS = document.createElement('link');
      newSS.rel = 'stylesheet';
      newSS.href = 'data:text/css,' + escape(styles);
      document.getElementsByTagName("head")[0].appendChild(newSS);
      newSS.onload = function () {
        load_jvectormap();
      };
    }
    
    function load_jvectormap() {
      let head = document.getElementsByTagName('head')[0];
      let script = document.createElement('script');
      script.type = 'text/javascript';
      script.src = "https://cdn.jsdelivr.net/npm/jvectormap@2.0.4/jquery-jvectormap.min.js";
      head.appendChild(script);
      script.onload = function () {
        load_world_map();
      };
    }

    function load_world_map() {
      let head = document.getElementsByTagName('head')[0];
      let script = document.createElement('script');
      script.type = 'text/javascript';
      script.src = "js/map/jquery-jvectormap-world-mill.js";
      head.appendChild(script);
      script.onload = function () {
        show_map();
      };
    }
    
    function show_map() {
      mapLoaded = true;
      let head = document.getElementsByTagName('head')[0];
      let script = document.createElement('script');
      script.type = 'text/javascript';
      script.src = "js/map/map.js";
      head.appendChild(script);
    }
  }
}, 100);

function sendComment() {
  // function sendComment(recaptchaResponse) {
  let name = document.getElementById('form-name').value;
  let email = document.getElementById('form-email').value;
  let content = document.getElementById('form-content').value;

  let notGood = 0;
  if (!name || !email || !content) {
    document.getElementById("send-comment-error").style.display = "block";
    notGood = 1;
  }

  else {
    document.getElementById("send-comment-error").style.display = "none";
  }

  if (!email.includes("@")) {
    document.getElementById("send-comment-error-email").style.display = "block";
    notGood = 1;
  }
  else {
    document.getElementById("send-comment-error-email").style.display = "none";
  }
  if (notGood == 1) {
    return;
  }

  const comment = { name: name, email: email, content: content, recaptchaResponse: recaptchaResponse };
  fetch("api/comment", {
    method: "POST",
    body: JSON.stringify(comment),
    headers: {
      'content-type': 'application/json'
    },
  }).then(res => {
    if (res == -1) {
      alert("You Are a Bot, Go Away!")
    }
    else {
      let wpComment = { post: 231, author_name: name, author_email: email, content: content }
      fetch("https://www.chen.life/wp-json/wp/v2/comments", {
        method: "POST",
        body: JSON.stringify(wpComment),
        headers: {
          'content-type': 'application/json'
        },
      }).then(res => {
        if (res) {
          document.getElementById("guestbook-form-body").style.display = "none";
          document.getElementById("comment-author-name").textContent = name;
          document.getElementById("comment-form-reminder").style.display = "none";
          document.getElementById("thankyou").style.display = "block";
        }
      });
    }
  });
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
      this.topnav.style.background = "#fffffb";
      this.topnav.style.top = "0";
      this.topnav.style.position = "fixed";
      this.topnav.style.width = "100%";
      this.topnav.style.zIndex = "1000";
      if (topnav.className === "topnav") {
        this.signature.classList.add('displayOnMobile');
      }
      else {
        this.signature.classList.remove('displayOnMobile');
      }
    }
    else {
      this.topnav.style.background = "transparent";
      this.topnav.style.top = "auto";
      this.topnav.style.position = "relative";
      this.topnav.style.width = "100%";
      this.topnav.style.zIndex = "1000";
      this.signature.classList.remove('displayOnMobile');
    }
  }
}