<?php
// create data base for contacts
class dbClass
{
private $host;
private $db;
private $charset;
private $user;
private $pass;

// conction with pdo
private $opt = array(
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
public $connection;
// function constructor 
public function __construct(string $host= "localhost", string $db = "SHAGESHOP",
string $charset = "utf8", string $user = "root", string $pass = "")
{
$this->host = $host;
$this->db = $db;
$this->charset = $charset;
$this->user = $user;
$this->pass = $pass;
}

// conect function
public function connect()
{
$dns = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
$this->connection = new PDO($dns, $this->user, $this->pass, $this->opt);
}
// disconnect function
public function disconnect()
{
$this->connection = null;
}


// function to echo the massage in the end 
// bindParam is to set that value=value
// name=$name
public function getallproducts(){
     
        $this->connect();
        $q=$this->connection->prepare("SELECT * FROM products");
        $q->execute();

        $res = $q->fetchAll();

        $this->disconnect();

        return $res;
}
public function addtocart(){
        include 'database/session.php';
	$output = array('error'=>false);

	$id = $_POST['id'];
	$cost = $_POST['cost'];

	if(isset($_SESSION['user'])){
		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE user_id=:user_id AND product_id=:product_id");
		$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$id]);
		$row = $stmt->fetch();
		if($row['numrows'] < 1){
			try{
				$stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, cost) VALUES (:user_id, :product_id, :cost)");
				$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$id, 'cost'=>$cost]);
				$output['message'] = 'Item added to cart';
				
			}
			catch(PDOException $e){
				$output['error'] = true;
				$output['message'] = $e->getMessage();
			}
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Product already in cart';
		}
	}
	else{
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}

		$exist = array();

		foreach($_SESSION['cart'] as $row){
			array_push($exist, $row['productid']);
		}

		if(in_array($id, $exist)){
			$output['error'] = true;
			$output['message'] = 'Product already in cart';
		}
		else{
			$data['productid'] = $id;
			$data['cost'] = $cost;

			if(array_push($_SESSION['cart'], $data)){
				$output['message'] = 'Item added to cart';
			}
			else{
				$output['error'] = true;
				$output['message'] = 'Cannot add item to cart';
			}
		}

	}
	echo json_encode($output);

}
}


?>
