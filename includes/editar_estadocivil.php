<?php  echo (isset($mensagemUpdate)) ? $mensagemUpdate :''; ?>

<?php if(isset($_GET['edit']) && $_GET['edit'] == true): ?>

	<?php 

		$reg = new Acme\Models\EstadoCivilModel;

		$regEncontrado = $reg->findBy('id',$_GET['id']);
	 ?>

<form class="ui form" method="post">

<legend><i class="large user icon"></i>Cadastro de Estado Civil</legend>
<fieldset>
   <label>Descrição</label>
   <input type="text" name="ds_estado_civil" placeholder="Digite a descrição do Estado civil" value="<?php echo $regEncontrado->ds_estado_civil; ?>">
   <input type="hidden" name="atualizar">
   <input type="hidden" name="id" value="<?php echo $regEncontrado->id; ?>">

   <div style="margin-left: 5px; margin-top: 15px;">
   <input type="radio" name="st_ativo" value="yes" <?php if($regEncontrado->st_ativo=='y') { echo('checked'); } ?> >Ativo 
   <input type="radio" name="st_ativo" value="no" <?php if($regEncontrado->st_ativo=='n') { echo('checked'); } ?> style="margin-left: 20px;"> Inativo   
   </div>
</fieldset>


<div style="margin: 20px 0px 0px 30px;">
<button class="mini ui color3 button" type="submit"><i class="check white icon"></i>Atualizar</button>
<a href="cadastrar_main_estadocivil.php" class="mini ui color3 button" style="margin-left: 40px;">Voltar a Página Inicial</a>
</div>

</form>

<?php else: ?>

	Escolha um Estado Civil antes de Editar

<?php endif; ?>	