<?php

require 'vendor/autoload.php';

use LennonCecere\NumeroPorExtenso;

echo "Iniciando o teste...\n";

try {
	echo NumeroPorExtenso::converter('1,2');
} catch (Throwable $e) {
	echo "Erro: " . $e->getMessage();
}

echo "\nFinalizando o teste.\n";
