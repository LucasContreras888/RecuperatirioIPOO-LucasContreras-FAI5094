<?php
require_once 'Cliente.php';
require_once 'Cuota.php';
require_once 'Prestamo.php';
require_once 'Financiera.php';

//Creamos la financiera.
$financiera = new Financiera("ElectroCash", "Av. Arg 123");

//Creamos los clientes.
$cliente1 = new Cliente("Pepe", "Florez", "12345678", "Bs As 12", "dir@mail.com", "299 444567", 40000);
$cliente2 = new Cliente("Luis", "Suarez", "87654321", "Bs As 123", "dir@mail.com", "299 4455", 4000);

$prestamo1 = new Prestamo(50000, 5, 0.1, $cliente1);
$prestamo2 = new Prestamo(10000, 4, 0.1, $cliente2);
$prestamo3 = new Prestamo(10000, 2, 0.1, $cliente2);

$financiera->incorporarPrestamo($prestamo1);
$financiera->incorporarPrestamo($prestamo2);
$financiera->incorporarPrestamo($prestamo3);
echo $financiera;


?>