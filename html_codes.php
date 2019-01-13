<?php
/*$url = 'https://www.ascii.cl/htmlcodes.htm';
$page = file_get_contents($url,false);
file_put_contents(dirname(__FILE__).'/'.'codes.htm',$page);*/
$xml = new DOMDocument();
@$xml->loadHTMLFile(dirname(__FILE__).'/codes.htm');
function append(&$value,$key)
{
	$value = trim($value);
	if(!empty($value)){
		$value .=";";
	}
}

function quotes(&$value,$key)
{
	$value = trim($value);
	if(!empty($value)){
		$value = '"'.$value.'"';
	}
}
					
$char_code = $chars = $code = $codes = array();
foreach($xml->getElementsByTagName('table') as $table) {
	$i=0;
	if($table->getAttribute('class') == 'e1'){
		$Header = $table->getElementsByTagName('tr');
		$Detail = $table->getElementsByTagName('td');
		foreach($Header as $tr){
			$i++;
			$j=0;
			foreach($tr->getElementsByTagName('td') as $td){
				$j++;
				// Get char array
				if($i==4 && ($j==3)){
					//echo trim($td->textContent)." ".$j."\n";
					$chars = array_values(array_filter(array_map('trim', preg_split('//u', $td->textContent, null, PREG_SPLIT_NO_EMPTY)), 'strlen'));
					//print_r(str_split($td->textContent));
					array_walk($chars, 'quotes');
				}
				if($i==4 && ($j==4)){
					//$codes = array_values(array_filter(array_map('trim', explode($td->textContent)), 'strlen'));
					$code = explode(';', trim($td->textContent));
					array_walk($code,'append');
					$codes = array_filter($code);
					if(in_array('&#32;', $codes)){
						unset($codes[0]); // We dont need space
					}
				}
			}
		}
		if(!empty($chars) && !empty($codes)) {
				if(count($chars) == count($codes)) {
					$char_code[] = array_combine( $chars, $codes );
				}
			}
		//print_r($chars);
		//print_r($codes);
		//break;
	}
}

//print_r($codes);
//print_r($chars);
print_r($char_code);
?>