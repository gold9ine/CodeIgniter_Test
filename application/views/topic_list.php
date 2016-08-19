<div class="col-md-2">
	<ul class="nav nav-tabs nav-stacked" id="sidebar">
		<?php
		foreach($topics as $entry){
			?>
			<li><a href="/topic/get/<?=$entry->id?>"><?=$entry->title?></a></li>
			<? 
		}
		?>
	</ul>	
</div>