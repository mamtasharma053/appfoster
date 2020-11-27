<?php
require_once('/www/.wordpress/wp-load.php');

add_shortcode('app_foster_test','test_page');
function test_page(){
?>
<div class="container">
	<h2>Welcome to App foster Plugin's home page.<h2>
</div>
<?php	
}
