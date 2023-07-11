<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;

function generatePdfFromHtml($url, $outputPath) {
    $dompdf = new Dompdf();
    $html = file_get_contents_utf8($url);
    $dompdf->loadHtml($html);
    $dompdf->getOptions()->set('isRemoteEnabled', 'true');
    $dompdf->getOptions()->set('defaultCharset', 'utf-8');
    $dompdf->getOptions()->set('isRemoteEnabled', 'true');
    $dompdf->setPaper("A3", "portrait");
    $dompdf->render();
    $output = $dompdf->output();
    file_put_contents($outputPath, $output);
}

function file_get_contents_utf8($fn) {
    $content = file_get_contents($fn);
     return mb_convert_encoding($content, 'UTF-8',
         mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
}

// Chame a função para gerar o PDF a partir de uma URL
generatePdfFromHtml('https://www.novagne.com.br/verboleto.php?numero=20001857&banco=594295466&cpfcnpj=00005064143451', './output.pdf');
