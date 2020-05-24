<style>
#loading {
    visibility: visible;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 100;
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-position: center; 
    background-color: #268785;
    background-image: url("/android-chrome-192x192.png");
}

body {
	  overflow-y: hidden;
}
#page {
    visibility: hidden;
}
.show {
	opacity: 1;
	transition: opacity 1000ms;
  }
  
  .hide {
	opacity: 0;
	transition: opacity 1000ms;
  }

</style>
@section('head')
        @show
<body id="body">
    <div id="page">
        @section('header')
        @show

        @section('sections')
        @show

        @section('footer')
        @show
    </div>
    </body>
</html>