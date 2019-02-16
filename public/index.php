<?php
/**
 * Created by PhpStorm.
 * User: tai
 * Date: 2/16/19
 * Time: 2:42 AM
 */

main::start("file.csv");

class main

{
    static public function start($filename)
    {
        $records = csv::getRecords($filename);
        $table = html::generateTable($records);

        print_r($records);

    }
}

class csv{

    static public function getRecords($filename){

        $file = fopen($filename, "r");

        while (!feof($file))
        {
            $record[] = fgetcsv($file);

            $records[] = $record;
        }

        fclose($file);
        return $records;
        print_r($records);






    }


}