<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class TableAlt extends Controller
{
    public function index()
    {
        // generate random data for table
        $tableData = [];
        $rowColors = ['red', 'yellow', 'green'];
        $colorIndex = 0;

        // for loop to iterate 10x
        for ($i = 1; $i <= 10; $i++){
            $rowData = [
                'Col 1' => $this->generateRandomData(),
                'Col 2' => $this->generateRandomData(),
                'Col 3' => $this->generateRandomData()
            ];

            $tableData[] = [
                'data' => $rowData,
                'color'=> $rowColors[$colorIndex]
            ];

            // increment $colorIndex by 1 after each iteration, modulus of the count of $rowColors which is 3 (so loop 0,1,2)
            $colorIndex = ($colorIndex+1) % count($rowColors);
        }

        // loads view and passes table data
        $data['tableData'] = $tableData;
        return view('tuto04/table_alt', $data);
    }

    private function generateRandomData()
    {
        // roll a dice, 0 means int, 1 means string (trying to perform random in code)
        $dataType = rand(0,1);
        if ($dataType === 0){
            return rand(100, 999);
        } else {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            $length = rand(5,10);
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters)-1 )];
            }
            return $randomString;
        }
    }
}