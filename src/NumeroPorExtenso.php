<?php

namespace LennonCecere;

use InvalidArgumentException;

class NumeroPorExtenso extends Geral
{
	public static function converter($numero): string
	{
		if (!is_float($numero) && !is_int($numero)) {
			throw new InvalidArgumentException('O valor informado não é válido.');
		}

		$parteInteira = floor($numero);
		// Extraímos a parte decimal corretamente com dois dígitos
		$parteDecimal = ($numero - $parteInteira) * 100;

		// Função recursiva para converter a parte inteira
		$extensoInteiro = self::convertNumberToWords($parteInteira, self::UNIDADES, self::DEZENAS, self::CENTENAS, self::MILHARES);

		// Converte a parte decimal para extenso sem escalas
		$extensoDecimal = self::convertNumberToWords($parteDecimal, self::UNIDADES, self::DEZENAS, self::CENTENAS, self::MILHARES);

		// Verifica se a parte decimal é zero e ajusta o retorno
		if ($parteDecimal == 0) {
			return ucfirst("{$extensoInteiro}");
		}

		return ucfirst("{$extensoInteiro} e {$extensoDecimal}");
	}

	private static function convertNumberToWords($number, $unidades, $dezenas, $centenas, $milhares)
	{
		if ($number == 0) {
			return 'zero';
		}

		$extenso = '';
		$i = 0;

		while ($number > 0) {
			if ($number % 1000 != 0) {
				$extenso = self::convertHundreds($number % 1000, $unidades, $dezenas, $centenas) . ($milhares[$i] ? ' ' . $milhares[$i] : '') . ' ' . $extenso;
			}
			$number = (int)($number / 1000);
			$i++;
		}

		return trim($extenso);
	}

	private static function convertHundreds($number, $unidades, $dezenas, $centenas)
	{
		$extenso = '';

		if ($number >= 100) {
			// Verifica se o número é exatamente 100
			if ($number == 100) {
				$extenso .= 'cem';
			} else {
				// Para números entre 101 e 199, deve-se usar "cento"
				$extenso .= 'cento e ';
			}
			$number %= 100;
		}

		if ($number >= 20) {
			$extenso .= $dezenas[(int)($number / 10)] . ' e ';
			$number %= 10;
		}

		if ($number > 0) {
			$extenso .= $unidades[$number] . ' ';
		}

		return trim($extenso);
	}
}