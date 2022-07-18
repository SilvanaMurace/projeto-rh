<?php  echo (isset($mensagemUpdate)) ? $mensagemUpdate :''; ?>

<?php if(isset($_GET['edit']) && $_GET['edit'] == true): 

	$user = new Acme\Models\ColaboradorModel;

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
  <legend><i class="large user icon"></i>Cadastro de Colaboradores</legend>
</div>  
<fieldset>
   <input type="hidden" name="atualizar">

   <div class="fields"> 
     <div class="three wide field">
       <label for="id">Código</label>
       <input type="text" name="id" id="id" maxlength="6" readonly="true" placeholder="Código" value="<?php echo $userEncontrado->id; ?>" required>
     </div>

     <div class="sixteen wide field">
       <label for="nm_colaborador">Nome</label>
       <input type="text" name="nm_colaborador" id="nm_colaborador" maxlength="100" placeholder="Digite o Nome do Colaborador" value="<?php echo $userEncontrado->nm_colaborador; ?>" autofocus required>
     </div>
   </div> 
   <div class="fields"> 
     <div class="twelve wide field">
       <label for="nm_apelido">Nome Reduzido</label>
       <input type="text" name="nm_apelido" id="nm_apelido" maxlength="60" placeholder="Digite o Nome Reduzido do Colaborador" value="<?php echo $userEncontrado->nm_apelido; ?>" required>
     </div>
     <div class="four wide field">
       <label for="tp_sexo">Sexo</label>
       <select class="ui fluid dropdown" required>
         <option value="F" <?php if($userEncontrado->tp_sexo=='F') { echo('selected'); } ?> >Feminino</option>
         <option value="M" <?php if($userEncontrado->tp_sexo=='M') { echo('selected'); } ?> >Masculino</option>   
       </select>   
     </div> 
   </div>

   <div class="two fields"> 
     <div class="field">
       <label for="dt_nasc">Data Nascimento</label>
       <input type="date" name="dt_nasc" id="dt_nasc" maxlength="10" placeholder="Data Nasc." OnKeyPress="formatar('##/##/####', this)" onBlur="javascript:validaDat(this,this.value);" value="<?php echo date('d/m/Y',strtotime($userEncontrado->dt_nasc)); ?>" required>
     </div>
     <div class="field">
       <label for="id_estado_civil">Estado Civil</label>
       <select name="id_estado_civil" class="ui compact dropdown" required>  
         <option value="" selected> </option> 
          <?php
          $tipo = new Acme\Models\EstadoCivilModel;

          $tipos = $tipo->read('ds_estado_civil');

          foreach ($tipos as $tipo):  ?>
             <option value="<?php echo $tipo->id; ?>" <?php if($userEncontrado->id_estado_civil==$tipo->id) { echo('selected'); } ?>><?php echo $tipo->ds_estado_civil; ?></option>
          <?php endforeach; ?>
       </select>
     </div>  
   </div>

   <div class="two fields"> 
     <div class="field">
       <label for="nr_CPF">Número CPF</label>
       <input type="text" name="nr_CPF" id="nr_CPF" maxlength="14" class="form-control cpf-mask" placeholder="C.P.F." OnKeyPress="formatar('###.###.###-##',this)" onBlur="javascript:if(!validaCPF(this)){alert('Número do CPF inválido!'); };" 
       value="<?php echo mask($userEncontrado->nr_CPF,'###.###.###-##'); ?>" required>
     </div>
     <div class="field">
       <label for="id_situacao">Situação</label>
       <select name="id_situacao" required>  
         <option value="" selected> </option> 
          <?php
          $tipo = new Acme\Models\SituacaoColabModel;

          $tipos = $tipo->read('ds_situacao_colab');

          foreach ($tipos as $tipo):  ?>
             <option value="<?php echo $tipo->id; ?>" <?php if($userEncontrado->id_situacao==$tipo->id) { echo('selected'); } ?>><?php echo $tipo->ds_situacao_colab; ?></option>
          <?php endforeach; ?>
       </select>
     </div>
   </div>  

   <h4 class="ui brown dividing header">Registro Geral</h4>
   <div class="two fields"> 
     <div class="field">
       <label for="nr_RG">Número</label>
       <input type="text" name="nr_RG" id="nr_RG" maxlength="10" placeholder="Digite RG" value="<?php echo $userEncontrado->nr_RG; ?>" required>
     </div>
     <div class="field">
       <label for="id_uf_RG">Unidade Federativa</label>
       <select name="id_uf_RG" required>  
         <option value="" selected> </option> 
          <?php
          $tipo = new Acme\Models\UFModel;

          $tipos = $tipo->read('ds_uf');

          foreach ($tipos as $tipo):  ?>
             <option value="<?php echo $tipo->id; ?>" <?php if($userEncontrado->id_uf_RG==$tipo->id) { echo('selected'); } ?>><?php echo $tipo->ds_uf; ?></option>
          <?php endforeach; ?>
       </select>
     </div>
   </div>

   <h4 class="ui brown dividing header">Carteira de Trabalho</h4>
   <div class="fields"> 
     <div class="five wide field">
       <label for="nr_CTPS">Número</label>
       <input type="text" name="nr_CTPS" id="nr_CTPS" maxlength="8" value="<?php echo $userEncontrado->nr_CTPS; ?>" required>
     </div>
     <div class="three wide field">
       <label for="sr_CTPS">Série </label>
       <input type="text" name="sr_CTPS" id="sr_CTPS" maxlength="5" value="<?php echo $userEncontrado->sr_CTPS; ?>" required>
     </div>
     <div class="ten wide field">
       <label for="id_uf_CTPS">Unidade Federativa</label>
       <select name="id_uf_CTPS" required>  
         <option value="" selected> </option> 
          <?php
          $tipo = new Acme\Models\UFModel;

          $tipos = $tipo->read('ds_uf');

          foreach ($tipos as $tipo):  ?>
             <option value="<?php echo $tipo->id; ?>" <?php if($userEncontrado->id_uf_CTPS==$tipo->id) { echo('selected'); } ?>><?php echo $tipo->ds_uf; ?></option>
          <?php endforeach; ?>
       </select>
     </div>
   </div> 

   <h4 class="ui brown dividing header">PIS</h4>
   <div class="fields"> 
     <div class="five wide field">
       <label for="nr_PIS">Número</label>
       <input type="text" name="nr_PIS" id="nr_PIS" maxlength="15" placeholder="Digite o PIS" value="<?php echo $userEncontrado->nr_PIS; ?>" required>
     </div>
     <div class="five wide field">
       <label for="dt_PIS">Data</label>
       <input type="date" name="dt_PIS" id="dt_PIS" maxlength="10" placeholder="Data PIS" OnKeyPress="formatar('##/##/####', this)"  onBlur="javascript:validaDat(this,this.value);" value="<?php echo date('d/m/Y',strtotime($userEncontrado->dt_PIS)); ?>" required>
     </div>
     <div class="ten wide field">
       <label for="id_banco_PIS">Banco</label>
       <select name="id_banco_PIS" required>  
          <?php
          $tipo = new Acme\Models\BancoModel;

          $tipos = $tipo->read('nm_banco');

          foreach ($tipos as $tipo):  ?>
             <option value="<?php echo $tipo->id; ?>" <?php if($userEncontrado->id_banco_PIS==$tipo->id) { echo('selected'); } ?>><?php echo $tipo->nm_banco; ?></option>
          <?php endforeach; ?>
       </select>
     </div>
   </div>    

   <h4 class="ui brown dividing header">FGTS</h4>
   <div class="fields">
     <div class="two wide field">
       <label for="nr_opcao_FGTS">Opção</label>
       <input type="text" name="nr_opcao_FGTS" id="nr_opcao_FGTS" maxlength="1" value="<?php echo $userEncontrado->nr_opcao_FGTS; ?>" required>
     </div>
     <div class="four wide field">
       <label for="dt_opcao_FGTS">Data Opção</label>
       <input type="date" name="dt_opcao_FGTS" id="dt_opcao_FGTS" maxlength="10" OnKeyPress="formatar('##/##/####', this)"  onBlur="javascript:validaDat(this,this.value);" value="<?php echo date('d/m/Y',strtotime($userEncontrado->dt_opcao_FGTS)); ?>" required>
     </div>
     <div class="seven wide field">
       <label for="id_banco_FGTS">Banco</label>
       <select name="id_banco_FGTS" required>  
          <?php
          $tipo = new Acme\Models\BancoModel;

          $tipos = $tipo->read('nm_banco');

          foreach ($tipos as $tipo):  ?>
             <option value="<?php echo $tipo->id; ?>" <?php if($userEncontrado->id_banco_FGTS==$tipo->id) { echo('selected'); } ?>><?php echo $tipo->nm_banco; ?></option>
          <?php endforeach; ?>
       </select>
     </div>
     <div class="five wide field">
       <label for="nr_conta_FGTS">Conta</label>
       <input type="text" name="nr_conta_FGTS" id="nr_conta_FGTS" maxlength="10" placeholder="Conta FGTS" value="<?php echo $userEncontrado->nr_conta_FGTS; ?>" required>
     </div>
   </div>  

   <h4 class="ui brown dividing header">Outras Informações</h4>
   <div class="three fields">
     <div class="field">
       <label for="st_aposentado">Aposentado</label>
       <select class="ui tiny dropdown" required>
         <option value="y" <?php if($userEncontrado->st_aposentado=='y') { echo('selected'); } ?> >Sim</option>
         <option value="n" <?php if($userEncontrado->st_aposentado=='n') { echo('selected'); } ?> >Não</option>   
       </select>   
     </div> 
     <div class="field">
       <label for="dt_aposentadoria">Data Aposentadoria</label>
       <input type="date" name="dt_aposentadoria" id="dt_aposentadoria" maxlength="10" OnKeyPress="formatar('##/##/####', this)"  onBlur="javascript:validaDat(this,this.value);" value="<?php echo date('d/m/Y',strtotime($userEncontrado->dt_aposentadoria)); ?>">
     </div>
     <div class="field">
       <label for="tp_sanguineo">Tipo Sanguíneo</label>
       <input type="text" name="tp_sanguineo" id="tp_sanguineo" maxlength="2" value="<?php echo $userEncontrado->tp_sanguineo; ?>" required>
     </div>
     <div class="field">
       <label for="st_ativo">Ativo</label>
       <select class="ui tiny dropdown" required>
         <option value="y" <?php if($userEncontrado->st_ativo=='y') { echo('selected'); } ?>>Sim</option>
         <option value="n" <?php if($userEncontrado->st_ativo=='n') { echo('selected'); } ?>>Não</option>   
       </select>   
     </div> 
   </div>

</fieldset>


<div style="margin-top: 10px;">
<button class="mini ui color3 button" type="submit"><i class="check white icon"></i>Atualizar</button>
<a href="alterar_main_colaborador.php" class="mini ui color3 button" style="margin-left: 40px;">Voltar a Página Inicial</a>
</div>

</form>

<?php else: ?>

	Escolha um Colaborador antes de Editar

<?php endif; ?>	