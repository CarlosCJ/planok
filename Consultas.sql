-- # Listado de clientes que han comprado estacionamientos en Santiago.
SELECT DISTINCT cliente.*, producto.estado, producto.sector, tipo_producto.descripcion
FROM cliente
    RIGHT JOIN cotizacion ON cliente.id = cotizacion.idCliente
    INNER JOIN cotizacion_producto ON cotizacion.idCotizacion = cotizacion_producto.idCotizacion
    INNER JOIN producto ON cotizacion_producto.idProducto = producto.idProducto
       AND producto.sector = 'Santiago' AND producto.estado = 'VENDIDO'
    INNER JOIN tipo_producto ON producto.idTipoProducto = tipo_producto.idTipoProducto
        AND tipo_producto.descripcion = 'Estacionamiento';

-- # Total, de departamentos Vendidos por el usuario PILAR PINO en Las Condes.
SELECT COUNT(usuario.id) AS cantidad_vendidos, CONCAT(usuario.nombre, ' ', usuario.apellido) AS nombre_completo,
    tipo_producto.descripcion, producto.sector, producto.estado
FROM usuario
    INNER JOIN cotizacion ON usuario.id = cotizacion.idUsuario
    INNER JOIN cotizacion_producto ON cotizacion.idCotizacion = cotizacion_producto.idCotizacion
    INNER JOIN producto ON cotizacion_producto.idProducto = producto.idProducto
        AND producto.sector = 'Las Condes' AND producto.estado = 'VENDIDO'
    INNER JOIN tipo_producto ON producto.idTipoProducto = tipo_producto.idTipoProducto
        AND tipo_producto.descripcion = 'producto principal'
WHERE usuario.nombre = 'Pilar'
    AND usuario.apellido = 'Pino';

-- # Listar Productos creados entre el 2018-01-03 y 2018-01-20
SELECT * FROM producto WHERE fechaCreacion BETWEEN '2018-01-03' AND '2018-01-20';

-- # Sumar el total de ventas realizadas en Santiago
SELECT sector, SUM(valorLista) AS total
FROM producto
WHERE estado = 'VENDIDO' AND sector = 'Santiago'
GROUP BY sector;
