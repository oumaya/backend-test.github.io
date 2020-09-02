<?php
declare(strict_types=1);

class QueenAttack
{
    /**
     * @throws InvalidArgumentException
     */
    public function placeQueen(int $i, int $j): bool
    {

		if ( (in_array($i, range(1,8))) && (in_array($j, range(1,8)))) {
   				 return true;
		}else{
		throw new Exception('invalide value must be between [0,8]');
		}
    }

    /**
     * @param  int[]  $white  Coordinates of the white Queen
     * @param  int[]  $black  Coordinates of the black Queen
     * @throws InvalidArgumentException
     */
    public function canAttack(array $white, array $black): bool
    {
		
		if(($this->placeQueen($white[0], $white[1]))&&
		   ($this->placeQueen($black[0], $black[1]))){
			
			if ($white[0] == $black[0]) 
			{   return true;}

			if ($white[1] == $black[1]) 
			{ return true;	}

		    if (abs($white[0] - $black[0]) == abs($white[1] - $black[1]))
	        {return true; }
			
		}
        return false;
    }
	
	

}

$a = new QueenAttack();

echo $a-> canAttack([2,3], [5,6]);
