<?

    try {
        $pdo = new PDO('mysql:host=dbserver;dbname=thdiallo', 'thdiallo', 'Amadou1994');
    } catch (Exception $e) {
        echo "Failed: " . $e->getMessage();
    }
   

?>
    