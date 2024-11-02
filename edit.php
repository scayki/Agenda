<?php 
include_once('templates/header.php');
?>
<div class="container">
    <?php 
    include_once'templates/backbtn.html';
    ?>
    <h1 id="main-title">Editar contato</h1>
    <form id="create-form" action="<?=$BASE_URL?>config/process.php" method="POST">
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?=$contato['id']?>">
        <div class="form-group">
            <label for="name">Nome do contato:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="digite o nome" value="<?=$contato['name']?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone do contato:</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="digite o telefone" value="<?=$contato['telefone']?>" required>
        </div>
        <div class="form-group">
            <label for="observations">Observações do contato:</label>
            <textarea type="text" class="form-control" id="observations" name="observations" placeholder="digite as observações" rows="3"><?=$contato['observacoes']?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
<?php 
include_once('templates/footer.php');
?>