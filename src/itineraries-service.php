<?
$host = "[DB_HOST]";
$username = "[DB_USERNAME]";
$password = "[DB_PASSWORD]";
$dbname = "[DB_NAME]";

$action = $_POST['action'];

class Route {
    public $zeusCode = '';
    public $name = '';
    public $surname = '';
    public $antenna = '';
    public $mobile = '';
    public $email = '';
    public $authorizeToPublish = '';
    public $authorizeToPublishContactInfo = '';
	
    public $itineraryJson = '';
}

$con = mysqli_connect($host, $username, $password, $dbname);

if (!$con) {
	die('Could not connect: ' . mysqli_error());
}

if($_POST && strcmp($action, "insert") == 0) {
	$zeusCode = (isset($_POST['zeusCode'])) ? $_POST['zeusCode'] : "ORG";
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$antenna = $_POST['antenna'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$publishContact = $_POST['publishContact'];
	$publishItinerary = $_POST['publishItinerary'];
	$itineraryJson = $_POST['itineraryJson'];
	$name = mysqli_real_escape_string($con, $name);
	$surname = mysqli_real_escape_string($con, $surname);
	$itineraryJson = mysqli_real_escape_string($con, $itineraryJson);
	
	$maxId = 0;
	if(strcmp($zeusCode, "ORG") == 0) {
		$query = "SELECT MAX(id) AS 'MaxId' FROM Participants";
		$result = mysqli_query($con, $query);
		if(mysqli_num_rows($result) > 0) {
			$row = $result->fetch_assoc();
			$maxId = $row["MaxId"];
		}
		$maxId = intval($maxId) + 1;
		$zeusCode = "ORG" . $maxId;
	}
	
	$query = "SELECT zeusCode, name, surname FROM Participants WHERE zeusCode='$zeusCode'";
	$result = mysqli_query($con, $query);

	$iFields = "(`zeusCode`, `name`, `surname`, `antenna`, `email`, `mobile`, `itineraryJson`, `publishContact`, `publishItinerary`, `creationDateTime`)";
	
	if (mysqli_num_rows($result) == 0) {
		$dt = date("Y-m-d h:i:sa");
		
		$query = "INSERT INTO `$dbname`.`Participants` $iFields VALUES ('$zeusCode', '$name',
			'$surname', '$antenna', '$email', '$mobile', '$itineraryJson', $publishContact, $publishItinerary, '$dt');";
	} else {
		$dt = date("Y-m-d h:i:sa");
		
		$query = "
		UPDATE `$dbname`.`Participants` SET name='$name', surname='$surname', antenna='$antenna', email='$email', mobile='$mobile', itineraryJson='$itineraryJson', publishContact=$publishContact, publishItinerary=$publishItinerary, updateDateTime='$dt' WHERE zeusCode='$zeusCode'";
	}
	
	mysqli_query($con, $query);
	
	echo "OK";
}

$action = $_GET['action'];

if(strcmp($action, "profile") == 0) {
	$zeusCode = $_GET['zeusCode'];
	
	$query = "SELECT `zeusCode`, `name`, `surname`, `antenna`, `email`, `mobile`, `itineraryJson`, `publishContact`, `publishItinerary` FROM Participants WHERE zeusCode = '$zeusCode'";

	if ($result = mysqli_query($con, $query)) {
		$out = array();

		$row = $result->fetch_assoc();
		
        $out = [
			'zeusCode' => $row ['zeusCode'],
			'name' => $row ['name'],
			'surname' => $row ['surname'],
			'antenna' => $row ['antenna'],
			'email' => $row ['email'],
			'mobile' => $row ['mobile'],
			'publishContact' => intval($row ['publishContact']),
			'publishItinerary' => intval($row ['publishItinerary']),
			'itineraryJson' => $row ['itineraryJson']
        ];
		
		//echo "{itineraryJson:\"".str_replace(array("'", "\"", "&quot;"), '"', $row ['itineraryJson'])."\"}";
		
		/* encode array as json and output it for the ajax script*/
		echo json_encode($out);
		//echo str_replace(array("'", "\"", "&quot;"), '"', $row ['itineraryJson']);

		/* free result set */
		mysqli_free_result($result);
	}
}

if(strcmp($action, "all") == 0) {
	$departureDt = (isset($_GET["departuredt"])) ? $_GET["departuredt"] : null;
	//$arrivalDt = (isset($_GET["arrivaldt"])) ? $_GET["arrivaldt"] : null;
	
	$query = "SELECT `zeusCode`, `name`, `surname`, `antenna`, `email`, `mobile`, `itineraryJson`, `publishContact`, `publishItinerary` FROM Participants";
	
	$itinerary = json_decode($route["itineraryJson"], true);
	
	$allItineraries = array();
	
	if ($result = mysqli_query($con, $query)) {
		
		while($row = $result->fetch_assoc()) {
			//echo $row['itineraryJson'];
			$itinerary = json_decode($row['itineraryJson'], true);
			
			$coords = array();
			
			if($itinerary != null) {
				foreach ($itinerary as $place) {
					
					if($departureDt == null || strpos($place["departureDateTime"], $departureDt) !== false) {
						// Build coords JSON
						$departurePlaceName = "";
						$arrivalPlaceName = "";
						
						foreach ($place["departurePlace"]["address_components"] as $addressComponent) {
							//echo json_encode($addressComponent);
							//echo $addressComponent["long_name"] . "<br/>";
							$departurePlaceName = $addressComponent["long_name"];
							break; // Take only the first component
						}
						foreach ($place["arrivalPlace"]["address_components"] as $addressComponent) {
							$arrivalPlaceName = $addressComponent["long_name"];
							break; // Take only the first component
						}
						
						$lat = $place["departurePlace"]["geometry"]["location"]["lat"];
						$lng = $place["departurePlace"]["geometry"]["location"]["lng"];
						
						$coords["departure"] = "{".$lat.",".$lng."}";
						
						$coordsStr = "{\"lat\":".$lat.",\"lng\":".$lng."},";
						
						$lat = $place["arrivalPlace"]["geometry"]["location"]["lat"];
						$lng = $place["arrivalPlace"]["geometry"]["location"]["lng"];
						
						$coords["arrival"] = "{".$lat.",".$lng."}";
						
						$coordsStr .= "{\"lat\":".$lat.",\"lng\":".$lng."}";
						
						// Append itinerary
						if(array_key_exists($coordsStr, $allItineraries)) {
							$allItineraries[$coordsStr]["counter"]++;
						} else {
							$allItineraries[$coordsStr] = array(
								"counter" => 1,
								"departure" => $departurePlaceName,
								"arrival" => $arrivalPlaceName,
								"users" => array()
							);
						}
						
						// Show contact information (if allowed)
						if($row['publishContact'] == 1) {
							$user = array (
								"name" => $row["name"] . " " . $row["surname"],
								"antenna" => $row["antenna"],
								"zeusCode" => $row["zeusCode"],
								"transportation" => $place["transportation"],
								"departureDateTime" => $place["departureDateTime"]
							);
							
							array_push($allItineraries[$coordsStr]["users"], $user);
						}
					}
				}
			}
		}
		
		echo(json_encode($allItineraries));
	}
}

if(strcmp($action, "exp") == 0) {
	$departureDt = (isset($_GET["departuredt"])) ? $_GET["departuredt"] : null;
	//$arrivalDt = (isset($_GET["arrivaldt"])) ? $_GET["arrivaldt"] : null;
	
	$query = "SELECT `zeusCode`, `name`, `surname`, `antenna`, `email`, `mobile`, `itineraryJson`, `publishContact`, `publishItinerary` FROM Participants";
	
	$itinerary = json_decode($route["itineraryJson"], true);
	
	$allItineraries = array();
	$markers = array();
	//$users = array();
	
	if ($result = mysqli_query($con, $query)) {
		
		while($row = $result->fetch_assoc()) {
			//echo $row['itineraryJson'];
			$itinerary = json_decode($row['itineraryJson'], true);
			
			//$coords = array();
			
			if($itinerary != null) {
				foreach ($itinerary as $place) {
					
					if($departureDt == null || strpos($place["departureDateTime"], $departureDt) !== false) {
						// Build coords JSON
						$departurePlaceName = "";
						$arrivalPlaceName = "";
						
						foreach ($place["departurePlace"]["address_components"] as $addressComponent) {
							//echo json_encode($addressComponent);
							//echo $addressComponent["long_name"] . "<br/>";
							$departurePlaceName = $addressComponent["long_name"];
							break; // Take only the first component
						}
						foreach ($place["arrivalPlace"]["address_components"] as $addressComponent) {
							$arrivalPlaceName = $addressComponent["long_name"];
							break; // Take only the first component
						}
						
						$lat = $place["departurePlace"]["geometry"]["location"]["lat"];
						$lng = $place["departurePlace"]["geometry"]["location"]["lng"];
						
						//$coords["departure"] = "{".$lat.",".$lng."}";
						
						$coordsStr = "{\"lat\":".$lat.",\"lng\":".$lng."},";
						
						$lat = $place["arrivalPlace"]["geometry"]["location"]["lat"];
						$lng = $place["arrivalPlace"]["geometry"]["location"]["lng"];
						
						//$coords["arrival"] = "{".$lat.",".$lng."}";
						
						$arrivalCoordsStr = "{\"lat\":".$lat.",\"lng\":".$lng."}";
						$coordsStr .= $arrivalCoordsStr;
						
						// Append itinerary
						if(array_key_exists($coordsStr, $allItineraries)) {
							$allItineraries[$coordsStr]["counter"]++;
						} else {
							$allItineraries[$coordsStr] = array(
								"counter" => 1,
								"departure" => $departurePlaceName,
								"arrival" => $arrivalPlaceName,
								"users" => array()
							);
						}
						
						// Show contact information (if allowed)
						if($row['publishContact'] == 1) {
							$user = array (
								"name" => $row["name"] . " " . $row["surname"],
								"antenna" => $row["antenna"],
								"zeusCode" => $row["zeusCode"],
								"transportation" => $place["transportation"],
								"departureDateTime" => $place["departureDateTime"],
								"arrivalDateTime" => $place["arrivalDateTime"]
							);
							
						/*if(!array_key_exists($row["zeusCode"], $allItineraries[$coordsStr]["users"])) {
								$allItineraries[$coordsStr]["users"] = array(
									"zeusCode" => $row["zeusCode"],
									"users" => array()
								);
							}
							
							$itinerary = array(
								"zeusCode" => $row["zeusCode"],
								"transportation" => $place["transportation"],
								"departureDateTime" => $place["departureDateTime"],
								"arrivalDateTime" => $place["arrivalDateTime"]
							);*/
							
							array_push($allItineraries[$coordsStr]["users"], $user);
							//$users[$row["zeusCode"]] = $user;
							
							if(!array_key_exists($arrivalCoordsStr, $markers)) {
								$markers[$arrivalCoordsStr] = array(
									"users" => array(),
									"name" => $arrivalPlaceName
								);
							}
							array_push($markers[$arrivalCoordsStr]["users"], $user);
						}
					}
				}
			}
		}
		
		$o = array(
			//"users" => $users,
			"itineraries" => $allItineraries,
			"markers" => $markers,
		);
		
		echo(json_encode($o));
	}
}

// Not used
function distance($lat1, $lon1, $lat2, $lon2) {
	$p = 0.017453292519943295;    // Math.PI / 180
	$c = cos;
	$a = 0.5 - $c(($lat2 - $lat1) * $p)/2 + 
			$c($lat1 * $p) * c($lat2 * $p) * 
			(1 - $c(($lon2 - $lon1) * $p))/2;

	return 12742 * asin(sqrt($a)); // 2 * R; R = 6371 km
}

mysqli_close($con);

?>