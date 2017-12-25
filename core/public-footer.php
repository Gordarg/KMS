<?php 
require_once 'core/about.php';
use core\about;
?>
<!-- Footer -->
<footer data-aos="fade-up" class="w3-row-padding w3-padding-32">
	<div class="w3-third">
		<h3>همراهان ما</h3>
		<p><?php echo about::SPONSOR ?></p>
		<p>
			برگرفته از سامانه ی مدیریت محتوی <a href="http://gordarg.com"
				target="_blank">گُرد</a>
		</p>
	</div>

	<div class="w3-third">
		<h3>یادداشت ها</h3>
		<ul class="w3-ul w3-hoverable">
        <?php
        include ('core/database_conn.php');        
        $footer_query = "select ID from post_details where `Level` = '3' order by `Submit` desc limit 2;-- offset 1";
        $footer_result = mysqli_query($conn, $footer_query);
        $footer_num = mysqli_num_rows($footer_result);
        for ($i = 0; $i < $footer_num; $i ++) {
            $footer_row = mysqli_fetch_array($footer_result);
            $_GET['id'] = $footer_row['ID'];
            $_GET["level"] = '3';
            include ('show.php');
        }
        // include('core/database_close.php');
        ?>
      </ul>
	</div>

	<div class="w3-third w3-serif">
		<h3>واژگان کلیدی</h3>
		<p>
          <?php
        $keywords = file_get_contents('./keywords.txt', FILE_USE_INCLUDE_PATH);
        $keywords_arr = explode(',', $keywords);
        foreach ($keywords_arr as $keywordsArr) {
            echo '<span class="w3-tag w3-dark-grey w3-small w3-margin-bottom"> ' . $keywordsArr . ' </span>' . ' ';
        }
        ?>
     </p>
	</div>
</footer>

</div>


<script src="scripts/jquery.js"></script>
<script src="scripts/highlight.js"></script>
<script src="scripts/aos.js"></script>
<script src="scripts/smooth-scroll.js"></script>
<script src="scripts/qtip.js"></script>
<script src="scripts/paginathing.js"></script>
<script src="scripts/ezdz.js"></script>
<script src="scripts/tinymce/tinymce.min.js"></script>
<script>
	$('input[type="file"]').ezdz();
	$('table tbody').paginathing({
		perPage: 5,
		});
    tinymce.init({
        selector: 'textarea',
        theme: 'modern',
        // plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
        plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
        toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        image_advtab: true,
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ]
    });

  $('html').smoothScroll();
    easing: 'ease-out-back',
  AOS.init({
    duration: 1000
  });
  hljs.initHighlightingOnLoad();
  $('.hero__scroll').on('click', function(e) {
    $('html, body').animate({
      scrollTop: $(window).height()
    }, 1200);
  });
  // Script to open and close sidebar
  function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
  }
  function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
  }
  $( "*" ).each(function( index ) {
    $(this).qtip({ // Grab some elements to apply the tooltip to
        content: {
            text: $(this).attr('title')
        },
        style:{
          classes: 'qtip-dark qtip-rounded'
        }
    });
  });
  
        function SetHeaderVisibility($visible_head_posts){
        $('.w3-main').children('.head-post-row').each(function (index) {
            $(this).hide();
            if (index  == $visible_head_posts * 2 || index  == $visible_head_posts * 2 + 1 )
            	$(this).show();
        });
        };
        SetHeaderVisibility(0);
        $('#paging').children('a').each(function (index) {
          $(this).on("click", function(){
        	  SetHeaderVisibility(index );
            });
        });

</script>

</body>
</html>