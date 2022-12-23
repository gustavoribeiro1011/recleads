<div class="container">
    <h5>Bem vindo!</h5>
</div>
<?php if ($_SESSION['level_' . $app_token] == 'admin') {
    include $_SERVER['DOCUMENT_ROOT'] . '/recleads/components/analytics/counter/index2.php';
} ?>
<div class="container">
    <div class="col mt-4 mb-2">
        Escolha um formulário
    </div>
</div>