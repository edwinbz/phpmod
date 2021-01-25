<?php
// Global App Functions
// Responder peticiones AJAX con formato JSON
function _response($success = false, $msg = '', $data = [], $code = 0)
{
    $response = array(
        'success' => $success,
        'code' => $code,
        'msg' => $msg,
        'data' => $data,
    );
    header("Content-Type: application/json", true);
    echo json_encode($response);
    die();
}

// Validar variables
function _val(string $index, $required = true, $default = null)
{
    /**
     * $index = variable
     * $required = si es un campo requerido por defecto true
     */
    $value = isset($_POST[$index]) ? $_POST[$index] : "";
    if ($required) {
        if (isset($value) && $value != "" && $default == null) {
            return $value;
        } else if (!isset($value) && $value == "" && $default != null) {
            return $default;
        } else {
            if (APP_DEBUG) {
                _response(false, "Algunos datos requeridos están vacíos ($index)", [], 3);
            } else {
                _response(false, 'Algunos datos requeridos están vacíos', [], 3);
            }
        }
    }
    return $value;
}

// Ejecutar consultas MySQL
function _query($sql, $parameters, $responseType, $operationType = null)
{
    switch ($responseType) {
        case 1: //FETCH_ASSOC
            try {
                $stm = Conexion::conectar()->prepare($sql);
                $stm->execute($parameters);
                return $stm->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                if (APP_DEBUG) {
                    _response(false, $e->getMessage(), [], ERROR_PDO);
                } else {
                    _response(false, "Se produjo un error en el servidor.", [], ERROR_PDO);
                }
            }
            break;
        case 2: //FETCH_NUM
            try {
                $stm = Conexion::conectar()->prepare($sql);
                $stm->execute($parameters);
                return $stm->fetchAll(PDO::FETCH_NUM);
            } catch (PDOException $e) {
                if (APP_DEBUG) {
                    _response(false, $e->getMessage(), [], ERROR_PDO);
                } else {
                    _response(false, "Se produjo un error en el servidor.", [], ERROR_PDO);
                }
            }
            break;
        case 3: //ROW_COUNT
            try {
                $stm = Conexion::conectar()->prepare($sql);
                $stm->execute($parameters);
                return $stm->rowCount();
            } catch (PDOException $e) {
                if (APP_DEBUG) {
                    _response(false, $e->getMessage(), [], ERROR_PDO);
                } else {
                    _response(false, "Se produjo un error en el servidor.", [], ERROR_PDO);
                }
            }
            break;
        case 4: //LAST_ID
            $con = Conexion::conectar();
            $stm = $con->prepare($sql);
            $stm->execute($parameters);
            return intval($con->lastInsertId());
            break;
        default:
            break;
    }
}

// Contar total de registros en una tabla
function _countTable(string $tableName)
{
    $sql = "SELECT COUNT(*) FROM $tableName";
    return _query($sql, [], RES_FETCH_NUM, OPE_READ)[0][0];
}

function _log()
{}

function _isActive($rootLink) // comparar enlace y ruta actual para mostrar la clase "active"

{
    if (App::$url[0] == $rootLink) {
        return 'active';
    }
}

function generateRandomString($length = 8)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function _getFirst($array)
{
    if (count($array) > 0) {
        return $array[0];
    }
    return $array;
}

function _formatPhone($n)
{
    if (strlen($n) == 10) { // Celular
        $nF = substr($n, 0, 3) . ' ';
        $nF .= substr($n, 3, 3) . ' ';
        $nF .= substr($n, 6, 4);
        return $nF;
    } else {
        $nF = substr($n, 0, 3) . ' ';
        $nF .= substr($n, 3, 4);
        return $nF;
    }
}

function _formatDate($d)
{
    return date("g:i a", strtotime($d));
}

function _error403()
{
    include ERR . '403.php';
    exit;
}

function _error404()
{
    include ERR . '404.php';
    exit;
}

function _createSlug($str, $delimiter = '-')
{
    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace("/[']/", '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return $slug;
}
