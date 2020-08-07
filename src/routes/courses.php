<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

//Tüm kayıtları getir.
$app->get('/courses', function (Request $request, Response $response) {
    
	$db =new Db();

	try {
		$db =$db->connect();

		$courses = $db->query("SELECT * FROM courses")->fetchAll(PDO::FETCH_OBJ);

			return $response
				->withStatus(200)
				->withHeader("Content-Type", "application/json")
				->withJson($courses);
	
	} catch (PDOException $e) {
		
		return $response->withJson(
			array(
				"error" => array(
					"text" => $e->getMessage(),
					"code" => $e->getCode()
				)
			)
		);
	}


	$db = null;


});

//Tek kayıt getir
$app->get('/course/{id}', function (Request $request, Response $response) {
    
    $id = $request->getAttribute('id');
	$db =new Db();

	try {
		$db =$db->connect();

		$course = $db->query("SELECT * FROM courses where id = $id")->fetch(PDO::FETCH_OBJ);

			return $response
				->withStatus(200)
				->withHeader("Content-Type", "application/json")
				->withJson($course);
	
	} catch (PDOException $e) {
		
		return $response->withJson(
			array(
				"error" => array(
					"text" => $e->getMessage(),
					"code" => $e->getCode()
				)
			)
		);
	}


	$db = null;


});

//Ekleme işlemi
$app->post('/course/add', function (Request $request, Response $response) {
    
    $title =$request->getParam("title");
    $couponCode =$request->getParam("couponCode");
    $price =$request->getParam("price");


	$db =new Db();

	try {
		$db =$db->connect();
		$statement ="INSERT INTO courses (title,couponCode, price) VALUES (:title, :couponCode, :price)";
		$prepare =$db->prepare($statement);
		
		$data =array(
			'title'			=> $title,
			'couponCode' 	=> $couponCode,
			'price'			=> $price
		);
		$prepare->bindParam("title", $title);
		$prepare->bindParam("couponCode", $couponCode);
		$prepare->bindParam("price", $price);
		$course =$prepare->execute();

		if($course) {
				return $response
				->withStatus(200)
				->withHeader("Content-Type", "application/json")
				->withJson(array(
					"text" => "Kurs başarılı bir şekilde eklenmiştir."
				));
	
		} else {
				return $response
				->withStatus(500)
				->withHeader("Content-Type", "application/json")
				->withJson(array(
					"error" => array(
						"text" => "Ekleme işlemi sırasında bir problem oluştu."
					)
				));
	
		}

		
	} catch (PDOException $e) {
		
		return $response->withJson(
			array(
				"error" => array(
					"text" => $e->getMessage(),
					"code" => $e->getCode()
				)
			)
		);
	}


	$db = null;


});


//Güncelleme işlemi
$app->put('/course/update/{id}', function (Request $request, Response $response) {
    
    $id = $request->getAttribute('id');	
    $title =$request->getParam("title");
    $couponCode =$request->getParam("couponCode");
    $price =$request->getParam("price");


	$db =new Db();

	try {
		$db =$db->connect();
		$statement ="UPDATE courses SET
			title=:title,
			couponCode=:couponCode,
			price=:price WHERE id=:id";
		$prepare =$db->prepare($statement);
		
		$course =$prepare->execute(array(
			'title'			=> $title,
			'couponCode' 	=> $couponCode,
			'price'			=> $price,
			'id'			=> $id
		));

		if($course) {
				return $response
				->withStatus(200)
				->withHeader("Content-Type", "application/json")
				->withJson(array(
					"text" => "Kurs başarılı bir şekilde güncellendi."
				));
	
		} else {
				return $response
				->withStatus(500)
				->withHeader("Content-Type", "application/json")
				->withJson(array(
					"error" => array(
						"text" => "Güncelleme işlemi sırasında bir problem oluştu."
					)
				));
	
		}

		
	} catch (PDOException $e) {
		
		return $response->withJson(
			array(
				"error" => array(
					"text" => $e->getMessage(),
					"code" => $e->getCode()
				)
			)
		);
	}


	$db = null;


});