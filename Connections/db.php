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
    $dropdown_data = [];

    $stmt_Qcity = $pdo->query("SELECT distinct cityname FROM city ORDER BY city.cityname desc");
    $dropdown_data['Qcity_rows'] = $stmt_Qcity->fetchAll();

    $stmt_Qaqar_type = $pdo->query("SELECT distinct aqar_type_name FROM aqar_type_t");
    $dropdown_data['Qaqar_type_rows'] = $stmt_Qaqar_type->fetchAll();

    $stmt_QQamalya_type = $pdo->query("SELECT distinct amalya_type_name FROM amalya_type_t");
    $dropdown_data['QQamalya_type_rows'] = $stmt_QQamalya_type->fetchAll();

    $stmt_Qtashteeb = $pdo->query("SELECT distinct tashteeb_name FROM tashteeb_t");
    $dropdown_data['Qtashteeb_rows'] = $stmt_Qtashteeb->fetchAll();

    $stmt_Qstatus = $pdo->query("SELECT distinct status_name FROM status_t");
    $dropdown_data['Qstatus_rows'] = $stmt_Qstatus->fetchAll();

    $stmt_Recordsetmarhala = $pdo->query("SELECT distinct marhalaname FROM marhala ORDER BY marhalaname ASC");
    $dropdown_data['Recordsetmarhala_rows'] = $stmt_Recordsetmarhala->fetchAll();

    $stmt_Recordsetdoor = $pdo->query("SELECT distinct doorname FROM door ORDER BY doorname ASC");
    $dropdown_data['Recordsetdoor_rows'] = $stmt_Recordsetdoor->fetchAll();

    $stmt_Recordsetnamozg = $pdo->query("SELECT distinct namozgname FROM namozg ORDER BY namozgname ASC");
    $dropdown_data['Recordsetnamozg_rows'] = $stmt_Recordsetnamozg->fetchAll();

    $stmt_Recordsetview = $pdo->query("SELECT distinct viewname FROM viewvv ORDER BY viewname ASC");
    $dropdown_data['Recordsetview_rows'] = $stmt_Recordsetview->fetchAll();

    $stmt_Recordsetlaqab = $pdo->query("SELECT distinct laqab_name FROM laqab ORDER BY laqab_name ASC");
    $dropdown_data['Recordsetlaqab_rows'] = $stmt_Recordsetlaqab->fetchAll();

    $stmt_Qoffice = $pdo->query("SELECT * FROM offices");
    $dropdown_data['Qoffice_rows'] = $stmt_Qoffice->fetchAll();

    return $dropdown_data;
}
?>
