<?php
require_once 'PDO.php';
session_start();

if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];
    
    try {
        $db = usePDO::getInstance();
        
        $sql = "SELECT nome FROM users WHERE email = :email";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $user_email);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $name = htmlspecialchars($result['nome']);
        } else {
            $name = ''; 
        }
    } catch (PDOException $e) {
        $name = 'Erro ao buscar nome.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/homepage.css" media="screen" />

    <title>UNIVERSO LITERÁRIO</title>
</head>
<body>
    <header>
        <nav class="nav_header">
            <h1><a href="homepage.php" class="nav_title">UNIVERSO <b>LITERÁRIO</b></a></h1>
            <ul class="nav_header_a">
                <li>Olá, <?php echo htmlspecialchars($name); ?>!</li>
                <li><a href="shopping_cart.php">
                        <img  class="shopping_cart" src="../IMG/cart_icon.png" alt="shopping cart">
                    </a></li>
            </ul>
        </nav>
        <nav class="nav_subheader">
            <ul class="nav_subheader_a">
                <li><a href="product_registration.php">Registrar Produto</a></li>
                <li><a href="supplier_registration.php">Registrar Fornecedor</a></li>
                <li><a href="">Controle de Fornecedores</a></li>
                <li><a href="">Controle de Produtos</a></li>
            </ul>
        </nav>
    </header>

    <main>
        
    </main>

    <footer>
        <nav class="nav_footer"> 
            <p>©2024 UNIVERSO LITERÁRIO</p>
           
        <ul>
            <div class="nav_footer_div"><p>Contato</p></div> 
            <li><img class="linkedin_icon" src="../IMG/linkedIn_icon.png" alt="LinkedIn Icon"><a href="https://www.linkedin.com/in/welllington-henrique-silva-lima/">Wellington Henrique</a></li>
            <li><img class="linkedin_icon" src="../IMG/linkedIn_icon.png" alt="LinkedIn Icon"><a href="https://www.linkedin.com/in/glauber-shoity-nakai-529549273/">Glauber Shoity</a></li>
            <li><img class="linkedin_icon" src="../IMG/linkedIn_icon.png" alt="LinkedIn Icon"><a href="https://www.linkedin.com/in/kamilla-barros-silva-85537819a/">Kamilla Silva</a></li>
        </ul>
    </nav>
    </footer>
</body>
</html>