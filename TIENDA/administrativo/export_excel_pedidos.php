<?php

use SimpleExcel\SimpleExcel;

require_once('../lib/SimpleExcel/SimpleExcel.php');

$excel = new SimpleExcel('xml');

$excel->writer->setData(
    array(
        array('ID',  'Name',            'Kode'  ),
        array('1',   'Kab. Bogor',       '1'    ),
        array('2',   'Kab. Cianjur',     '1'    ),
        array('3',   'Kab. Sukabumi',    '1'    ),
        array('4',   'Kab. Tasikmalaya', '2'    )
    )
);
$excel->writer->saveFile('example');

?>