<?php

class ControladorCarrito{

	/*=============================================
	MOSTRAR TARIFAS
	=============================================*/

	public function ctrMostrarTarifas(){

		$tabla = "comercio";

		$respuesta = ModeloCarrito::mdlMostrarTarifas($tabla);

		return $respuesta;

	}	

	/*=============================================
	NUEVAS COMPRAS
	=============================================*/

	static public function ctrNuevasCompras($datos){

		$tabla = "compras";

		$respuesta = ModeloCarrito::mdlNuevasCompras($tabla, $datos);

		if($respuesta == "ok"){

			$tabla = "comentarios";
			ModeloUsuarios::mdlIngresoComentarios($tabla, $datos);

    /*=============================================
	ACTUALIZACIÓN DE NOTIFICACIONES DE NUEVAS VENTAS
	=============================================*/

		$traernotificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

		$nuevaVenta = $traernotificaciones["nuevasVentas"] + 1;

		ModeloNotificaciones::mdlActualizarNotificaciones("notificaciones", "nuevasVentas", $nuevaVenta);

		}

		return $respuesta;

	}

	/*=============================================
	VERIFICAR PRODUCTO COMPRADO
	=============================================*/

	static public function ctrVerificarProducto($datos){

		$tabla = "compras";

		$respuesta = ModeloCarrito::mdlVerificarProducto($tabla, $datos);
	 
	    return $respuesta;

		
	}

}