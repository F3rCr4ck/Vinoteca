<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome';

$route['principal'] = 'Welcome/index';
$route['NuestraVinoteca'] = 'Welcome/NuestraVinoteca';
$route['Registrarse'] = 'Welcome/Registrarse';
$route['IniciarSesion'] = 'Welcome/IniciarSesion';


$route['Catalogo_invitado'] = 'Welcome/Catalogo';
$route['Catalogo_invitado/(:num)'] = 'Welcome/Catalogo/$1';

$route['Mostrar_usuarios'] = 'back/usuario_controller/listar_usuarios';
$route['Mostrar_usuarios/(:num)'] = 'back/usuario_controller/listar_usuarios/$1';

$route ['verifico_nuevoregistro'] = 'back/usuario_controller';

//pasará la coincidencia como una variable al método "muestra_modificar_usuario".
$route['modificar_usuario/(:num)'] = 'back/usuario_controller/muestra_modificar_usuario/$1';
$route['eliminar_usuario/(:num)'] = 'back/usuario_controller/eliminar_usuario/$1';
$route['verifico_modificar_usuario/(:num)'] = 'back/usuario_controller/modificar_usuario/$1';

$route['verifico_usuario'] = 'back/login_controller';
$route ['cerrar_sesion'] = 'back/login_controller/cerrar_sesion';


$route ['verifico_nuevo_producto'] = 'back/producto_controller/agrega_producto';
$route['AgregarProductos'] = 'back/producto_controller/form_agrega_producto';

$route['MostrarProductos'] = 'back/producto_controller/index';
$route['MostrarProductos/(:num)'] = 'back/producto_controller/index/$1';


$route['ProductosEliminados'] = 'back/producto_controller/muestra_eliminados';
$route['Modificar_producto/(:num)'] = 'back/producto_controller/muestra_modificar/$1';
$route['verifico_modificar_producto/(:num)'] = 'back/producto_controller/modificar_producto/$1';
$route['EliminarProducto/(:num)'] = 'back/producto_controller/eliminar_producto/$1';
$route['ActivarProducto/(:num)'] = 'back/producto_controller/activar_producto/$1';

/*Muestra las tablas de los productos por secciones en admin*/
$route[''] = 'back/producto_controller/muestra_vinos_tinto';
$route['Mostrar_vinos_tinto/(:num)'] = 'back/producto_controller/muestra_vinos_tinto/$1';

$route['Mostrar_vinos_blanco'] = 'back/producto_controller/muestra_vinos_blanco';
$route['Mostrar_vinos_blanco/(:num)'] = 'back/producto_controller/muestra_vinos_blanco/$1';

$route['Mostrar_vinos_rosado'] = 'back/producto_controller/muestra_vinos_rosado';
$route['Mostrar_vinos_rosado/(:num)'] = 'back/producto_controller/muestra_vinos_rosado/$1';

$route['Muestra_ventas'] = 'back/producto_controller/listar_ventas';
$route['Muestra_ventas/(:num)'] = 'back/producto_controller/listar_ventas/$1';

$route['Muestra_detalle/(:num)'] = 'back/producto_controller/muestra_detalle/$1';

$route['Informe'] = 'back/informes_controller/form_nuevo_informe';
$route['verifico_nuevo_informe'] = 'back/informes_controller/agregar_informe';
$route['verifico_nuevo_informe_anonimo'] = 'back/informes_controller/agregar_informe_anonimo';
$route['Muestra_informes'] = 'back/informes_controller/listar_informes';
$route['Muestra_informes_anonimos'] = 'back/informes_controller/listar_informes_anonimos';

/*Rutas del usuario cliente*/
$route['Mis_compras'] = 'back/producto_controller/listar_compras';

$route['catalogo'] = 'back/carrito_controller/catalogo';
$route['catalogo/(:num)'] = 'back/carrito_controller/catalogo/$1';

$route['seccion_tintos'] = 'back/carrito_controller/seccion_tintos';
$route['seccion_tintos/(:num)'] = 'back/carrito_controller/seccion_tintos/$1';

$route['seccion_blancos'] = 'back/carrito_controller/seccion_blancos';
$route['seccion_blancos/(:num)'] = 'back/carrito_controller/seccion_blancos/$1';

$route['seccion_rosados'] = 'back/carrito_controller/seccion_rosados';
$route['seccion_rosados/(:num)'] = 'back/carrito_controller/seccion_rosados/$1';



$route['Agregar_al_carrito'] = 'back/carrito_controller/add';
$route['Actualizar_carrito'] = 'back/carrito_controller/actualiza_carrito';
$route['Eliminar_del_carrito/(:any)'] = 'back/carrito_controller/remove/$1';
$route['Comprar'] = 'back/carrito_controller/muestra_compra';
$route['Confirmar_compra'] = 'back/carrito_controller/guarda_compra';


$route['info_producto/(:num)'] = 'back/carrito_controller/info_producto/$1';
$route['buscar'] = 'back/busqueda_controller/busqueda_productos';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
