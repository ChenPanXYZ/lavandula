let Mobile = false, header
let projectsPage = 1
const projectsNumOnOnePage = 8
let stateCheck = setInterval(() => {
  if (document.readyState === 'complete') {
	clearInterval(stateCheck);
	// document ready
    show('page', true);
    show('loading', false);
    document.getElementById('body').style.overflowY = "scroll"
    let projects = document.querySelectorAll(".project")
    const maxPage = Math.ceil(projects.length / projectsNumOnOnePage)
    for(let i = 0; i < projectsNumOnOnePage; i++) {
        projects[i].style.display = "block"
    }

    const a_nodes_list = document.getElementById("projects").getElementsByTagName("a")
		for(let i = 0; i < a_nodes_list.length; i++) {
      a_nodes_list[0].parentNode.innerHTML = a_nodes_list[0].innerHTML
      // Notice that the length of a_nodes_list decrements.
		}



    
    if(getCookie("cookieConsent") != 'seen') {
      setTimeout(function () {
          $("#cookie_consent").fadeIn(200);
       }, 1000);
      $(".seen_cookie").click(function() {
          $("#cookie_consent").fadeOut(200);
          setCookie('cookieConsent', 'seen', mydomain);
      }); 
  }
    
  $(".collapsible-table-row-head").click(function(){
    let temp = $(this).parent().children(".collapsible-table-row-content");
    $(this).toggleClass("shown");
    temp.fadeToggle();
});


  $(document).on('click', '#previous-page-button', function (event) {
    event.preventDefault()
    if(projectsPage == 1) {
      projectsPage = maxPage
    }
    else {
      projectsPage -= 1
    }
    for(let i = 0; i < projects.length; i++) {
      if(i>=(projectsPage * 8 - 8) && i < (projectsPage * 8)) {
        projects[i].style.display = "block"
      }
      else {
        projects[i].style.display = "none"
      }

    }
  })

  $(document).on('click', '#next-page-button', function (event) {
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
  })

    header = new Header();
    header.init();
    header.showTopNav();
    Mobile = $(document).width() < 785;
    window.onscroll = function() {
        header.showTopNav();
    }



            // Add Content
            $(document).on('click', '#form-submit', function (event) {
              event.preventDefault();
          });

          $(document).on('submit', '#form-submit', function (event) {
            event.preventDefault();
        });







  }
}, 100);

function sendComment(recaptchaResponse) {
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


  $.ajax({
      type:"POST",
      url:'../assets/php/ajax/send-comment.php',
      data: {name: name, email: email, content: content, recaptchaResponse: recaptchaResponse},
      success: function(html){
        if(html == -1) {
          alert("You Are a Bot, Go Away!")
        }
        else {
          $('#guestbook-form-body').slideUp();

          $("#do-not-show-it-to-my-distinguished-guest").before($.parseHTML(html));
          document.getElementById("do-not-show-it-to-my-distinguished-guest").style.display = "none";
          document.getElementById("comment-form-reminder").style.display = "none";
          document.getElementById("thankyou").style.display = "block";
        }

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