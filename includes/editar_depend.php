<?php  echo (isset($mensagemUpdate)) ? $mensagemUpdate :''; ?>

<?php if(isset($_GET['edit']) && $_GET['edit'] == true): 

	$user = new Acme\Models\DependenteModel;

	$userEncontrado = $user->findBy('id',$_GET['id']);

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

<form class="ui form" method="post">

<div class="ui header">
  <legend><i class="large user icon"></i>Cadastro de Dependente dos Colaboradores</legend>
</div>  
<fieldset>
   <input type="hidden" name="atualizar">
   <input type="hidden" name="id" value="<?php echo $userEncontrado->id; ?>">

   <div class="field">
    <label for="id_colaborador">Colaborador</label>
       <select name="id_colaborador" required>  
          <?php
          $colab = new Acme\Models\ColaboradorModel;

          $colabs = $colab->read('nm_colaborador');

          foreach ($colabs as $colab):  
          ?>         
               <option value="<?php echo $colab->id; ?>" <?php if($userEncontrado->id_colaborador==$colab->id) { echo('selected'); } ?>><?php echo $colab->nm_colaborador; ?></option>
          <?php 
          endforeach; ?>
       </select>
   </div>

   <div class="fields"> 
     <div class="twelve wide field">
       <label for="nm_dependente">Nome Dependente</label>
       <input type="text" name="nm_dependente" id="nm_dependente" maxlength="60" value="<?php echo $userEncontrado->nm_dependente; ?>" placeholder="Digite o Nome do Dependente" required>
     </div>
     <div class="four wide field">
       <label for="tp_sexo">Sexo</label>
       <select class="ui fluid dropdown" required>
         <option value="F" <?php if($userEncontrado->tp_sexo=='F') { echo('selected'); } ?>>Feminino</option>
         <option value="M" <?php if($userEncontrado->tp_sexo=='M') { echo('selected'); } ?>>Masculino</option>   
       </select>   
     </div> 
   </div>

   <div class="two fields"> 
     <div class="field">
       <label for="dt_nasc">Data Nascimento</label>
       <input type="date" name="dt_nasc" id="dt_nasc" maxlength="10" value="<?php echo date('d/m/Y',strtotime($userEncontrado->dt_nasc)); ?>" placeholder="Data Nasc." OnKeyPress="formatar('##/##/####', this)" onBlur="javascript:validaDat(this,this.value);" required>
     </div>
     <div class="field">
       <label for="id_parentesco">Grau Parentesco</label>
       <select name="id_parentesco" class="ui compact dropdown" required>  
         <option value="" selected> </option> 
          <?php
          $tipo = new Acme\Models\ParentescoModel;

          $tipos = $tipo->read('ds_parentesco');

          foreach ($tipos as $tipo):  ?>
             <option value="<?php echo $tipo->id; ?>" <?php if($userEncontrado->id_parentesco==$tipo->id) { echo('selected'); } ?>><?php echo $tipo->ds_parentesco; ?></option>
          <?php endforeach; ?>
       </select>
     </div>  
   </div>

   <div class="fields"> 
     <div class="fourteen wide field">
       <label for="nm_local_nasc">Local Nascimento</label>
       <input type="text" name="nm_local_nasc" id="nm_local_nasc" maxlength="60" value="<?php echo $userEncontrado->nm_local_nasc; ?>" placeholder="Digite nome Local de Nascimento" required>
     </div>
     <div class="four wide field">
       <label for="dt_certidao">Data Certidão</label>
       <input type="date" name="dt_certidao" id="dt_certidao" maxlength="10" value="<?php echo date('d/m/Y',strtotime($userEncontrado->dt_certidao)); ?>" placeholder="D.Certidão" OnKeyPress="formatar('##/##/####', this)"  onBlur="javascript:validaDat(this,this.value);" required>
     </div>
   </div>

   <div class="four fields">
     <div class="field">
       <label for="st_vacina">Vacinação</label>
       <select class="ui tiny dropdown" required>
         <option value="y" <?php if($userEncontrado->st_vacina=='y') { echo('selected'); } ?>>Sim</option>
         <option value="n" <?php if($userEncontrado->st_vacina=='n') { echo('selected'); } ?>>Não</option>   
       </select>   
     </div> 
     <div class="field">
       <label for="st_sal_familia">Sal.Familia</label>
       <select class="ui tiny dropdown" required>
         <option value="y" <?php if($userEncontrado->st_sal_familia=='y') { echo('selected'); } ?>>Sim</option>
         <option value="n" <?php if($userEncontrado->st_sal_familia=='n') { echo('selected'); } ?>>Não</option>   
       </select>   
     </div> 
     <div class="field">
       <label for="st_seguro_vida">Seg.Vida</label>
       <select class="ui tiny dropdown" required>
         <option value="y" <?php if($userEncontrado->st_seguro_vida=='y') { echo('selected'); } ?>>Sim</option>
         <option value="n" <?php if($userEncontrado->st_seguro_vida=='n') { echo('selected'); } ?>>Não</option>   
       </select>   
     </div> 
     <div class="field">
       <label for="st_imposto_renda">Imposto Renda</label>
       <select class="ui tiny dropdown" required>
         <option value="y" <?php if($userEncontrado->st_imposto_renda=='y') { echo('selected'); } ?>>Sim</option>
         <option value="n" <?php if($userEncontrado->st_imposto_renda=='n') { echo('selected'); } ?>>Não</option>   
       </select>   
     </div> 
   </div>   
 </fieldset>

<div style="margin-top: 10px;">
<button class="mini ui color3 button" type="submit"><i class="check white icon"></i>Atualizar</button>
<a href="cadastrar_main_depend.php" class="mini ui color3 button" style="margin-left: 40px;">Voltar a Página Inicial</a>
</div>

</form>

<?php else: ?>

	Escolha um Dependente antes de Editar

<?php endif; ?>	