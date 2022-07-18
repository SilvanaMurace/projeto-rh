<?php  echo (isset($mensagem)) ? $mensagem :''; 

?> 

<form class="ui form" method="post">

<fieldset style="border: none;">

   <div class="ui header">
   <legend><i class="large user icon"></i>Cadastro Dependentes dos Colaboradores</legend>
   </div>

   <input type="hidden" name="cadastrar">

   <div class="field">
    <label for="id_colaborador">Colaborador</label>
       <select name="id_colaborador" required>  
         <option value="" selected> </option> 
          <?php
          $colab = new Acme\Models\ColaboradorModel;

          $colabs = $colab->read('nm_colaborador');

          foreach ($colabs as $colab):  
          ?>         
               <option value="<?php echo $colab->id; ?>"><?php echo $colab->nm_colaborador; ?></option>
          <?php 
          endforeach; ?>
       </select>
   </div>

   <div class="fields"> 
     <div class="twelve wide field">
       <label for="nm_dependente">Nome Dependente</label>
       <input type="text" name="nm_dependente" id="nm_dependente" maxlength="60" placeholder="Digite o Nome do Dependente" required>
     </div>
     <div class="four wide field">
       <label for="tp_sexo">Sexo</label>
       <select class="ui fluid dropdown" required>
         <option value="F" selected>Feminino</option>
         <option value="M">Masculino</option>   
       </select>   
     </div> 
   </div>

   <div class="two fields"> 
     <div class="field">
       <label for="dt_nasc">Data Nascimento</label>
       <input type="date" name="dt_nasc" id="dt_nasc" maxlength="10" placeholder="Data Nasc." OnKeyPress="formatar('##/##/####', this)" onBlur="javascript:validaDat(this,this.value);" required>
     </div>
     <div class="field">
       <label for="id_parentesco">Grau Parentesco</label>
       <select name="id_parentesco" class="ui compact dropdown" required>  
         <option value="" selected> </option> 
          <?php
          $tipo = new Acme\Models\ParentescoModel;

          $tipos = $tipo->read('ds_parentesco');

          foreach ($tipos as $tipo):  ?>
             <option value="<?php echo $tipo->id; ?>"><?php echo $tipo->ds_parentesco; ?></option>
          <?php endforeach; ?>
       </select>
     </div>  
   </div>

   <div class="fields"> 
     <div class="fourteen wide field">
       <label for="nm_local_nasc">Local Nascimento</label>
       <input type="text" name="nm_local_nasc" id="nm_local_nasc" maxlength="60" placeholder="Digite nome Local de Nascimento" required>
     </div>
     <div class="four wide field">
       <label for="dt_certidao">Data Certidão</label>
       <input type="date" name="dt_certidao" id="dt_certidao" maxlength="10" placeholder="D.Certidão" OnKeyPress="formatar('##/##/####', this)"  onBlur="javascript:validaDat(this,this.value);" required>
     </div>
   </div>

   <div class="four fields">
     <div class="field">
       <label for="st_vacina">Vacinação</label>
       <select class="ui tiny dropdown" required>
         <option value="y" selected>Sim</option>
         <option value="n">Não</option>   
       </select>   
     </div> 
     <div class="field">
       <label for="st_sal_familia">Sal.Familia</label>
       <select class="ui tiny dropdown" required>
         <option value="y">Sim</option>
         <option value="n" selected>Não</option>   
       </select>   
     </div> 
     <div class="field">
       <label for="st_seguro_vida">Seg.Vida</label>
       <select class="ui tiny dropdown" required>
         <option value="y">Sim</option>
         <option value="n" selected>Não</option>   
       </select>   
     </div> 
     <div class="field">
       <label for="st_imposto_renda">Imposto Renda</label>
       <select class="ui tiny dropdown" required>
         <option value="y">Sim</option>
         <option value="n" selected>Não</option>   
       </select>   
     </div> 
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
  <legend><i class="large #C74147 users icon"></i> Lista de Dependentes Cadastrados </legend>
  </td>
  <td width="20%">  
    <a href="?q=imprimir_dependente" class="ui icon button" target="_blank"><i class="print icon"></i></a>
  </td>  
 </tr>
</table>

  <table width="100%" class="ui table">

  <thead>
  	<tr>
  		<th>Dependente</th>
  		<th>Colaborador</th>
   	</tr>
  </thead>
	
  <tbody>

	<?php

	$reg = new Acme\Models\DependenteModel;

	$regs = $reg->read('nm_dependente');


	foreach ($regs as $reg):	
       $regcol = new Acme\Models\ColaboradorModel;

	   $regcolEnc = $regcol->findBy('id','"'.$reg->id_colaborador.'"');  ?>
  	<tr> 

  	<td><?php echo $reg->nm_dependente; ?></td>

  	<td><?php echo $regcolEnc->nm_colaborador; ?></td>

  	<td><a href="?p=editar_depend&edit=true&id=<?php echo $reg->id; ?>&nm_dependente=<?php echo $reg->nm_dependente; ?>" class="mini ui color3 button"><i class="white edit icon"></i>Editar</a></td>

  	</tr>

    <?php endforeach; ?>

  </tbody>	
</table>	
</fieldset>