</div>
</div>

<?php if(!$site->googleanalytics()->empty()): ?>
  <!-- Google Analytics-->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', '<?php echo $site->googleanalytics() ?>', 'auto');
    ga('send', 'pageview');
  </script>
<?php endif ?>
	<script>
		var $sitetitle = '<?= $site->title()->html() ?>';
		window.lazySizesConfig = window.lazySizesConfig || {};
		lazySizesConfig.loadMode = 3;
	</script>
	<?php
	echo js(array('assets/js/build/plugins.js?=v2.0', 'assets/js/build/app.min.js?=v2.0'));
	?>

</body>
</html>