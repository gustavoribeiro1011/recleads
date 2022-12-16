<div class="container">
  <h5>Gerenciar Usuários</h5>

  <div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/recleads/libs/xcrud/xcrud.php'; //path to xcrud.php
    $xcrud = Xcrud::get_instance(); //instantiate xCRUD


    $xcrud->table('users'); //employees - MySQL table name
    $xcrud->columns('user'); //employees - MySQL table name
    $xcrud->table_name('Usuários');
    // $xcrud->unset_title();
    $xcrud->column_pattern('user', '<a href="javascript:void(0);" onClick="openPage(`domains/domains.php?id={id}`)">{value}</a>');

    $xcrud->unset_numbers();

    $xcrud->fields('user,username,password,level');

    $xcrud->change_type('level', 'select', '', 'admin,user');
    $xcrud->change_type('user', 'int', '000', 10); // v1.5 legacy



    //Hide buttons 
    $xcrud->unset_print();
    $xcrud->unset_csv();
    $xcrud->hide_button('save_edit');






    echo $xcrud->render(); //magic

    ?>
  </div>
</div>