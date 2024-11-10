<?php

namespace App\Helpers;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfHelper
{
    public static function generateReport($data, $filename = 'report.pdf', $forceDownload = false)
    {
        // Load the view and pass the data
        $html = view('transaksi/pdf_report', $data);

        // Initialize Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Output the generated PDF
        if ($forceDownload) {
            $dompdf->stream($filename, array("Attachment" => true));
        } else {
            echo $dompdf->output();
        }
    }
}
