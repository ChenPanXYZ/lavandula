let mapLoaded = false;
function load_mapping() {
  if(mapLoaded) return;
  mapLoaded = true;
  load_jquery();
}

function load_jquery() {
  var head = document.getElementsByTagName('head')[0];
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = "https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js";
  head.appendChild(script);
  script.onload = function () {
    load_mapping_css();
  };
}


function load_mapping_css() {
  var styles = "@import url('https://cdn.jsdelivr.net/npm/jvectormap@2.0.4/jquery-jvectormap.css');";
  var newSS = document.createElement('link');
  newSS.rel = 'stylesheet';
  newSS.href = 'data:text/css,' + escape(styles);
  document.getElementsByTagName("head")[0].appendChild(newSS);
  newSS.onload = function () {
    load_world_map();
  };
}


function load_world_map() {
  var head = document.getElementsByTagName('head')[0];
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = "js/map/jquery-jvectormap-world-mill.js";
  head.appendChild(script);
  script.onload = function () {
    load_jvectormap();
  };
}

function load_jvectormap() {
  var head = document.getElementsByTagName('head')[0];
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = "https://cdn.jsdelivr.net/npm/jvectormap@2.0.4/jquery-jvectormap.min.js";
  head.appendChild(script);
  script.onload = function () {
    show_map();
  };
}

function show_map() {
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