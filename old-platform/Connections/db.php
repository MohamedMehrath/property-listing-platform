<?php
function get_db_connection($db_name) {
    $host = getenv('DB_HOST') ?: '127.0.0.1';
    $user = getenv('DB_USER') ?: 'root';
    $pass = getenv('DB_PASS') ?: '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
         $pdo = new PDO($dsn, $user, $pass, $options);
         return $pdo;
    } catch (\PDOException $e) {
         throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}

function get_dropdown_data($pdo) {
    $queries = [
        'Qcity_rows' => "SELECT distinct cityname FROM city ORDER BY city.cityname desc",
        'Qaqar_type_rows' => "SELECT distinct aqar_type_name FROM aqar_type_t",
        'QQamalya_type_rows' => "SELECT distinct amalya_type_name FROM amalya_type_t",
        'Qtashteeb_rows' => "SELECT distinct tashteeb_name FROM tashteeb_t",
        'Qstatus_rows' => "SELECT distinct status_name FROM status_t",
        'Recordsetmarhala_rows' => "SELECT distinct marhalaname FROM marhala ORDER BY marhalaname ASC",
        'Recordsetdoor_rows' => "SELECT distinct doorname FROM door ORDER BY doorname ASC",
        'Recordsetnamozg_rows' => "SELECT distinct namozgname FROM namozg ORDER BY namozgname ASC",
        'Recordsetview_rows' => "SELECT distinct viewname FROM viewvv ORDER BY viewname ASC",
        'Recordsetlaqab_rows' => "SELECT distinct laqab_name FROM laqab ORDER BY laqab_name ASC",
        'Qoffice_rows' => "SELECT id, name FROM offices",
    ];

    $dropdown_data = [];
    foreach ($queries as $key => $sql) {
        try {
            $stmt = $pdo->query($sql);
            $dropdown_data[$key] = $stmt->fetchAll();
        } catch (\PDOException $e) {
            // Handle or log the error for the specific query
            $dropdown_data[$key] = [];
        }
    }

    return $dropdown_data;
}
?>
