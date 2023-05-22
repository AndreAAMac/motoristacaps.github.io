<!DOCTYPE html>
<html>
<head>
    <title>Lista de Motoristas</title>
    <!-- Adicione o link para o arquivo CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <?php include 'crud.php'; ?>
    <div class="container">
        <h2>Lista de Motoristas</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" name="endereco" required>
            </div>
            <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" class="form-control" name="numero" required>
            </div>
            <div class="form-group">
                <label for="dias_semana">Dias da Semana:</label>
                <select class="form-control" name="dias_semana[]" multiple required>
                    <option value="segunda-feira">Segunda-feira</option>
                    <option value="terca-feira">Terça-feira</option>
                    <option value="quarta-feira">Quarta-feira</option>
                    <option value="quinta-feira">Quinta-feira</option>
                    <option value="sexta-feira">Sexta-feira</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Adicionar</button>
            <a href="search.php" class="btn btn-secondary">Pesquisar por Dia da Semana</a>

        </form>

        <?php
        $crud = new CRUD();
        $usuarios = $crud->getUsuarios();

        if (count($usuarios) > 0) {
            echo "<h3>Usuários Cadastrados</h3>";
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Nome</th>";
            echo "<th>Endereço</th>";
            echo "<th>Número</th>";
            echo "<th>Dias da Semana</th>";
            echo "<th>Ações</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($usuarios as $usuario) {
                echo "<tr>";
                echo "<td>".$usuario['nome']."</td>";
                echo "<td>".$usuario['endereco']."</td>";
                echo "<td>".$usuario['numero']."</td>";
                echo "<td>".implode(', ', $usuario['dias_semana'])."</td>";
                echo "<td><a href='index.php?delete=".$usuario['id']."' class='btn btn-danger btn-sm'>Excluir</a></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>Nenhum usuário cadastrado.</p>";
        }
        ?>
    </div>
    <!-- Adicione o link para o arquivo JavaScript do Bootstrap, caso necessário -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>


