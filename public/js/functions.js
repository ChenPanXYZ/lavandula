
function like() {
    const myResonse = document.querySelector('#myResponse');
    if(!navigator.cookieEnabled) {
      myResonse.innerHTML = myResponses["cookieNotEnabled"];
    }
    else if(getCookie('like-dislike') == "like") {
      myResonse.innerHTML = myResponses["alreadyLike"];
    }
    else if(getCookie('like-dislike') == "dislike") {
      myResonse.innerHTML = myResponses["changeToLike"];
    }
    else {
      incrementCounter('like');
      setCookie('like-dislike', 'like', mydomain, 86400);
      let number = parseInt(document.querySelector('#like-number').innerHTML);
      number = number + 1;
      document.querySelector('#like-number').innerHTML = number;
      myResonse.innerHTML = myResponses["like"];
    }
  }
  
  function dislike(myResponses) {
    const myResonse = document.querySelector('#myResponse');
    if(!navigator.cookieEnabled) {
      myResonse.innerHTML = 'You must allow cookies to give me a LIKE or DISLIKE.';
    }
    else if(getCookie('like-dislike') == "dislike") {
      myResonse.innerHTML = myResponses["alreadyDislike"];
    }
    else if(getCookie('like-dislike') == "like") {
      myResonse.innerHTML = myResponses["changeToDislike"];
    }
    else {
      incrementCounter('dislike');
      setCookie('like-dislike', 'dislike', mydomain, 86400);
      let number = parseInt(document.querySelector('#dislike-number').innerHTML);
      number = number + 1;
      document.querySelector('#dislike-number').innerHTML = number;
      myResonse.innerHTML = myResponses["dislike"];
    }
  }
  
  function incrementCounter(counterType) {
    $.ajax({
      type:"put",
      url:'api/like-dislike',
      data: {counterType: counterType},
      success: function(response){
        return response;
      }
  });
  }
    
  function toggle (el) {
      if (el.style.display == "none") {
      el.style.display = "block";
      }
      else{
          el.style.display = "none";
      }
  }
      
  function setLanguage(language, mydomain){
      setCookie('language', language, mydomain, 2147483647);
      location.reload();
  }
  
  function setCookie(cname, cvalue, mydomain, duration) {
      var d = new Date();
      d.setTime(d.getTime() + (duration));
      var expires = "expires="+ d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/" + ";domain=" + mydomain;
  }
      
  function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i <ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
              c = c.substring(1);
          }
          if (c.indexOf(name) === 0) {
              return c.substring(name.length, c.length);
          }
      }
      return "";
  }