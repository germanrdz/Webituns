<?php

	class Player extends Controller {
		
		function Player() {
			parent::Controller();
			
			$this->load->helper("url");
			$this->load->plugin("itunes_xml_parser");
		}
		
		function index() {
			$this->load->view("player");
		}	
		
		function getStatus() {
			$status = shell_exec("osascript -e 'tell application \"iTunes\" to player state as string'");
			
			$data["status"] = trim($status);
			echo json_encode($data);
			
			return;
		}	
		
		function getSongList() {
			$xml_library = "/Users/GMac/Music/iTunes/iTunes Music Library.xml";
			
			$songs = iTunesXmlParser($xml_library);
			
			if (!$songs) {
				$data["error"] = "Error reading XML library from iTunes";
				return;
			}
			
			$i = 0;
			
			$song_list = array();
			
			foreach ($songs as $song) {
				$i++;
				if (!$song["Artist"]) { $song["Artist"] = "Unknown Artist"; }
				if (!$song["Name"]) { $song["Name"] = "Unknown Song"; }
				//$songname = "'" . $song["Name"] . "'";
				//echo print_r($song);
				//echo "<li><a href=javascript:HTMLHelper.play('" . $song["Track ID"] . "')>" . $song["Artist"] . " - " . $song["Name"] . "</a></li>";
				$song_list[] = $song;
			}
			$data["songs"] = $song_list;
			
			echo json_encode($data);
			return;
		}
		
	}

?>