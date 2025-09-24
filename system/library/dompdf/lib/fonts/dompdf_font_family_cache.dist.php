<?php
$distFontDir = $rootDir . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'fonts' . DIRECTORY_SEPARATOR;
return array(
    'helvetica' =>
        array(
            'normal' => $distFontDir . 'Helvetica',
            'bold' => $distFontDir . 'Helvetica-Bold',
            'italic' => $distFontDir . 'Helvetica-Oblique',
            'bold_italic' => $distFontDir . 'Helvetica-BoldOblique'
        ),
    'dejavu sans' => 
        array(
            'bold' => $distFontDir . 'DejaVuSans-Bold',
            'normal' => $distFontDir . 'DejaVuSans'
        )
);