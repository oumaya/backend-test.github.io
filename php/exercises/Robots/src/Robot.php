<?php
declare(strict_types=1);
namespace App;

class Robot
{
    public  $type;
    public  $name;
    const FILENAME = './file.csv';

    function __construct($typeRobot) {

        $fp = fopen(self::FILENAME, 'ab+');
        fclose($fp);

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

    public function generateName(bool $saveName = true): string
    {

       $randLetters = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 2);
       $robotName = $this->type.random_int(100, 999).strtoupper($randLetters);

	    $csv = array();
	    $lines = file(self::FILENAME, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $key => $value)
        {
            $csv[$key] = str_getcsv($value);
        }
        foreach ($csv as $k => $val)
        {
            if($robotName==$val[0]){
                $robotName = $this->generateName(false);
            }
        }
        if ($saveName){
            $fp = fopen(self::FILENAME, 'a');
            fputcsv($fp, (array)$robotName);
            fclose($fp);
        }

        return $robotName;
    }


    public function detectType($typeRobot): string
    {

        if($typeRobot == 'walking') return 'WL';
        if($typeRobot == 'flying') return 'FL';
        throw new \InvalidArgumentException($typeRobot.' is invalid robot type , must been walking or flying');

    }
}
