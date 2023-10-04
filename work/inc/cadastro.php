<?php
include('conexao_adm.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Verifica se o nome de usuário já existe
    $sqlVerifica = "SELECT username FROM usuarios WHERE username = ?";
    $stmtVerifica = mysqli_prepare($conexao, $sqlVerifica);
    mysqli_stmt_bind_param($stmtVerifica, "s", $nome);
    mysqli_stmt_execute($stmtVerifica);
    mysqli_stmt_store_result($stmtVerifica);

    if (mysqli_stmt_num_rows($stmtVerifica) > 0) {
        echo "<script>alert('Nome de usuário já está em uso');window.location.href='/src/cadastro.html'</script>";
    } else {
        // Gerar um salt aleatório
        $salt = bin2hex(random_bytes(16)); // Use um tamanho adequado para o salt

        // Concatenar o salt com a senha do usuário
        $senhaComSalt = $senha . $salt;

        // Fazer o hash da senha com o salt usando o algoritmo bcrypt (mais seguro do que o MD5)
        $senhaHash = password_hash($senhaComSalt, PASSWORD_BCRYPT);

        // Inserir o usuário no banco de dados
        $sql = "INSERT INTO usuarios (senha, salt, username) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $senhaHash, $salt, $nome);
        $insert = mysqli_stmt_execute($stmt);

        if ($insert) {
            echo "<script>window.location.href='/src/login.html'</script>";
        } else {
            echo "<script>alert('Não foi possível cadastrar esse usuário');window.location.href='/src/cadastro.html'</script>";
        }
    }

    mysqli_close($conexao);
}
?>