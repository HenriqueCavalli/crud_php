<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CRUD PHP</title>
        <script type="text/javascript" src="script.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    </head>
    <body>
        <?php require_once 'crud.php'; ?>
        <?php if (isset($_SESSION['message'])): ?>
        <?php endif ?>
        <div class="container"><br>
            <?php 
                $mysqli = new mysqli('localhost', 'root', 'root', 'php_banco') or die(mysqli_error($mysqli));
                $consulta = $mysqli->query("SELECT * FROM clientes") or die($mysqli->error);
            ?>
            <div class="">
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <?php  while($row = $consulta->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['nome']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['telefone']?></td>
                            <td>
                                <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Editar</a>
                                <a href="crud.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Deletar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>    
            </div>
        </div><br>
        <div class="container">            
            <div class="row px-5">
                <form action="crud.php" method="POST" name="cadastro">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label>Nome: </label>
                        <input type="text" class="form-control" name="nome" required placeholder="Ex: Henrique Cavalli" value="<?php echo $nome ?>">
                    </div>
                    <div class="form-group">
                        <label>Email: </label>
                        <input type="email" class="form-control" name="email" required placeholder="Ex: henrique@dominio.com" value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="tel" class="form-control" name="telefone" required placeholder="Ex: 49999166216" value="<?php echo $telefone ?>">
                    </div>
                    <div class="text-center">
                        <?php if ($atualizar == true): ?>
                            <button type="submit" class="btn btn-info" name="atualizar">Atualizar</button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary" name="adicionar" id="btn_add">Adicionar</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html> 