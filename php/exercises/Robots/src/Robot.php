<?php
declare(strict_types=1);

class Robot
{
    public  $type;
    public  $name;

    function __construct($typeRobot) {
        $this->type = $this->detectType($typeRobot);
        $this->name = $this->generateName();
    }

    public function fly(): string
    {
        if($this->type=='FL') return 'robot fly';
        return 'this robot does not fly';
    }
    public function walk(): string
    {
        if($this->type=='WL') return 'robot walking';
        return 'this robot does not walking';
    }

    public function reset(): void
    {
        $this->name = $this->generateName();

    }

    public function generateName(): string
    {

        $randLetters = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 2);
        $robotName = $this->type.random_int(100, 999).strtoupper($randLetters);
        /* avec cette methode il pourrai avoir des duplications, si on veut vraiment la regler il nous faut une base de données
         * */
        return $robotName;
    }


    public function detectType($typeRobot): string
    {

        if($typeRobot == 'walking') return 'WL';
        if($typeRobot == 'flying') return 'FL';
        throw new Exception($typeRobot.' is invalid robot type , must been walking or flying');

    }



}
/* must comment this part , for unit test */
$a = new Robot('walking');

var_dump('the first name of this robot is : '.$a->name);
var_dump($a->fly());
var_dump($a->walk());
$a->reset();
var_dump('the name after reset is : '.$a->name);
