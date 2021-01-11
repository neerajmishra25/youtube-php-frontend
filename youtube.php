<?php  

class youtube_list{
	const BASE_URL = 'https://youtube-api-nk.herokuapp.com';

	public function getVideos($method){
		try {
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => self::BASE_URL.'/video',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => $method,
			));
			$response = curl_exec($curl);
			curl_close($curl);
			return json_decode( $response, $assoc_array = false );
		} catch (Exception $e) {
			error_log($e);
		}
	}

	public function getVideoDetails($videoId){
		try {
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => self::BASE_URL.'/video/'.$videoId,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'GET',
			));
			$response = curl_exec($curl);
			curl_close($curl);
			return json_decode( $response, $assoc_array = false );
		} catch (Exception $e) {
			error_log($e);
			print_r($e);
		}
	}
}

$youtube = new youtube_list();

?>