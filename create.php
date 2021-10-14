<?php
$con=mysqli_connect('localhost','root','','rss');
$res=mysqli_query($con,"select * from product order by date desc");
$link='https://www.sciencedaily.com/rss/health_medicine/parkinsons_disease.xml';
header('Content-Type: text/xml');
$feed="<?xml version='1.0' encoding='UTF-8' ?>";
$feed.='<rss xmlns:atom="https://www.sciencedaily.com/rss/health_medicine/parkinsons_disease.xml" version="2.0">';
$feed.='<channel>';
$feed.='<title>My Website Feed</title>';
$feed.='<link>'.$link.'</link>';
$feed.='<description>My Website Feed Description</description>';
if(mysqli_num_rows($res)>0){
	while($row=mysqli_fetch_assoc($res)){
		$feed.='<item>';
			$feed.='<title>'.$row['title'].'</title>';
			$feed.='<description>'.$row['description'].'</description>';
			$feed.='<link>'.$row['link'].'</link>';
			$feed.='<guid>'.$row['id'].'</guid>';
			$feed.='<pubDate>'.$row['date'].'</pubDate>';
		$feed.='</item>';
	}
}
$feed.='</channel>';
$feed.='</rss>';
echo $feed;
?>