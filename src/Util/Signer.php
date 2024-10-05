<?php

namespace App\Util;

use setasign\Fpdi\Tcpdf\Fpdi;

class Signer
{
    public function sign($pdfPath, $p12Path, $p12Password, $outputPath)
    {
        // Read PDF file
        $pdf = new Fpdi();
        $pageCount = $pdf->setSourceFile($pdfPath);

        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            $tplIdx = $pdf->importPage($pageNo);
            $pdf->addPage();
            $pdf->useTemplate($tplIdx);
        }

        $unsignedPdfPath = tempnam(sys_get_temp_dir(), 'unsigned_') . '.pdf';
        $pdf->Output($unsignedPdfPath, 'F');

        // Read the PKCS12 file
        if (!openssl_pkcs12_read(file_get_contents($p12Path), $certs, $p12Password)) {
            throw new \Exception('Unable to read the PKCS12 file');
        }

        $privateKeyPath = tempnam(sys_get_temp_dir(), 'pkey_') . '.pem';
        $publicKeyPath = tempnam(sys_get_temp_dir(), 'cert_') . '.pem';
        $extraCertsPath = tempnam(sys_get_temp_dir(), 'extracerts_') . '.pem';

        file_put_contents($privateKeyPath, $certs['pkey']);
        file_put_contents($publicKeyPath, $certs['cert']);
        if (isset($certs['extracerts'])) {
            foreach ($certs['extracerts'] as $cert) {
                file_put_contents($extraCertsPath, $cert . "\n", FILE_APPEND);
            }
        }

        // Sign the PDF using OpenSSL
        $cmd = "openssl smime -sign -binary -in {$unsignedPdfPath} -signer {$publicKeyPath} -inkey {$privateKeyPath} -out {$outputPath} -outform DER -nodetach -passin pass:{$p12Password}";
        if (file_exists($extraCertsPath)) {
            $cmd .= " -certfile {$extraCertsPath}";
        }
        $cmd .= " 2>&1";

        exec($cmd, $output, $return_var);

        if ($return_var !== 0) {
            throw new \Exception('Failed to sign PDF: ' . implode("\n", $output));
        }
    }
}
