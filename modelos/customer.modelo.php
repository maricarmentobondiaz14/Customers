<?php

require_once "conexion.php";

class ModeloCustomer{


	static public function mdlRegistrarCustomer($datos){

	

		$stmt = Conexion::conectar()->prepare("INSERT INTO customer VALUES (:customerID,:customerName, :contactName, :address, :city, :postalCode, :country)");

		$stmt->bindParam(":customerID", $datos["customerID"], PDO::PARAM_STR);
		$stmt->bindParam(":customerName", $datos["customerName"], PDO::PARAM_STR);
		$stmt->bindParam(":contactName", $datos["contactName"], PDO::PARAM_STR);
		$stmt->bindParam(":address",$datos["address"],PDO::PARAM_STR);
		$stmt->bindParam(":city",$datos["city"],PDO::PARAM_STR);
		$stmt->bindParam(":postalCode",$datos["postalCode"],PDO::PARAM_STR);
		$stmt->bindParam(":country",$datos["country"],PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	

	}


	static public function mdlSeleccionarCustomer($item, $valor){

		if($item == null && $valor == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM customer");

			$stmt->execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM customer WHERE $item = :$item ");

			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt -> fetch();
		}

		$stmt->close();

		$stmt = null;	

	}



	static public function mdlActualizarCustomer($datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE customer SET customerName=:customerName, contactName=:contactName,address=:address, city=:city, postalCode=:postalCode, country=:country WHERE customerID = :customerID");

		$stmt->bindParam(":customerID", $datos["customerID"], PDO::PARAM_STR);
		$stmt->bindParam(":customerName", $datos["customerName"], PDO::PARAM_STR);
		$stmt->bindParam(":contactName", $datos["contactName"], PDO::PARAM_STR);
		$stmt->bindParam(":address",$datos["address"],PDO::PARAM_STR);
		$stmt->bindParam(":city",$datos["city"],PDO::PARAM_STR);
		$stmt->bindParam(":postalCode",$datos["postalCode"],PDO::PARAM_STR);
		$stmt->bindParam(":country",$datos["country"],PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	

	}


	static public function mdlEliminarCustomer($valor){
	
		$stmt = Conexion::conectar()->prepare("DELETE FROM customer WHERE customerID = :customerID");

		$stmt->bindParam(":customerID", $valor, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt->close();

		$stmt = null;	

	}



}