<?php include('assets/php/init.php');?>
<!––
*********                 *********       
*                         *       *
*                         *       *
*                         *********
*                         *
*********                 *

顔色使用日本傳統配色：
青碧：#268785 - #4b8d8e
白橡：#dcb879- #CEA964
白練：#fcfaf2 - #fefefe
白鼠：#bdc0ba - #888, #d3d3d3
鉛：#787878 - #aaaaaa
純：#656765 - #555
紺：#192236 替代原來的黑色文字
胡粉：#fffffb
藍：#0D5661
––>
<head>
    <title><?php echo _("Pan Chen - Computer Science student at the University of Toronto"); ?></title>
    <?php include('assets/php/templates/header.php');?>


    <! ––main content starts here––>
    
	<section class ="main-section content" id="introduction">
		<div id="iampan">
			<span>
				<?php echo _("Hi, there!<br>
				I am Pan Chen.<br>
				I am studying Computer Science and Statistics Science at the University of Toronto.<br>
				My research focus is Artificial Intelligence.<br>
				I am a friendly, helpful and hard-working person.<br>
				It's my pleasure that you could find me in the corner of the Internet.<br>
				- Pan Chen"); ?>
			</span>
		</div>
    </section>

    <section class = "main-section content" id = "projects">
	    <?php include('assets/php/templates/projects.php');?>
    </section>
    <section class = "main-section content" id = "myStory">
        <h2><?php echo _("My Story"); ?></h2>
        <p><?php echo _("I was born and raised in Fuzhou, a coastal city in southeastern China. I spent my first eighteen years there. Many memories were formed there as I became an adult from a little boy."); ?></p>
        <p><?php echo _("I was a lousy student until Grade 8 when I transformed myself into a good student. I don't know why I decided to make such change and locked my PSP and PS Vita in the safe at that time. But thanks to that year's hard-working, I was able to continue my studies at the best high school in the province - Fuzhou No.1 Middle School, and this is what I feel proudest of even today. Ever since then, I believe that <i>the harder you work, the luckier you are.</i>"); ?></p>
        <p><?php echo _("And after I graduated from Fuzhou No.1 Middle School in 2017. I moved to Shenyang to study Computer Science and Technology at the Northeastern University. There, I decided to bring another significant change to my life. I chose to apply to the University of Toronto and got a place with my strong academic performance. And I came to where I am in the fall of 2018."); ?></p>
        <p><?php echo _("I am a responsible person who takes his commitment very seriously. I always do my part with high quality within the promised time. And that’s why my friends can trust me."); ?></p>
        <p><?php echo _("Besides, I own a wide range of interests, from music, movies to history, politics and so on. During my spare time, I work on my debut novel – Three Years in FZYZ, a book based on my real high school life."); ?></p>
    </section>
    
    <section class = "main-section content" id = "myFootprints">
        <h2><?php echo _("My Footprints"); ?></h2>
        <p><?php echo _("I love travelling. It makes me realize how diverse our world is and the importance of thinking in a more comprehensive way."); ?></p>
        
        <figure>
        <div id="world-map-markers"></div>
        </figure>
    </section>

    <section class = "main-section content" id = "guestbook">


    <h2><?php echo _("Guestbook"); ?></h2>
        <div class = "guest-comments">
        <?php showGuestbookComments(6);?>
        </div>
        <?php include('assets/php/templates/guestbook-form.php');?>
    </section>
    <! ––main content edns here––>

    <?php include('assets/php/templates/footer.php');?>
    <! --extra scripts for the main page––>

    <script>


    setTimeout(function(){
        if(document.createStyleSheet) {
            document.createStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.min.css');
        }
        else {
            var styles = "@import url('https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.min.css');";
            var newSS=document.createElement('link');
            newSS.rel='stylesheet';
            newSS.href='data:text/css,'+escape(styles);
            document.getElementsByTagName("head")[0].appendChild(newSS);
            newSS.onload= function(){
                load_map_1();
            };
            }
    }, 1000);
    function load_map_1() {
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = "/assets/js/jquery-jvectormap-2.0.3.min.js";
        head.appendChild(script);
        script.onload= function(){
                load_map_2();
            };
    }

    function load_map_2() {
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = "/assets/js/jquery-jvectormap-world-mill.js";
        head.appendChild(script);
        script.onload= function(){
            load_map_3();
            };
    }


    function load_map_3() {
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = "/assets/js/map.js";
        map_marker = document.getElementById('world-map-markers');
        map_marker.style.height = '400px';
        map_marker.style.marginRight = '10px';
        map_marker.style.marginLeft = '10px';
        head.appendChild(script);
    }
    </script>

<script src="//instant.page/3.0.0" type="module" defer integrity="sha384-OeDn4XE77tdHo8pGtE1apMPmAipjoxUQ++eeJa6EtJCfHlvijigWiJpD7VDPWXV1"></script>
</body>
</html>