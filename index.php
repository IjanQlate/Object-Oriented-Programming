<?php
class database {

	private $hostdb = "localhost";
	private $userdb = "root";
	private $passdb = "";
	private $db     = "oop";

	public $query;
	public $error;
	public $statement;

	public function __construct() {

		$this->query = new mysqli($this->hostdb,$this->userdb,$this->passdb,$this->db);
		
		if ($this->query->connect_error) {
			$this->error = "connection error: ".$this->query->connect_error;
		}

	}

	public function query($sql) {
		$this->statement = $this->query->prepare($sql);
	}

	public function execute() {
		$this->statement->execute();
	}

	public function count() {

		$this->execute();
		$this->statement->store_result();
		return $this->statement->num_rows();

	}

}

if (isset($_POST['login'])) {

	$staffid 	= htmlspecialchars(strip_tags($_POST['staff_id']));
	$password	= htmlspecialchars(strip_tags($_POST['password']));

	$query = "SELECT * FROM login WHERE staffid = '$staffid' AND passwd = '$password'";
	$database = new database();
	$database->query($query);
	$result = $database->count();

	if ($result > 0) { echo "Say Hi"; }
	else { echo "Say Bye"; }


	
	//$host = "localhost";
	//$user = "root";
	//$pass = "";
	//$db   = "oop";

	/* Open a connection */
	//$conn = new mysqli($host, $user, $pass, $db);

	// Check connection
	//if ($conn->connect_error) {
	   // die("Connection failed: " . $conn->connect_error);
	//} 
	//else {

		//$query = "SELECT * FROM login WHERE staffid = '$staffid' AND passwd = '$password'";
		//$stmt = $conn->prepare($query);
		/* execute query */
		//$stmt->execute();
		/* store result */
		//$stmt->store_result();
		/* num rows */
		//$rows = $stmt->num_rows;

		//echo $rows;


		/* free result */
		//$stmt->free_result();
		/* close statement */
		//$stmt->close();

	//}

	/* close connection */	
	//$conn->close();


}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Object Oriented Login Page</h2>

<form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
  Staff Id:<br>
  <input type="text" name="staff_id" value="" placeholder="Enter Staff Id">
  <br>
  Password:<br>
  <input type="password" name="password" value="" placeholder="Enter Password">
  <br><br>
  <input type="submit" name="login" value="Login">
</form> 
</body>
</html>