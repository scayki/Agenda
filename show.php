<?php 
include_once('templates/header.php');
?>
<div class="container" id="view-contact-container">
    <?php
    include_once'templates/backbtn.html';
    ?>
    <h1 id="main-title"><?=$contato['name']?></h1>
    <p class="bold">Telefone</p>
    <p><?=$contato['telefone']?></p>
    <p class="bold">Observações</p>
    <p><?=$contato['observacoes']?></p>
    <?php print_r( $_GET); ?>
</div>
<?php 
include_once('templates/footer.php');
?>