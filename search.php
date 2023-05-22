<!DOCTYPE html>
<html>
<head>
    <title>Pesquisar Usuários por Dia da Semana</title>
    <!-- Adicione o link para o arquivo CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <?php include 'crud.php'; ?>
    <div class="container">
        <h2>Pesquisar Usuários por Dia da Semana</h2>
        <form method="GET">
            <div class="form-group">
                <label for="dia_semana">Selecione o dia da semana:</label>
                <select class="form-control" name="dia_semana" required>
                    <option value="">Selecione</option>
                    <option value="segunda-feira">Segunda-feira</option>
                    <option value="terca-feira">Terça-feira</option>
                    <option value="quarta-feira">Quarta-feira</option>
                    <option value="quinta-feira">Quinta-feira</option>
                    <option value="sexta-feira">Sexta-feira</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Pesquisar</button>
            <a href="index.php" class="btn btn-secondary">Voltar</a>
        </form>

        <?php
        if (isset($_GET['submit'])) {
            $dia_semana = $_GET['dia_semana'];

            $crud = new CRUD();
            $usuarios = $crud->getUsuariosPorDiaSemana($dia_semana);

            if (count($usuarios) > 0) {
                echo "<h3>Usuários encontrados para o dia da semana: $dia_semana</h3>";
                echo "<table class='table'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Nome</th>";
                echo "<th>Endereço</th>";
                echo "<th>Número</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    echo "<td>".$usuario['nome']."</td>";
                    echo "<td>".$usuario['endereco']."</td>";
                    echo "<td>".$usuario['numero']."</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>Nenhum usuário encontrado para o dia da semana: $dia_semana</p>";
            }
        }
        ?>
    </div>
    <!-- Adicione o link para o arquivo JavaScript do Bootstrap, caso necessário -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

