<br/>
<?php if (auth_errors() || validation_errors()) : ?>
<div class="notification error">
  <?php echo auth_errors() . validation_errors(); ?>
</div>
<?php endif; ?>

<?php echo form_open(current_url(), 'style="max-width: 700px"') ?>

  <input type="text" name="titulo" placeholder="Nome a dar à tarefa" value="tarefa" /><br/>
  
  <input type="text" size="255" name="descritivo" placeholder="ex: FileMaker alerta para erro. Gerar um novo ficheiro pra facturação?" value="" />
  <div class="submits">
      <input type="submit" name="submit" value="Nova Tarefa" />
  </div>

<?php echo form_close(); ?>

<?php if (isset($items) && is_array($items) && count($items)) : ?>
<h3>Tarefas à espera...</h3>

<?php echo form_open(current_url() .'/completar', 'class="tarefas-form"'); ?>
<table>
  <tbody>
  <?php foreach ($items as $item) : ?>
      <tr>
          <td style="width: 1em; text-align: center">
              <input type="checkbox" name="items[]" value="1" data-id="<?php echo $item->tarefa_id ?>" />
          </td>
          <td><?php echo $item->descritivo ?></td>
      </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php echo form_close(); //$this->firephp->fb( @$items_c,'DEBUG:@');?>

<?php endif; ?>

<?php if (isset($items_c) && is_array($items_c) && count($items_c)) : ?>
<h3>Tarefas completas</h3>
<?php echo form_open(current_url() , 'class="completas-form"'); ?>
<table>
  <tbody>
  <?php foreach ($items_c as $item_c) : ?>
      <tr>
          <td style="width: 1em; text-align: center">
              <input type="checkbox" name="items[]" value="1" data-id="<?php echo $item_c->tarefa_id ?>" />
          </td>
          <td><?php echo $item_c->descritivo ?></td>
      </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php echo form_close(); ?>

<?php endif; ?>

<script>
head.ready(function() {
  $('.tarefas-form input[type=checkbox]').change(function() {
      var cid = $(this).attr('data-id');

      // Remove it from the display, with a fade effect
      $(this).parents('tr').fadeOut(300);

      // Tell the server to remove it.
      $.post('<?php echo current_url();?>/completar/'+ cid);
  });
});
</script>