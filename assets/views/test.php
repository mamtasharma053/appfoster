<?php
require_once('/www/.wordpress/wp-load.php');

add_shortcode('app_foster_test','test_page');
function test_page(){
//https://raw.githubusercontent.com/LearnWebCode/json-example/master/animals-1.json
?>
<div class="container">
	<?php echo do_shortcode("[app_foster_test_content]"); ?>
	<h2>Welcome to App foster Plugin's home page.<h2>
</div>
<?php	
}
