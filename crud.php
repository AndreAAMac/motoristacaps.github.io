<?php
// Configurações do banco de dados
$servername = "containers-us-west-126.railway.app";
$username = "root";
$password = "iGxgtbzFUhExmkxzxjR7";
$dbname = "railway";
$dbport = "5510";

class CRUD {
    private $conn;

    public function __construct() {
        global $servername, $username, $password, $dbname, $dbport;

        $this->conn = new mysqli($servername, $username, $password, $dbname, $dbport);
        if ($this->conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $this->conn->connect_error);
        }
    }

    public function getUsuarios() {
        $sql = "SELECT * FROM usuarios";
        $result = $this->conn->query($sql);

        $usuarios = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $row['dias_semana'] = explode(',', $row['dias_semana']);
                $usuarios[] = $row;
            }
        }

        return $usuarios;
    }

    public function addUsuario($nome, $endereco, $numero, $dias_semana) {
        $dias_semana = implode(',', $dias_semana);
        $sql = "INSERT INTO usuarios (nome, endereco, numero, dias_semana) VALUES ('$nome', '$endereco', '$numero', '$dias_semana')";
        $this->conn->query($sql);
    }

    public function deleteUsuario($id) {
        $sql = "DELETE FROM usuarios WHERE id = $id";
        $this->conn->query($sql);
    }

    public function getUsuariosPorDiaSemana($dia_semana) {
        $sql = "SELECT * FROM usuarios WHERE FIND_IN_SET('$dia_semana', dias_semana) ORDER BY nome";
        $result = $this->conn->query($sql);
    
        $usuarios = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $row['dias_semana'] = explode(',', $row['dias_semana']);
                $usuarios[] = $row;
            }
        }
    
        return $usuarios;
    }
    
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $crud = new CRUD();
    $crud->deleteUsuario($id);
}

if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $dias_semana = $_POST['dias_semana'];

    $crud = new CRUD();
    $crud->addUsuario($nome, $endereco, $numero, $dias_semana);
}
?>

