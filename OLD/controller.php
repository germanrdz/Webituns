<?php
/*
 *  PHP iTunes Controller
 *  @autor: German Rodriguez
 *
 */


	include("itunes_xml_parser.php");
	$xml_library = "/Users/GMac/Music/iTunes/iTunes Music Library.xml";

	$q = $_GET['q'];

	switch ($q) {

		case "status":
			$s = shell_exec("osascript -e 'tell application \"iTunes\" to player state as string'");
			echo $s;
			break;

		case "current_song":
			$a = shell_exec("osascript -e 'tell application \"iTunes\" to artist of current track as string'");
			$t = shell_exec("osascript -e 'tell application \"iTunes\" to name of current track as string'");
			echo "Currently Playing: <a target='_blank' href='http://www.lastfm.com/music/$a/_/$t'>$t</a> by <a href='http://www.last.fm/music/$a'>$a</a>";
			break;

		case "play":
			$s = shell_exec("osascript -e 'tell application \"iTunes\" to play'");
			break;
		
		case "playtrack":
			$trackid = $_GET["track"];
			$songs = iTunesXmlParser($xml_library);
			
			if (!$songs) { echo "Error reading library"; break; }
			$i = 0;
			
			foreach ($songs as $song) {
				$i++;
				if ($song["Track ID"] == $trackid) {
					$songtoplay = $song;
					break;
				}
			}			

			$fullsong = $song["Artist"] . " - " . $song["Name"];
			echo "osascript -e 'tell application \"iTunes\" play $fullsong'";
			$s = shell_exec("osascript -e 'tell application \"iTunes\" play $fullsong'");
			break;

		case "pause":
			exec("osascript -e 'tell application \"iTunes\" to pause'");
			echo "Paused";
			break;

		case "next":
			exec("osascript -e 'tell application \"iTunes\" to next track'");
			break;

		case "prev":
			exec("osascript -e 'tell application \"iTunes\" to previous track'");
			break;
	
		case "get_list":
			$songs = iTunesXmlParser($xml_library);
			if (!$songs) { echo "Error reading library"; break; }
			$i = 0;
			foreach ($songs as $song) {
				$i++;
				if (!$song["Artist"]) { $song["Artist"] = "Unknown Artist"; }
				if (!$song["Name"]) { $song["Name"] = "Unknown Song"; }
				//$songname = "'" . $song["Name"] . "'";
				//echo print_r($song);
				echo "<li><a href=javascript:HTMLHelper.play('" . $song["Track ID"] . "')>" . $song["Artist"] . " - " . $song["Name"] . "</a></li>";
			}
			break;
	}

?>



<?php 
//purpose: display all the string values in an itunes library file
//license: released under the GPL. See http://thousandrobots.com/gpl/
//copyright: 2005 thousandrobots.com
//
//$xml = simplexml_load_file("itunes.xml");
//
//$output =  '<html><body>';
//foreach ($xml->dict->dict->dict as $dict) {
//	$output .= '<p>';
//	hack: only process <string> nodes
//	foreach ($dict->string  as $value) {
//			$output .= "$value<br />";
//	}
//	$output .= "</p>";
//}
//$output .= "</body></html>";
//
//echo $output;
?>
