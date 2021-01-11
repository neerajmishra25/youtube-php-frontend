<?php  
include_once "header.php";
require_once("youtube.php");

if (isset($_GET['id'])) {
	$video = $youtube->getVideoDetails($_GET['id']);
}

echo ' 
	<div class="video">
		<iframe width="1200" height="600" src="https://www.youtube.com/embed/'.$video->videoId.'?autoplay=1&mute=1&enablejsapi=1" frameborder="0" allowfullscreen></iframe>
	</div>
	<div class="vid-info">
		<h1>'.$video->title.'</h1>
		<p>'.$video->desc.'</p>
	</div>
';
echo '<br /><h2>Thumbnails</h2>';
foreach ($video->thumbnails as $key => $thumbnail) {
	echo '<a class="thumb-link" target="_blank" href="'.$thumbnail->url.'"><p>'.$thumbnail->url.'</p></a>';
}

echo '<br /><h2>Statistics</h2>';
echo '<p><strong>View Count: </strong>'.$video->statistics->views_count.'</p>';
echo '<p><strong>Likes Count:</strong> '.$video->statistics->likes_count.'</p>';
echo '<p><strong>Dislikes Count:</strong> '.$video->statistics->dislikes_count.'</p>';

echo '<br /><h2>Channel Information</h2>';
echo '<p><strong>Channel: </strong>'.$video->channel->title.'</p>';
echo '<p><strong>Channel Description:</strong> '.$video->channel->desc.'</p>';
echo '<p><strong>Channel Subscribers:</strong> '.$video->channel->subscriberCount.'</p>';

echo '<br /><h2>Channel Thumbnails</h2>';
foreach ($video->channel->thumbnails as $key => $thumbnail) {
	echo '<a class="thumb-link" target="_blank" href="'.$thumbnail->url.'"><p>'.$thumbnail->url.'</p></a>';
}

include_once "footer.php";
?>
