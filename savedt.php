<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $data = json_decode(file_get_contents('php://input'), true);
    
    if ($data) {
        // Данные успешно получены
        $browser = $data['browser'];
        $version = $data['version'];
        $os = $data['os'];
        
        $file = fopen("log.txt","a");
        $txt = "$browser версии $version на $os\n";
        fwrite($file, $txt);
        fclose($file);
        
        http_response_code(200);
        echo 'Данные успешно получены и обработаны на сервере.';
    } else {
        http_response_code(400);
        echo 'Ошибка: данные не были переданы на сервер.';
    }
}
?>
