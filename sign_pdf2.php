<?php
require 'vendor/autoload.php';
use setasign\Fpdi\Tcpdf\Fpdi;

$signCoordinates = array();
$uploadsDir = 'temp\\';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        // Recibir datos desde el POST
        $signatureFileBase64 = $_POST['signatureFileBase64'];
        $password = $_POST['password'];
        $documentoBase64 = $_POST['documentoBase64'];
        $llx = $_POST['llx'];
        $lly = $_POST['lly'];
        $pagina = $_POST['pagina'];
        $tipoEstampado = $_POST['tipoEstampado'];
        $razon = $_POST['razon'];
        $archivo = $_POST['nombre_archivo'];



        $signatureFilePath = base64_to_file($signatureFileBase64, tempnam(sys_get_temp_dir(), 'sig_') . '.p12');
        $pdfPath = base64_to_file($documentoBase64, tempnam(sys_get_temp_dir(), 'pdf_') . '.pdf');

        $result = openssl_pkcs12_read(file_get_contents($signatureFilePath), $certs, $password);

        $pdf = new Fpdi();
        $pdf->SetPrintHeader(false);
        $pdf->setPrintFooter(false);

        if (!empty($pdfPath)) {
            $pageCount = $pdf->setSourceFile($pdfPath);
        }

        $privateKeyPath = $uploadsDir . uniqid() . '.pem';
        $publicKeyPath = $uploadsDir . uniqid() . '.pem';

        file_put_contents($privateKeyPath, $certs['pkey']);
        file_put_contents($publicKeyPath, $certs['cert']);

        if (isset($certs['extracerts'])) {
            foreach ($certs['extracerts'] as $cert) {
                file_put_contents($extraCertsPath, $cert . "\n", FILE_APPEND);
            }
        }

        //$certificatePath = "C:\\xampp7\\htdocs\\countelseg\\" . $publicKeyPath;
        //$keyPath = "C:\\xampp7\\htdocs\\countelseg\\" . $privateKeyPath;
        $certificatePath = __DIR__ . DIRECTORY_SEPARATOR . $publicKeyPath;
        $keyPath = __DIR__ . DIRECTORY_SEPARATOR . $privateKeyPath;


        $privateKey = 'file://' . realpath($keyPath);
        $certificate = 'file://' . realpath($certificatePath);
        $point = 0.352778;

        $signCoordinates = [
            'x' => floatval($llx) * $point,
            'y' => floatval($lly) * $point,
            'w' => 11,
            'h' => 11
        ];

        $salida = array();
        $salida['name'] = "pruebas";
        $salida['Reason'] = "Firmas Documento";
        $salida['ContactInfo'] = "";
        $salida['Location'] = "";
        try {
            $coords = $signCoordinates;
            for ($currentPage = 1; $currentPage <= $pageCount; $currentPage++) {
                $template = $pdf->importPage($currentPage);
                //$pdf->addPage();
                //$pdf->useTemplate($pageId);

                $size = $pdf->getTemplateSize($template);
                $orientation = ($size['height'] > $size['width']) ? 'P' : 'L';
                if ($orientation == "P") {
                    $pdf->AddPage($orientation, array($size['width'], $size['height']));
                } else {
                    $pdf->AddPage($orientation, array($size['height'], $size['width']));
                }
                $pdf->useTemplate($template);

                // if ($this->pageImage > 0) {
                // if ($this->pageImage === $currentPage) {
                //$pdf->Image($this->signImage, $coords['x'], $coords['y'], $coords['w'], $coords['h'], 'jpg');

                // set style for barcode
                $style = array(
                    'border' => 0,
                    'vpadding' => 'auto',
                    'hpadding' => 'auto',
                    'fgcolor' => array(0, 0, 0),
                    'bgcolor' => false, //array(255,255,255)
                    'module_width' => 1, // width of a single module in points
                    'module_height' => 1 // height of a single module in points
                );

                // QRCODE,L : QR-CODE Low error correction
                $pdf->write2DBarcode($texto, 'QRCODE,H', $coords['x'], $coords['y'], $coords['w'], $coords['h'], $style, 'N');
                //$pdf->Text(20, 25, 'QRCODE L');

                $pdf->SetFont('courier', '', 4);
                $aux = explode(PHP_EOL, $texto);
                $i = 1;
                foreach ($aux as $items) {
                    $pdf->SetXY($coords['x'] + $coords['w'], $coords['y'] + $i);
                    $pdf->Cell(50, 2, $items, 0, false, 'L', 0, '', 0, false, 'T', 'C');
                    $i += 2;
                }

                $pdf->setSignatureAppearance($coords['x'], $coords['y'], $coords['w'], $coords['h'], 1);
                // }
                // }
            }
        } catch (\Exception $e) {
            $e->getMessage();
        }


        $pdf->setSignature($certificate, $privateKey, $password, '', 1, $salida);


        $aux = $archivo;
        $ext = explode('.', $aux);
        $namefirmado = $ext[0] . "-signed.pdf";
        $fileSigned = __DIR__ . DIRECTORY_SEPARATOR .$uploadsDir.$namefirmado;

        
       


        
        ///guarda el pdf
        $output = 'F';
        $pdf->Output($fileSigned, $output);
        $result =  ['documentoFirmado' => base64_encode(file_get_contents($fileSigned)),
                    'nombre_documentoFirmado'=> $namefirmado];

        try {
            unlink($fileSigned);
        } catch (\Exception $ex) {
        }

        try {
            unlink($keyPath);
        } catch (\Exception $ex) {
        }

        try {
            unlink($certificatePath);
        } catch (\Exception $ex) {
        }


        

        // Enviar respuesta JSON
        header('Content-Type: application/json');
        echo json_encode($result);

        
    } catch (Exception $e) {
        // Enviar respuesta de error
        header('Content-Type: application/json', true, 500);
        echo json_encode(['error' => $e->getMessage()]);
    }
}

function base64_to_file($base64_string, $output_file)
{
    $ifp = fopen($output_file, 'wb');
    fwrite($ifp, base64_decode($base64_string));
    fclose($ifp);
    return $output_file;
}

function getCertificateDetails($p12Path, $p12Password)
{
    $fileContent = file_get_contents($p12Path);
    if ($fileContent === false) {
        throw new Exception('Failed to read the PKCS12 file content.');
    }

    // Intenta leer el archivo PKCS12
    $result = openssl_pkcs12_read($fileContent, $certs, $p12Password);

    // Verifica si la lectura fue exitosa
    if ($result === false) {
        throw new Exception('Failed to read the PKCS12 file: ' . openssl_error_string());
    }


    // Revisa si el certificado existe en el arreglo
    if (!isset($certs['cert'])) {
        throw new Exception('No certificate found in the PKCS12 file.');
    }

    $cert = openssl_x509_parse($certs['cert']);
    if ($cert === false) {
        throw new Exception('Failed to parse certificate: ' . openssl_error_string());
    }

    // Continúa con el resto de la función
    $name = $cert['subject']['CN'];
    $validFrom = date('Y-m-d H:i:s', $cert['validFrom_time_t']);
    $validTo = date('Y-m-d H:i:s', $cert['validTo_time_t']);
    $issuer = $cert['issuer']['CN'];
    $locality = isset($cert['subject']['L']) ? $cert['subject']['L'] : 'Desconocida';
    $organization = isset($cert['subject']['O']) ? $cert['subject']['O'] : 'Desconocida';

    return [
        'name' => $name,
        'validFrom' => $validFrom,
        'validTo' => $validTo,
        'issuer' => $issuer,
        'locality' => $locality,
        'organization' => $organization
    ];
}


function setSourceFile($sourceFile)
{
    if (!file_exists($sourceFile)) {
        echo 'Source file could not be found in the following path: ';
        return false;
    }
    // $this->sourceFile = $sourceFile;
}


?>