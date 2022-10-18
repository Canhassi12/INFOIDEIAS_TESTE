<?php

namespace SRC;

class Funcoes
{
    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $ano): int {
        return floor($ano / 100) + (($ano%100 ? 1 : $ano) % 10 ? 1 : 0); // Após receber um número, ele é divido por 100, que seria o 'numero de divisões de cada século', porém não é de 100 a 200, e sim de 101 a 200, então a temos que calcular com os restos das divisões para descobrir o valor de qual século é. 
    }
	
	
	
	
	
	/*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    public function PrimoAnterior(int $numero): int {
        for ($contador = 1; $contador < $numero; $contador++) { //verifica quantos numeros há até o até o Numero recebido.

            $divisoresDoNumero = 0;
            
            for ($i = $contador; $i >= 1; $i--) { // Verifica quantos numêros contador pode ser divido sem haver restos.
                if (($contador % $i) == 0){
                    $divisoresDoNumero++;
                }
            }
            
            if ($divisoresDoNumero == 2 ) { // Se o numero de divisões sem haver restos for igual a 2(por 1 e por ele mesmo), o numero é primo.
                $numeroPrimo = $contador;
            }
        }
        return $numeroPrimo;
    }










    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    public function SegundoMaior(array $arr): int {
        $array = array();
        
        foreach ($arr as $numeros) { // coleta os numeros de todos os arrays e coloca em apenas um. 
            $array = array_merge($array, array_values($numeros));
        }

        rsort($array); // coloca os numeros em ordem decrescente.
        
        return $array[1];
    }
	
	
	
	
	
	
	

    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true
    [1, 2, 1, 2]  false
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false
    [1, 4, 10, 4, 2] false
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false
    [0, -2, 5, 6] true
    [1, 2, 3, 4, 5, 3, 5, 6] false
    [40, 50, 60, 10, 20, 30] false
    [1, 1] true
    [1, 2, 5, 3, 5] true
    [1, 2, 5, 5, 5] false
    [10, 1, 2, 3, 4, 5, 6, 1] false
    [1, 2, 3, 4, 3, 6] true
    [1, 2, 3, 4, 99, 5, 6] true
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true
    [3, 5, 67, 98, 3] true

     * */
    
	public function SequenciaCrescente(array $arr): bool {
        $state = false;

        array_pop($arr);

        if (count($arr) == 1) {
            $state = true;
        } else {
            for ($i = 0; $i < count($arr) - 1; $i++) {
                if ($arr[$i] > $arr[$i + 1]) {
                    $state = false;
                } else {
                    $state = true;
                }
            }
        }
        return $state;
        //senti dificuldade nesse aqui, alguns vão alguns não vão kkkk.
    }
}

  
// TESTES

$funcao1 = new Funcoes; 
echo($funcao1->SeculoAno(1905)) . PHP_EOL;
//
$funcao2 = new Funcoes; 
echo($funcao2->PrimoAnterior(29)) . PHP_EOL;
//
$array = array (
    array(25,22,18),
    array(10,15,13),
    array(24,5,2),
    array(80,17,15)
);
$funcao3 = new Funcoes; 
echo($funcao3->SegundoMaior($array)) . PHP_EOL;
//
$array = array (10, 1, 2, 3, 4, 5, 6, 1);
$funcao4 = new Funcoes; 
var_dump($funcao4->SequenciaCrescente($array)) . PHP_EOL;

