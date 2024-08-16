<?php session_start(); ?>
<?php include("model/function.php"); ?>
<?php include("model/connect.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/usuario.css">
    <link rel="stylesheet" href="css/form_cadastro.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Área administrativa</title>

</head>
<?php ?>

<body id="container">
    <?php if (isset($_SESSION['active'])) { ?>
        <?php if(isset($_GET)) { ?>
            <?php 
                $id = $_GET['id'];
                $usuario = buscarId($connect, 'usuarios', $id);
            ?>
        <?php }?>

        <section class="menu">
            <?php include "layout/menu.php" ?>
        </section>

        <section class="content">
            <div class="div1">
                <div class="div2">
                    <h2 class="content-title"><ion-icon name="document-text"></ion-icon>Atualizando o usuário: <?= $_GET['nome'] ?></h2>
                </div>
                <div class="div3">
                    <form action="" method="post" enctype="multipart/form-data" class="w-75">
                        <input value="<?= $usuario['id']; ?>" type="hidden" name="id">
                        <div class="input-group input-group-sm mb-3 w-50">
                            <span class="input-group-text" id="basic-addon1">Nome</span>
                            <input value="<?= $usuario['nome_user'] ?>" type="text" name="nome" placeholder="Seu Nome" class="form-control" aria-label="Sizing example input" aria-describedby="basic-addon1"  require autofocus>
                        </div>
                        <div class="input-group input-group-sm mb-3 w-50">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                            <input value="<?= $usuario['email'] ?>" type="email" name="email" placeholder="Seu E-mail" class="form-control" aria-label="Sizing example input" aria-describedby="basic-addon1"  require>
                        </div>
                        <div class="input-group input-group-sm mb-3 w-50">
                            <span class="input-group-text" id="basic-addon1">Senha</span>
                            <input type="password" name="repete_senha" placeholder="Crie uma senha" class="form-control" aria-label="Sizing example input" aria-describedby="basic-addon1"  require>
                        </div>
                        <div class="input-group input-group-sm mb-3 w-50">
                            <span class="input-group-text" id="basic-addon1">Senha</span>
                            <input type="password" name="senha" placeholder="Repita a senha" class="form-control" aria-label="Sizing example input" aria-describedby="basic-addon1"  require>
                        </div>
                        <div class="input-group input-group-sm mb-3 w-50">
                            <input type="file" name="imagem" class="form-control">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <input type="submit" name="atualizar" value="Atualizar" class="btn btn-outline-secondary">
                    </form>
                    <?php updateUser($connect);  ?>
                    <a href="usuario.php" class="bn5"><ion-icon name="arrow-undo"></ion-icon>Voltar</a>
                </div>
            </div>
        </section>




    <?php } else {
        header("location: index.php");
    } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>