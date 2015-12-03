<?php
$host='localhost';
$dbname='ikvevents';
$user='root';
$pass='simsim';
# connect to the database
try {

	echo "test<br>";
  	$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
  	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  	$DBH->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


 	//echo "DB verbunden<br>";

}
catch(PDOException $e) {
    echo "Es gab einen Verbindungsfehler".$e->getMessage();
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
}

class Termin{
	public $id;
	public $VName;
	public $Beschreibung;
	public $Datum;
	public $ZeitVon;
	public $ZeitBis;
	public $RID;
	public $Ort;
	public $PID;
	public $GName;
	public $StID;
	public $ZName;
	public $Sprache;
	public $erstellt_am;
	public $freigegeben_am;

	public function __construct($VName,	$Beschreibung,$Datum,$ZeitVon,$ZeitBis,$RID,$Ort,$PID,$GName,$StID,$ZName,$Sprache,$erstellt_am, $freigegeben_am){
		$this->id = "";
		$this->VName=$VName;
		$this->Beschreibung=$Beschreibung;
		$this->Datum=$Datum;
		$this->ZeitVon=$ZeitVon;
		$this->ZeitBis=$ZeitBis;
		$this->RID=$RID;
		$this->Ort=$Ort;
		$this->PID=$PID;
		$this->GName=$GName;
		$this->StID=$StID;
		$this->ZName=$ZName;
		$this->Sprache=$Sprache;
		$this->erstellt_am=$erstellt_am;
		$this->freigegeben_am=$freigegeben_am;
	}

	function termin_speichern($objTermin, $DBH){

		$STH = $DBH->prepare("INSERT INTO termine (id,VName,Beschreibung,Datum,ZeitVon,ZeitBis,RID,Ort,PID,GName,StID,ZName,Sprache,erstellt_am, freigegeben_am) 
			values (:id,:VName,:Beschreibung,:Datum,:ZeitVon,:ZeitBis,:RID,:Ort,:PID,:GName,:StID,:ZName,:Sprache,:erstellt_am, :freigegeben_am)");

		$STH->bindParam(":VName", $VName);
		$STH->bindParam(":Beschreibung", $Beschreibung);
		$STH->bindParam(":Datum", $Datum);
		$STH->bindParam(":ZeitVon", $ZeitVon);
		$STH->bindParam(":ZeitBis", $ZeitBis);
		$STH->bindParam(":RID", $RID);
		$STH->bindParam(":Ort", $Ort);
		$STH->bindParam(":PID", $PID);
		$STH->bindParam(":GName", $GName);
		$STH->bindParam(":StID", $StID);
		$STH->bindParam(":ZName", $ZName);
		$STH->bindParam(":Sprache", $Sprache);
		$STH->bindParam(":erstellt_am", $erstellt_am);
		$STH->bindParam(":freigegeben_am", $freigegeben_am);
	

		$terminArr=(array)$objTermin;
		echo "<pre>",print_r($terminArr),"</pre>";
		$STH->execute($terminArr);
		echo 'Termin wurde gespeichert<br>';
	}

}


ini_set('date.timezone', 'Europe/Berlin');

// $arrayName = array('id' => 1, 'VName' => "Tom");
// echo "<pre>",print_r($arrayName),"</pre>";
if($status==='saved'){
	echo "Termin wurde erfolgreich gespeichert.";
}
if(isset($_POST) && substr($_SERVER['HTTP_REFERER'],-12)==='newevent.php')
{
	//echo "<br>calling page=".substr($_SERVER['HTTP_REFERER'],-12);
	//echo "<pre>",print_r($_POST),"</pre>";
	$VName		  	=	$_POST['VName'];
	$Beschreibung 	=	$_POST['Beschreibung'];
	$Datum		  	=	$_POST['Datum'];
	$ZeitVon	  	=	$_POST['ZeitVon'];
	$ZeitBis	  	=	$_POST['ZeitBis'];
	$RID		  	=	$_POST['RID'];
	$Ort		  	=	$_POST['Ort'];
	$PID		  	=	$_POST['PID'];
	$GName		  	=	$_POST['GName'];
	$StID		  	=	$_POST['StID'];
	$ZName		  	=	$_POST['ZName'];
	$Sprache	  	=	$_POST['Sprache'];
	$erstellt_am    =	date('H:i', gmdate('U'));
	$freigegeben_am	=	NULL;

	try{
		$objTermin = new Termin($VName,$Beschreibung,$Datum,$ZeitVon,$ZeitBis,$RID,$Ort,$PID,$GName,$StID,$ZName,$Sprache,$erstellt_am,$freigegeben_am);
		//echo "<pre>",print_r(array($objTermin)),"</pre>";
		$objTermin->termin_speichern($objTermin, $DBH);
		$status="saved";
		header("Location: http://localhost/ikvem/index.php");
		die();
	}catch(PDOException $e){
		echo "Es gab einen Fehler".$e->getMessage();
	}

}



// # using the shortcut ->query() method here since there are no variable
// # values in the select statement.
// $STH = $DBH->query('SELECT * from gruppe');

// # setting the fetch mode
// $STH->setFetchMode(PDO::FETCH_ASSOC);
 
// while($row = $STH->fetch()) {
//     echo $row['id'] . "<br>";
//     echo $row['Gruppe'] . "<br>";
// }

// echo ($DBH->lastInsertId());



// $STH->setFetchMode(PDO::FETCH_ASSOC);

// # STH means "Statement Handle"
// $STH = $DBH->prepare("INSERT INTO gruppe ( first_name ) values ( 'Cathy' )");
// $STH->execute();

// $STH = $DBH->("INSERT INTO folks (name, addr, city) values (?, ?, ?);

// # assign variables to each place holder, indexed 1-3
// $STH->bindParam(1, $name);
// $STH->bindParam(2, $addr);
// $STH->bindParam(3, $city);
 
// # insert one row
// $name = "Daniel"
// $addr = "1 Wicked Way";
// $city = "Arlington Heights";
// $STH->execute();
 
// # insert another row with different values
// $name = "Steve"
// $addr = "5 Circle Drive";
// $city = "Schaumburg";
// $STH->execute();

// # the data we want to insert
// $data = array('Cathy', '9 Dark and Twisty Road', 'Cardiff');
 
// $STH = $DBH->("INSERT INTO folks (name, addr, city) values (?, ?, ?);
// $STH->execute($data);





