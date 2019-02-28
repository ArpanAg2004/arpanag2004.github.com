<?php
error_reporting(0);
include 'configure.php';
require_once 'inc/func.php';
$vid = $_GET['v'];
$yf = ngegrab('https://www.googleapis.com/youtube/v3/videos?key=' . $key . '&part=snippet,contentDetails,statistics,topicDetails&id=' . $vid . '&vid=' . $vid . '');
$yf = json_decode($yf);

if ($yf)
	{
	foreach($yf->items as $item)
		{
		$name = $item->snippet->title;
		$title = "$name";
		$description = "$name download as Mp4 Mp3 Ultra HD";
		$image = "https://i.ytimg.com/vi/'.$vid.'/mqdefault.jpg";
		include 'inc/header.php';
        $channelTitle = $item->snippet->channelTitle;
		$des = $item->snippet->description;
		$date = dateyt($item->snippet->publishedAt);
		$published = time_elapsed_string($item->snippet->publishedAt);
		$ctd = $item->contentDetails;
		$duration = format_time($ctd->duration);
		$hd = $ctd->definition;
		$st = $item->statistics;
		$views = $st->viewCount;
		$likes = $st->likeCount;
		$dislikes = $st->dislikeCount;
		$favoriteCount = $st->favoriteCount;
		$commentCount = $st->commentCount;
		$RatingTotal = (int)$likes + (int)$dislikes;
		$RatingPercent = ($RatingTotal > 0) ? round((((int)$likes - (int)$dislikes) / $RatingTotal) * 100, 2) : "0.00";
		$star = (int)$RatingPercent - (int)1;
		$share = (int)$likes - (int)$dislikes;
		}
	}

echo '
<h1 style="color:white; font-family:horatio d;">' . ucwords($name) . ' </h1>';

include 'ads/728.php';

echo'
<div id="item-' . $vid . '" style="padding-left: 6px; padding-right: 6px;">
    <div class="info_item">
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/' . $vid . '?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div>

                
              
                

                </a>


        <div>
        
         ';
        		include 'ads/300.php';
        
       echo' </div>
        
        <a href="javascript:;" rel="nofollow" data-did="' . $vid . '" class="btn-close" style="display: none;">
            <button type="button" class="btn-danger" rel="nofollow">Close</button>
            <div class="iamload"><img src="/images/pleasewait.gif">
            </div>
        </a>
    </div>

<style>
@import url(//db.onlinewebfonts.com/c/30e4cdbd258a8387596c7558c2afd55b?family=Horatio+D);
@font-face {font-family: "Horatio D";
    src: url("//db.onlinewebfonts.com/t/30e4cdbd258a8387596c7558c2afd55b.eot");
    src: url("//db.onlinewebfonts.com/t/30e4cdbd258a8387596c7558c2afd55b.eot?#iefix") format("embedded-opentype"),
    url("//db.onlinewebfonts.com/t/30e4cdbd258a8387596c7558c2afd55b.woff2") format("woff2"),
    url("//db.onlinewebfonts.com/t/30e4cdbd258a8387596c7558c2afd55b.woff") format("woff"),
    url("//db.onlinewebfonts.com/t/30e4cdbd258a8387596c7558c2afd55b.ttf") format("truetype"),
    url("//db.onlinewebfonts.com/t/30e4cdbd258a8387596c7558c2afd55b.svg#Horatio D") format("svg");
}
</style>
<link href="//db.onlinewebfonts.com/c/30e4cdbd258a8387596c7558c2afd55b?family=Horatio+D" rel="stylesheet" type="text/css"/>
<center>
<font style="
color: white;
font-size:1.8em;
font-family:horatio d;
text-align:center;
}
">Download Audio</font>
<iframe style="border-width:0;" width="100%" id="mp3" src="https://yt-api.com/@api/button/mp3/' . $vid . '"></iframe> 
<font style="
color: white;
font-size:1.8em;
font-family:horatio d;
text-align:center;
}
">Download Video</font>
<iframe style="border-width:0;" width="100%" height="inherit" id="mp3" src="https://yt-api.com/@api/button/videos/' . $vid . '"></iframe> 
</center>

</div></div>

';

include 'ads/728.php';

echo'

</div>';
include 'inc/foot.php';
 ?>
	