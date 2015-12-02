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
 
 	echo "verbunden<br>";

}
catch(PDOException $e) {
    echo "I'm sorry, Dave. I'm afraid I can't do that.";
    echo $e->getMessage();
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
		//$cathy = new person('Cathy','9 Dark and Twisty','Cardiff');
		# here's the fun part:

		$STH = $DBH->prepare("INSERT INTO termine (id,VName,Beschreibung,Datum,ZeitVon,ZeitBis,RID,Ort,PID,GName,StID,ZName,Sprache,erstellt_am, freigegeben_am) 
			values (:id,:VName,:Beschreibung,:Datum,:ZeitVon,:ZeitBis,:RID,:Ort,:PID,:GName,:StID,:ZName,:Sprache,:erstellt_am, :freigegeben_am)");

		// :VName,:Beschreibung,:Datum,:ZeitVon,:ZeitBis,:RID,:Ort,:PID,:GName,:StID,:ZName,:Sprache,:erstellt_am, :freigegeben_am
		//?,?,?,?,?,?,?,?,?,?,?,?,?,?,?
		$terminArr=(array)$objTermin;
		echo "<pre>",print_r($terminArr),"</pre>";
		$STH->execute($terminArr);
		echo 'Termin wurde gespeichert<br>';
	}

}

// $arrayName = array('id' => 1, 'VName' => "Tom");
// echo "<pre>",print_r($arrayName),"</pre>";


$objTermin = new Termin('TOM','Tag der Offenen Moschee','03.10.2015','14:30','17:30',1,'Mainz',1,'Beirat',2,'nicht muslime','Deutsch','01.12.2015', '01.12.2015');
//echo "<pre>",print_r(array($objTermin)),"</pre>";
$objTermin->termin_speichern($objTermin, $DBH);


//public a simple object
// class person {
//     public $name;
//     public $addr;
//     public $city;
//     function __construct($n,$a,$c) {
//         $this->name = $n;
//         $this->addr = $a;
//         $this->city = $c;
//     }
//     # etc ...
// }
 
// $cathy = new person('Cathy','9 Dark and Twisty','Cardiff');
 
// # here's the fun part:
// $STH = $DBH->prepare("INSERT INTO folks (name, addr, city) value (:name, :addr, :city)");
// $STH->execute((array)$cathy);








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





