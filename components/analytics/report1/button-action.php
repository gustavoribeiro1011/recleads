<!-- <button class="btn btn-sm btn-primary" style="display: inline-block;"><i class="bi bi-search"></i></button> -->
<a href="https://wa.me/<?= $telefone; ?>" type="button" class="btn btn-sm btn-success" 
style="display: inline-block;" target="_blank"  
data-toggle="tooltip" title="Enviar mensagem">
    <i class="bi bi-whatsapp"></i>
</a>
<button class="btn btn-sm btn-danger" style="display: inline-block;" 
onClick="remove('remove rec',<?= $row['id_form']; ?>,'<?= $row['link']; ?>')"
data-toggle="tooltip" title="Excluir gravação">
    <i class="bi bi-trash3"></i>
</button>