<div class="container">

  <div>
    <?php
    $_GET['id'] = (isset($_GET['id'])) ? ($id = $_GET['id']) : null;

    include $_SERVER['DOCUMENT_ROOT'] . '/recleads/libs/xcrud/xcrud.php'; //path to xcrud.php

    if ($id) {

      $xcrud = Xcrud::get_instance(); //instantiate xCRUD

      $xcrud->table('domains'); //employees - MySQL table name
      $xcrud->where('user=', $id);
      $xcrud->columns('domain'); //employees - MySQL table name
      $xcrud->table_name('Domínios');
      // $xcrud->unset_title();
      //$xcrud->column_pattern('user', '<a href="#" onClick="openPage(`domains`,{id})">{value}</a>');

      $xcrud->unset_numbers();

      $xcrud->fields('domain,user');

      $xcrud->change_type("user", "hidden", $id);

      //Hide buttons 
      $xcrud->unset_print();
      $xcrud->unset_csv();
      $xcrud->hide_button('save_edit');

      $xcrud->before_insert("user");


      echo $xcrud->render(); //magic
    }

    ?>
  </div>
</div>

</div>