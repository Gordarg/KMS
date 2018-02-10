<?php 
require_once 'core/config.php';
use core\config;
require_once 'semi-orm/Posts.php';
use orm\Posts;
?>
<!-- Footer -->
<footer class="w3-row-padding w3-padding-32">
	<div class="w3-third">
		<h3>همراهان ما</h3>
		<p><?php echo config::SPONSOR ?></p>
		<p>
			برگرفته از سامانه ی مدیریت محتوی <a href="http://gordarg.com"
				target="_blank">گُرد</a>
		</p>
	</div>

	<div class="w3-third">
		<h3>یادداشت ها</h3>
		<ul class="w3-ul w3-hoverable">
        <?php
        $rows = (new Posts($conn))->ToList(0, 2, "Submit", "DESC", "WHERE Level = 3");
        foreach ($rows as $row) {
            if ($row['Level'] != '3')
                continue;
            $_GET['id'] = $row['ID'];
            $_GET["level"] = '3';
            $_GET["type"] = 'POST';
            include ('views/render.php');
        }
        ?>
      </ul>
	</div>

	<div class="w3-third w3-serif">
		<h3>واژگان کلیدی</h3>
		<p>
          <?php
        $keywords = //file_get_contents('./keywords.txt', FILE_USE_INCLUDE_PATH);
        config::META_KEYWORDS;
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
  hljs.initHighlightingOnLoad();
  $('.hero__scroll').on('click', function(e) {
    $('html, body').animate({
      scrollTop: $(window).height()
    }, 1200);
  });
  function w3_open() {
      document.getElementById("mySidebar").style.display = "block";
  }
  function w3_close() {
      document.getElementById("mySidebar").style.display = "none";
  }
  $( "*" ).each(function( index ) {
    $(this).qtip({
        content: {
            text: $(this).attr('title')
        },
        style:{
          classes: 'qtip-dark qtip-rounded'
        }
    });
  });
</script>
<?php
/*
    TODO: Outsource Javascript files.
    Same for public-header
*/
?>
</body>
</html>