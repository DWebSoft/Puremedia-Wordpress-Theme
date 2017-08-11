<form role="search" method="get" action="<?php echo home_url('/');?>" id="searchform">
	<div>
		<input placeholder="Search..." type="text" name="s" id="s" value="<?php the_search_query();?>" style="display:inline-block; vertical-align:top ; padding: 9px 12px;"/>
		<input type="submit" value="Search" id="searchsubmit">
	</div>
</form>