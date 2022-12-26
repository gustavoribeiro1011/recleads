<div class="container">
  <h5>Gerenciar Usuários</h5>

  <div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/recleads/libs/xcrud/xcrud.php'; //path to xcrud.php
    $xcrud = Xcrud::get_instance(); //instantiate xCRUD


    $xcrud->table('users'); //employees - MySQL table name
    $xcrud->columns('user'); //employees - MySQL table name
    $xcrud->order_by('id','desc');
    $xcrud->table_name('Usuários');
    // $xcrud->unset_title();
    $xcrud->column_pattern('user', '<a href="javascript:void(0);" onClick="openPage(`domains/domains.php?id={id}`)">{value}</a>');

    $xcrud->unset_numbers();

    $xcrud->fields('user,username,password,phone,level');

    $xcrud->change_type('level', 'select', '', 'user,admin');

    //Labels
    $xcrud->label('user','Login');
    $xcrud->label('username','Nome');
    $xcrud->label('phone','Telefone');
    $xcrud->label('level','Nível');
    $xcrud->label('password','Senha');
    
    
    //Hide buttons 
    $xcrud->unset_print();
    $xcrud->unset_csv();
    $xcrud->hide_button('save_edit');






    echo $xcrud->render(); //magic

    ?>
    <script></script>
  </div>
</div>