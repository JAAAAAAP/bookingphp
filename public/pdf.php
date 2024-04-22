<?php
require $_SERVER['DOCUMENT_ROOT'] . '/jaa/bookingphp/vendor/autoload.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/jaa/bookingphp/config/connectdb.php');

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [ // lowercase letters only in font key
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
        ]
    ],
    'default_font' => 'sarabun'
]);

$html = "<div style='position: absolute; top: 150px; left: 200px;font-size:13;'><h1>" . $_SESSION['user'] . "</h1></div>";

// Set source file for template if needed
$mpdf->SetSourceFile('borrowForm.pdf');

$pageCount = $mpdf->SetSourceFile('borrowForm.pdf');
for ($i = 1; $i <= $pageCount; $i++) {
    $mpdf->AddPage();
    $templateId = $mpdf->ImportPage($i);
    $mpdf->UseTemplate($templateId);
}

$mpdf->WriteHTML($html);
$mpdf->Output();
