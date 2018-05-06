<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary' => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"',
        //'binary' => '"/usr/bin/wkhtmltopdf"',
        //'binary' => '/usr/local/bin/wkhtmltopdf',
        //'binary' => '/usr/bin/wkhtmltopdf',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
);
