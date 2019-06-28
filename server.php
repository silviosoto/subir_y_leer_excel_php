<?php 
echo '<pre>';


require_once("PHPExcel-1.8\Classes\PHPExcel\IOFactory.php");

$fichero_subido = "carpeta/". $_FILES['archivo']['name'];
if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
    echo "El fichero es válido y se subió con éxito.\n";
} else {
    echo "¡Posible ataque de subida de ficheros!\n";
}


$inputFileType = PHPExcel_IOFactory::identify($fichero_subido); 

$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($fichero_subido);
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();
for ($row = 2; $row <= $highestRow; $row++){ 
		echo $sheet->getCell("A".$row)->getValue()." - ";
		echo $sheet->getCell("B".$row)->getValue()." - ";
		echo $sheet->getCell("C".$row)->getValue();
		echo "<br>";
}

echo 'Más información de depuración:';
print_r($_FILES);
?>