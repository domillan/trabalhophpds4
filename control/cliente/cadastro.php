<?php
include("../model/Cliente.php");

print_r(Cliente::all());
include("../view/cliente.html");
?><a href='../compra/index.php'>Compra</a>