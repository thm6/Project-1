<?php
/**
 * Created by PhpStorm.
 */
$csvTable = new csvTable;
$csvTable->start('file.csv');

class csvTable
{

    public function start($filename)
    {

        $records = csv::getRecords($filename);
        $tableHTML = $this->createTable($records);
        $docHead = '<!doctype html><html lang="en"><head>'
//            .'rel="stylesheet" type="text/css" href="style.css">'
            . '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
                integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">'
            . '</head><body>';
        print $docHead;

        print $tableHTML;
        $this->outputFooter();
    }

    private function createTable($array)
    {
        $i = 0;
        $table = '<table class="table table-striped">';
        foreach ($array as $k => $row) {
            if ($i == 0) {
                $tag = 'th';
                $table .= "\n" . '<thead>';
            } else $tag = 'td';
            $table .= "\n<tr>";
            foreach ($row as $kk => $cell) {
                // sanitize our output from file
                $table .= "\n<" . $tag . '>' . htmlspecialchars($cell) . '</' . $tag . '>';
            }
            $table .= "\n</tr>";
            if ($i == 0) $table .= '</thead><tbody>';
            $i++;
        }
        $table .= '</tbody></table>';
        return $table;
    }







}




    }
}


class csv{

    static public function getRecords($filename){

        $file = fopen($filename,"r");

        $fieldNames = array();

        $count = 0;

        $tableRecords = array();

        while (!feof($file)) {

            $record = fgetcsv($file);
            $tableRecords[] = $record;

            $count++;
        }
        return $tableRecords;
        fclose($file);
        print '<br>fieldNames is ';
        print_r($fieldNames);
        return $records;

    }
}