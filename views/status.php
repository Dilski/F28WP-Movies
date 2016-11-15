<?php
if($debug) {
	?>
	<span class="color-block" style="background: #EC644B; color: white"><h1 class="text-center">This site is in debug mode.</h1>
	<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	?>
	
	
	</span>
	<?php
} else {
	?>
	<span class="color-block" style="background: #F5D76E; "><h1 class="text-center">This site is in alpha.</h1></span>
	<?php
}


