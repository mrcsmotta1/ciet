<html>
<head>
   <title>Upload</title>
</head>
<body>
   <form action="#" method="POST" enctype="multipart/form-data">
      <input type="file" name="fileUpload[]" multiple>
      <input type="submit" value="Enviar">
   </form>
</body>
</html>


<?php
/*error_reporting(-1);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);*/


//finino timezone como UTC
date_default_timezone_set('UTC');


//Verifico se existe o arquivo do upload
if (isset($_FILES['fileUpload'])) {
   
    $allowedExts = array(
        "mp4",
        "quicktime",
        "jpeg",
        "png",
        "octet-stream"
    ); //Extensões permitidas
   
    
    //pego a estensão do arquivo pelo type
    $extCompleta = explode("/", $_FILES['fileUpload']['type'][0]);
    $ext         = $extCompleta[1];
    
    
    if (in_array($ext, $allowedExts)) //Verifico se a extensão do arquivo, está presente no array das extensões permitidas
        {

        //diretório onde será salvo os uploads
        $dir = $_SERVER['DOCUMENT_ROOT'] . '/testes/teste3/uploads/';
        if (file_exists($dir) == false)
            mkdir($dir, 0777);//se o diretório não existir, crio ele e dou permissão 777
        
        $new_name = date("Y-m-d-H-i-s.") . $ext; //Definindo um novo nome para o arquivo    
        
        
        $uploadfile = $dir . $new_name;
        
        echo '<pre>';
        if (move_uploaded_file($_FILES['fileUpload']['tmp_name'][0], $uploadfile)) {
            echo "Arquivo válido e enviado com sucesso.\n";
        } else {
            echo "Erro no envio de arquivo por upload!\n";
            exit();
        }
        
        
        
        ini_set("max_execution_time", 0);
        $dir_variavel = "";
        $dh           = opendir($dir);
        $n            = 0;
        $files        = array();
        while (false !== ($filename = readdir($dh))) {
            if (substr($filename, -4) == ".JPG" || substr($filename, -4) == ".jpg" || substr($filename, -5) == ".jpeg" || substr($filename, -4) == ".png" || substr($filename, -10) == ".quicktime" || substr($filename, -4) == ".mp4" || substr($filename, -13) == ".octet-stream") {
                $bbcode    = explode(".", $filename);
                //$files[$n] = str_replace('quicktime', 'mov', $bbcode[1]);
                $files[$n] = ($bbcode[1] == "quicktime" || $bbcode[1] == "octet-stream") ? "mov" : $bbcode[1];
                $n++;
            }
        }
        
	//orderno o array de itens que existem no diretório de uplodas
        sort($files);
        $texto      = "";
        $i          = 1;
        $quantidade = count($files);//Conto quantos arquivos existem no array
        $indice     = "";
        if ($quantidade > 2) { //Verifico se existe mais de 3 itens no array
            $indice = $quantidade - 3;
            
            foreach ($files as $key => $value) {
                if ($key >= $indice) {
                    $texto .= $i . " ." . $value . "<br>";
                    $i++;
                }
                
            }
            
        }
        
        
        
        
        echo '</br>' . $n . '<pre>';
        print_r($indice);
        echo '<br>';
        print_r($files);
        echo '<br>';
        print_r($texto);
        echo "</pre>";
        
        
        
    } else {
        
        print "Extensão de arquivo n permitido!";
    }
}
?>
