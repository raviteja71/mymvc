<?php //include menu if necessary
    require(VIEW_PATH.'home/menu.php'); 
?>
	<!-- end #menu -->
	<div id="page">
	<div id="page-bgtop">
	<div id="page-bgbtm">
		<div id="content">
            <?php 
                foreach($data['blogs'] as $blog) { ?>
			<div class="post">
				<h2 class="title"><a href="/blog/view/<?php echo $blog['id']; ?>"><?php echo substr($blog['title'],0,30).'...'; ?></a></h2>
				<p class="meta"><span class="date"><?php echo $blog['date']; ?></span><span class="posted">Posted by <a href="#"><?php echo $blog['username']; ?></a></span></p>
				<div style="clear: both;">&nbsp;</div>
				<div class="entry">
					<p><?php echo $blog['intro']; ?></p>
					<p class="links"><a href="#" class="pr-5">Read More</a>|<a href="#" class="pl-5">Comments</a></p>
				</div>
			</div>
            <?php } ?>
		<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #content -->
        <?php include(VIEW_PATH.'home/sidebar.php'); ?>
		<div style="clear: both;">&nbsp;</div>
	</div>
	</div>
	</div>
	<!-- end #page -->
</div>></body>
</html>
