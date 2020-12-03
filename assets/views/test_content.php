<?php
require_once('/www/.wordpress/wp-load.php');

add_shortcode('app_foster_test_content','test_content_page');
function test_content_page(){
//https://raw.githubusercontent.com/LearnWebCode/json-example/master/animals-1.json

$url = "https://raw.githubusercontent.com/LearnWebCode/json-example/master/animals-1.json";
$cURLConnection = curl_init();

curl_setopt($cURLConnection, CURLOPT_URL, $url);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$data = curl_exec($cURLConnection);
curl_close($cURLConnection);
$data_arr = json_decode($data, true);

/*echo "<pre>";
print_r($data);*/
?>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<div class="container" style="padding: 100px;">
<?php 
	$head = array();
	$body = " ";
    	foreach ($data_arr as $key => $value) { 
    		$body .= "<tr>";
		    foreach ($data_arr[$key] as $sub_key => $sub_val) { 
		    	array_push($head,$sub_key);
		    	if (!is_array($data_arr[$key][$sub_key])) {
		    		$body .= "<td>".$sub_val."</td>";
		    	}			        
		        /*$sub_key." = ".$sub_val."\n";	
		        print_r($data_arr[$key][$sub_key]);	*/       
		        if (is_array($data_arr[$key][$sub_key])) { 
		            //echo $sub_key . " : \n";
		            $body .= "<td><table>"; 
		            foreach ($data_arr[$key][$sub_key] as $k => $v) { 
		                //echo "\t" .$k . " = " . $v . "\n"; 
		                $body .= "<thead><tr><th>".$k."</tr></th></thead>";
		                if (is_array($v)) { 
		                	foreach ($v as $k => $l){
		                		 $body .= "<tbody><tr><td>".$l."</tr></td></tbody>";
		                	}
		                }
		            } 
		            $body .= "</table></td>";
		        } 
		    } 
	} 
?>
<table id="animal_tbl" class="display stripe">
    <thead>
        <tr>
            <th><?php echo $head[0]; ?></th>
            <th><?php echo $head[1]; ?></th>
             <th><?php echo $head[2]; ?></th>
        </tr>
    </thead>
    <tbody>        
    	<?php echo $body; ?>
    </tbody>
</table></div>
<?php	
}
