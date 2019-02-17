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


    }
}

class csv{

    static public function getRecords($filename){

        $file = fopen($filename, "r");

        $fieldNames = array();

        $count = 0;

        while (!feof($file))
        {
            $record[] = fgetcsv($file);
            if($count == 0){
                $fieldNames = $record;
            }
            else{
                $records[] = recordFactory::create($fieldNames, $record);
            }

            $count++;

        }

        fclose($file);
        return $records;

    }

}

class record {

    public function __construct(Array $fieldNames = null, $values = null)
    {
        print_r($fieldNames);
        print_r($values);
        $record = array_combine($fieldNames, $values);
        print_r($record);


        $this->createProperty();

    }

    public function createProperty($name = "first", $value = 'keith') {

        $this->{$name} = $value;

    }


}
class recordFactory{

    public static function create(Array $fieldNames = null, Array $values = null) {


        $record = new record($fieldNames, $values);

        return $record;


    }

}