<?php  echo (isset($mensagem)) ? $mensagem :''; 

   function mask($val, $mask)
   {
    $maskared = '';
    $k = 0;
    for($i = 0; $i<=strlen($mask)-1; $i++)
    {
       if($mask[$i] == '#')
       {
       if(isset($val[$k]))
       $maskared .= $val[$k++];
       }
       else
       {
       if(isset($mask[$i]))
       $maskared .= $mask[$i];
       }
    }
    return $maskared;
   }


?> 
<fieldset style="border: none; margin-top: 30px;">

  <legend><i class="large #C74147 users icon"></i> Lista de Colaboradores Cadastrados </legend>

  <table width="100%" class="ui table">

  <thead>
  	<tr>
  		<th>Nome</th>
  		<th>CPF</th>
      <th>Ativo </th>
    	</tr>
  </thead>
	
  <tbody>

	<?php

	$reg = new Acme\Models\ColaboradorModel;

	$regs = $reg->read('id');

	foreach ($regs as $reg):	?>
  	<tr> 

  	<td><?php echo $reg->nm_colaborador; ?></td>
    <td><?php echo mask($reg->nr_CPF,'###.###.###-##'); ?></td>
  	<td><?php echo $reg->st_ativo == 'y' ? "Sim" : "Não"; ?></td>

  	<td><a href="?p=editar_colaborador&edit=true&id=<?php echo $reg->id; ?>" class="mini ui color3 button"><i class="white edit icon"></i>Básico</a></td>
    <td><a href="?q=editar_colabcompl&edit=true&id=<?php echo $reg->id; ?>" class="mini ui color3 button"><i class="white edit icon"></i>Complementar</a></td>

  	</tr>

    <?php endforeach; ?>

  </tbody>	
</table>	
</fieldset>