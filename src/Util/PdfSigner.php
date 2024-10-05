<?php

namespace App\Util;

use setasign\Fpdi\Tcpdf\Fpdi;
use setasign\Fpdi\FpdiException;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class PdfSigner
{
    public function signPdf($pdfPath, $p12Path, $p12Password, $coords)
    {
        $pdf = new Fpdi();
        $pageCount = $pdf->setSourceFile($pdfPath);

        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            $tplIdx = $pdf->importPage($pageNo);
            $pdf->addPage();
            $pdf->useTemplate($tplIdx);

            // if ($pageNo == $coords['pagina']) {
            //     $qrData = "Firmado por: " . $coords['nombre'] . "\nFecha: " . $coords['fechaFirma'] . "\nRazón: " . $coords['razon'] . "\nLocalidad: " . $coords['localidad'];
            //     $qrImage = $this->generateQRCode($qrData);
            //     $pdf->Image($qrImage, $coords['llx'], $coords['lly'], 20, 20);
            // }
        }

        $unsignedPdfPath = tempnam(sys_get_temp_dir(), 'unsigned_') . '.pdf';
        $pdf->Output($unsignedPdfPath, 'F');
        

        $result = openssl_pkcs12_read(file_get_contents($p12Path), $certs, $p12Password);

        if ($result === false) {
            return ['error' => 'Failed to read the PKCS12 file.'];
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

        
        $signedPdfPath = tempnam(sys_get_temp_dir(), 'signed_') . '.pdf';
        //$signedPdfPath = 'C:\\Users\\pepeg\\AppData\\Local\\Temp\\documentofirmado.pdf';
        $cmd = "openssl smime -sign -binary -in {$unsignedPdfPath} -signer {$publicKeyPath} -inkey {$privateKeyPath} -out {$signedPdfPath} -outform DER -nodetach -passin pass:{$p12Password}";
        if (file_exists($extraCertsPath)) {
            $cmd .= " -certfile {$extraCertsPath}";
        }
        $cmd .= " 2>&1";

        exec($cmd, $output, $return_var);

        if ($return_var !== 0) {
            return ['error' => 'Failed to sign the PDF. Command output: ' . implode("\n", $output)];
        }

        return ['documentoFirmado' => base64_encode(file_get_contents($signedPdfPath)),
                'url_documentoFirmado'=> $signedPdfPath];
    }

    
    
    
    


  
    private function generateQRCode($data)
    {
        $options = new QROptions([
            'version'      => 10, // Use a larger version for more data
            'outputType'   => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel'     => QRCode::ECC_L,
            'scale'        => 3,
        ]);

        $qrcode = new QRCode($options);
        $tempDir = sys_get_temp_dir();
        $tempFile = tempnam($tempDir, 'qr_') . '.png';
        $qrcode->render($data, $tempFile);

        return $tempFile;
    }
}

