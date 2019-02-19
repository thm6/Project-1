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

                $table .= "\n<" . $tag . '>' . htmlspecialchars($cell) . '</' . $tag . '>';
            }
            $table .= "\n</tr>";
            if ($i == 0) $table .= '</thead><tbody>';
            $i++;
        }
        $table .= '</tbody></table>';
        return $table;
    }
    protected function outputFooter() {
        print "\n".'<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>'
            .'<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>'
            .'<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>';

        print '</body></html>';

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