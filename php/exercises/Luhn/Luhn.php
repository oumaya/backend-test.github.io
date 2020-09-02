<?php
declare(strict_types=1);

class Luhn
{
    public function isValid(string $str): bool
    {
        $i = 0;
        $table_of_numbers = str_split($str);
        $somme = 0;
        foreach ($table_of_numbers as $number) {
            if(is_numeric($number)) {
                if($i%2 == 0 ){
                    $number = $number*2;
                    if($number > 9 ){
                        $number = $number-9;
                    }
                }
                $somme += $number;
                $i++; //update only when is_numeric true
            } elseif($number !== ' '){
                return false;
            };
        }

        return ($somme%10 !== 0 ? false : true);
    }

}

$a = new Luhn();

echo $a->isValid('4539 1488 0343 6467');
