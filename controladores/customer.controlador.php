<?php

class ControladorCustomer{



	static public function ctrRegistroCustomer(){

		if(isset($_POST["customerName"])){

			

			$datos = array("customerID"=> $_POST["customerID"],
				           "customerName" => $_POST["customerName"],
				           "contactName" => $_POST["contactName"],
				           "address" => $_POST["address"],
						    "city" => $_POST["city"],
						    "postalCode"=> $_POST["postalCode"],
						    "country" => $_POST["country"],
						);

			$respuesta = ModeloCustomer::mdlRegistrarCustomer($datos);

			return $respuesta;

		}

	}

	static public function ctrSeleccionarRegistros($item, $valor){


		$respuesta = ModeloCustomer::mdlSeleccionarCustomer($item, $valor);

		return $respuesta;

	}

	static public function ctrActualizarRegistro(){

		if(isset($_POST["customerName"])){

			$datos = array("customerID"=> $_POST["customerID"],
				            "customerName" => $_POST["customerName"],
							"contactName" => $_POST["contactName"],
				            "address" => $_POST["address"],
				            "city" => $_POST["city"],
						    "postalCode"=> $_POST["postalCode"],
						    "country"=>$_POST["country"]);

			$respuesta = ModeloCustomer::mdlActualizarCustomer($datos);

			return $respuesta;

		}


	}

	/*=============================================
	Eliminar Registro
	=============================================*/
	public function ctrEliminarRegistro(){

		if(isset($_POST["eliminarRegistro"])){

			$valor = $_POST["eliminarRegistro"];

			$respuesta = ModeloCustomer::mdlEliminarCustomer($valor);

			if($respuesta == "ok"){

				echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

					window.location = "index.php?pagina=inicio";

				</script>';

			}

		}

	}


}