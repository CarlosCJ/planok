<?php

/**
 * Se activa en menu seleccionado
 */
function setActive($routeName){
//    $activeRoutes = ['cantProductos', 'ventasRealziadas'];
//
//    if (in_array($routeName, $activeRoutes)) {
//        $routeName = 'productos';
//    }

    return request()->routeIs($routeName) ? 'active' : '';
}
