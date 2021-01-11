<?php  
include_once "header.php";
require_once("youtube.php");

if (isset($_POST['submit'])) {
	$res = $youtube->getVideos('PUT');
	if ($res->staus=='success') {
		$videos = $res->data;
	}
}
else{
	$videos = $youtube->getVideos('GET');

}

?>

<div class="feed_refresh_btn">
	<form action="" method="POST">
		<button type="submit" name="submit" class="btn feed-refresh-btn" value="Submit">Refresh Feed</button>
	</form>
</div>
<div class="clear"></div>
<hr>
<div class="cards">
  <?php  
  foreach ($videos as $key => $video) {

  	$title = strlen($video->title) > 50 ? substr($video->title,0,50)."..." : $video->title;
  	echo '
	  	<div class="cards_item">
      <div class="card">
        <div class="card_image"><img src="'.$video->thumbnails->medium->url.'" alt=""></div>
        <div class="card_content">
          <h2 class="card_title">'.$title.'</h2>
          <a class="vid-link" href="video-details.php?id='.$video->_id.'"><button class="btn card_btn">View Details</button></a>
        </div>
      </div>
    </div>
	  ';
  }
  ?>
</div>

<?php
include_once "footer.php";
?>