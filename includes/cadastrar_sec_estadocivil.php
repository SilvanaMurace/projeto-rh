<?php  echo (isset($mensagem)) ? $mensagem :''; ?>

<form class="ui form" method="post">

<fieldset style="border: none;">
   <legend><i class="large user icon"></i>Cadastro de Estado Civil</legend>
   
   <input type="hidden" name="cadastrar">
   <label for="ds_estado_civil">Descrição</label>
   <input type="text" name="ds_estado_civil" id="ds_estado_civil" maxlength="100" placeholder="Digite a descrição do Estado civil">

   <div style="margin-left: 5px; margin-top: 15px;">
   <input type="radio" name="st_ativo" value="yes" checked>Ativo
   <input type="radio" name="st_ativo" value="no" style="margin-left: 20px;"> Inativo
   </div>
 </fieldset>

<!--div style="margin-top: 10px;"-->
<button class="mini ui color3 button" type="submit" style="margin-left: 220px;"><i class="white check icon"></i>Cadastrar</button>
<!--/div-->

</form>


<fieldset style="border: none; margin-top: 30px;">

  <table width="100%" >
   <tr>
    <td width="80%">
    <legend><i class="large #C74147 users icon"></i> Lista de Estados Civis Cadastrados </legend>
    </td>
    <td width="20%">  
      <a href="?q=imprimir_estadocivil" class="ui icon button" target="_blank"><i class="print icon"></i></a>
    </td>  
   </tr>
  </table>

  <table width="100%" class="ui table">

  <thead>
    <tr>
      <th>Descrição</th>
      <th>Ativo</th>
      <th> </th>
      </tr>
  </thead>
  
  <tbody>

  <?php

  $estado_civil = new Acme\Models\EstadoCivilModel;

  $estados_civis = $estado_civil->read('ds_estado_civil');

  foreach ($estados_civis as $estado_civil):  ?>
    <tr> 

    <td><?php echo $estado_civil->ds_estado_civil; ?></td>

    <td><?php echo $estado_civil->st_ativo == 'y' ? "Sim" : "Não"; ?></td>

    <td><a href="?p=editar_estadocivil&edit=true&id=<?php echo $estado_civil->id; ?>" class="mini ui color3 button"><i class="white edit icon"></i>Editar</a></td>

    </tr>

    <?php endforeach; ?>

  </tbody>  
</table>  
</fieldset>