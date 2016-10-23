<?php
	
	//INICIO - FUNÇOES FORMULÁRIO ----------------------------------------------------------------------------

	function abreForm($action=null, $metodo=null, $enc=null){
		echo '<form action="'.$action.'" method="'.$metodo.'" enctype="'.$enc.'">
		<br>';
	}


	function input($texto=NULL, $tipo=null, $name=null, $class=null, $value=null){
		
		echo '<div class="'.$class.'">
				<label for="'.$texto.'">'.$texto.'</label>
			    <input type="'.$tipo.'" name="'.$name.'" class="form-control" value="'.$value.'">
			  </div>';
	}

	function  botao($tipo=null, $name=null, $class=null){
		echo '
		<div class="col-md-1 col-sm-12 col-xs-12 form-group">
			<button type="'.$tipo.'" class="'.$class.'" name="'.$name.'">'.$name.'</button>
		</div>';

	}


	function fechaform($tagfim=null)
	{
		echo "</form>";
	}

	//FIM - FUNÇOES FORMULÁRIO ----------------------------------------------------------------------------

	//INICIO - FUNÇOES USUARIO ----------------------------------------------------------------------------

	function selectPermissao($texto=NULL, $tipo=null, $name=null, $class=null){
		echo '
			<div class="'.$class.'">
			<label for="'.$texto.'">'.$texto.'</label>
				<select data-plugin-selectTwo class="form-control populate" name="'.$name.'" type="'.$tipo.'">
					<option value="">Selecionar:</option>
					<option value="ADMINISTRADOR">ADMINISTRADOR</option>
					<option value="SECRETARIA">SECRETARIA</option>
					<option value="SUPORTE">SUPORTE</option>
				</select>
			</div>
		';
	}

	//FIM - FUNÇOES USUARIO ----------------------------------------------------------------------------

	//INICIO - FUNÇOES TURMA ----------------------------------------------------------------------------

	function turSelectTurno($texto=NULL, $tipo=null, $name=null, $class=null){
		echo '
			<div class="'.$class.'">
			<label for="'.$texto.'">'.$texto.'</label>
				<select class="select2_group form-control" name="'.$name.'" type="'.$tipo.'">
					<option value="">Selecionar:</option>
					<option value="MATUTINO">MATUTINO</option>
					<option value="VESPERTINO">VESPERTINO</option>
					<option value="NOTURNO">NOTURNO</option>
				</select>
			</div>
		';
	}

	function turSelectAno($texto=NULL, $tipo=null, $name=null, $class=null){
		echo '
			<div class="'.$class.'">
			<label for="'.$texto.'">'.$texto.'</label>
				<select class="select2_group form-control" name="'.$name.'" type="'.$tipo.'">
					<option value="">Selecionar:</option>
					<option value="2016">2016</option>
				</select>
			</div>
		';
	}

	function turSelectNivel($texto=NULL, $tipo=null, $name=null, $class=null){
		echo '
			<div class="'.$class.'">
			<label for="'.$texto.'">'.$texto.'</label>
				<select class="select2_group form-control" name="'.$name.'" type="'.$tipo.'">
					<option value="">Selecionar:</option>
					<option value="Euc. Infaltil">Edu. Infantil</option>
					<option value="Ens. Fundamental">Ens. Fundamental</option>
					<option value="Ens. Médio">Ens. Médio</option>
					<option value="Ens. Tecnico">Ens. Técnico</option>
				</select>
			</div>
		';
	}

	function turSelectSituacao($texto=NULL, $tipo=null, $name=null, $class=null){
		echo '
			<div class="'.$class.'">
			<label for="'.$texto.'">'.$texto.'</label>
				<select class="select2_group form-control" name="'.$name.'" type="'.$tipo.'">
					<option value="">Selecionar:</option>
					<option value="ABERTA">ABERTA</option>
				</select>
			</div>
		';
	}

	function turSelectSerie($texto=NULL, $tipo=null, $name=null, $class=null){
		include('conexao.php');

		$aluno = $con->prepare("SELECT * FROM serie;");
		$aluno->execute();
			echo '<div class="'.$class.'">
			<label for="'.$texto.'">'.$texto.'</label>
			<select class="select2_group form-control" name="'.$name.'" type="'.$tipo.'">
			';
				echo '<option value="">Selecionar:</option>';
			while ($lista=$aluno->fetch(PDO::FETCH_ASSOC)) {
				echo '<option value="'.$lista["ser_id"].'">'.$lista["ser_nome"].'</option>';
			}
			echo '</select></div>';
	}

	function turSelectSala($texto=NULL, $tipo=null, $name=null, $class=null){
		include('conexao.php');

		$aluno = $con->prepare("SELECT  sala.sal_id,
														sala.sal_nome,
														sala.sal_qtd_aluno,
														sala.sal_situacao,
														sala.unidade_uni_id,
														unidade.uni_id,
														unidade.uni_nome
														FROM
														sala, unidade 
														WHERE sala.unidade_uni_id = unidade.uni_id;");
		$aluno->execute();
			echo '<div class="'.$class.'">
			<label for="'.$texto.'">'.$texto.'</label>
			<select class="select2_group form-control" name="'.$name.'" type="'.$tipo.'">
			';
				echo '<option value="">Selecionar:</option>';
			while ($lista=$aluno->fetch(PDO::FETCH_ASSOC)) {
				echo '<option value="'.$lista["sal_id"].'">'.$lista["sal_nome"].' - Uni.: '.$lista["uni_nome"].' </option>';
			}
			echo '</select></div>';
	}



	//FIM - FUNÇOES TURMA ----------------------------------------------------------------------------

	//INICIO - FUNÇOES SALA -------------------------------------------------------------------------
		function sal_selectSituacao($texto=NULL, $tipo=null, $name=null, $class=null){
		echo '
			<div class="'.$class.'">
			<label for="'.$texto.'">'.$texto.'</label>
				<select class="select2_group form-control" name="'.$name.'" type="'.$tipo.'" >
					<option value="">Selecionar:</option>
					<option value="ATIVA">ATIVA</option>
					<option value="DESATIVADA">DESATIVADA</option>
					<option value="MANUTENÇÃO">MANUTENÇÃO</option>
				</select>
			</div>
		';
	}

	function sal_selectUniadde($texto=NULL, $tipo=null, $name=null, $class=null){
		include('conexao.php');

		$aluno = $con->prepare("SELECT * FROM unidade;");
		$aluno->execute();
			echo '<div class="'.$class.'">
			<label for="'.$texto.'">'.$texto.'</label>
			<select class="select2_group form-control" name="'.$name.'" type="'.$tipo.'">
			';
				echo '<option value="">Selecionar:</option>';
			while ($lista=$aluno->fetch(PDO::FETCH_ASSOC)) {
				echo '<option value="'.$lista["uni_id"].'">'.$lista["uni_id"].' - '.$lista["uni_nome"].'</option>';
			}
			echo '</select></div>';
	}




	//FIM - FUNÇOES SALA -------------------------------------------------------------------------



	//INICIO - FUNÇOES ALUNO -------------------------------------------------------------------------

	function selectAluno($texto=NULL, $tipo=null, $name=null, $class=null){
		include('conexao.php');

		$aluno = $con->prepare("SELECT * FROM aluno;");
		$aluno->execute();
			echo '<div class="'.$class.'">
			<label for="'.$texto.'">'.$texto.'</label>
			<select class="select2_group form-control" name="'.$name.'" type="'.$tipo.'">
			';
				echo '<option value="">Selecionar:</option>';
			while ($lista=$aluno->fetch(PDO::FETCH_ASSOC)) {
				echo '<option value="'.$lista["alu_id"].'">'.$lista["alu_id"].' - '.$lista["alu_nome"].'</option>';
			}
			echo '</select></div>';
	}

	function selectTurma($texto=NULL, $tipo=null, $name=null, $class=null){
		include('conexao.php');

		$aluno = $con->prepare("SELECT
									sala.sal_id,
									sala.sal_nome,
									unidade.uni_id,
									unidade.uni_nome,
									serie.ser_id,
									serie.ser_nome,
									turma.tur_id,
									turma.tur_nome,
									turma.tur_turno,
									turma.tur_ano,
									turma.tur_nivel,
									turma.tur_situacao,
									turma.tur_qtd_aluno,
									turma.sala_sal_id,
									turma.serie_ser_id
									FROM
									turma ,
									sala ,
									unidade ,
									serie
									WHERE
									turma.sala_sal_id = sala.sal_id AND sala.unidade_uni_id = unidade.uni_id AND turma.serie_ser_id = serie.ser_id;");
		$aluno->execute();
			echo '<div class="'.$class.'">
			<label for="'.$texto.'">'.$texto.'</label>
			<select class="select2_group form-control" name="'.$name.'" type="'.$tipo.'">
			';
				echo '<option value="">Selecionar:</option>';
			while ($lista=$aluno->fetch(PDO::FETCH_ASSOC)) {
				echo '<option value="'.$lista["tur_id"].'">'.$lista["tur_nome"].' - '.$lista["uni_nome"].'</option>';
			}
			echo '</select></div>';
	}

	function selectCategoria($texto=NULL, $tipo=null, $name=null, $class=null){
		echo '
			<div class="'.$class.'">
			<label for="'.$texto.'">'.$texto.'</label>
				<select class="select2_group form-control" name="'.$name.'" type="'.$tipo.'">
					<option value="">Selecionar:</option>
					<option value="CIVIL">CIVIL</option>
					<option value="MILITAR">MILITAR</option>
				</select>
			</div>
		';
	}

	function alu_SelectSexo($texto=NULL, $tipo=null, $name=null, $class=null){
		echo '
			<div class="'.$class.'">
			<label for="'.$texto.'">'.$texto.'</label>
				<select class="select2_group form-control" name="'.$name.'" type="'.$tipo.'">
					<option value="">Selecionar:</option>
					<option value="M">MASCULINO</option>
					<option value="F">FEMININO</option>
				</select>
			</div>
		';
	}

	function selectStatus($texto=NULL, $tipo=null, $name=null, $class=null){
		echo '
			<div class="'.$class.'">
			<label for="'.$texto.'">'.$texto.'</label>
				<select class="select2_group form-control" name="'.$name.'" type="'.$tipo.'" >
					<option value="">Selecionar:</option>
					<option value="MATRICULADO">MATRICULADO</option>
					<option value="DESISTENTE">DESISTENTE</option>
				</select>
			</div>
		';
	}

	function alu_selectEtinia($texto=NULL, $tipo=null, $name=null, $class=null){
		echo '
			<div class="'.$class.'">
			<label for="'.$texto.'">'.$texto.'</label>
				<select class="select2_group form-control" name="'.$name.'" type="'.$tipo.'" >
					<option value="">Selecionar:</option>
					<option value="BRANCA">BRANCA</option>
					<option value="PARDA">PARDA</option>
					<option value="NEGRA">NEGRA</option>
					<option value="INDIGENA">INDIGENA</option>
				</select>
			</div>
		';
	}

	function alu_selectPNE($texto=NULL, $tipo=null, $name=null, $class=null){
		echo '
			<div class="'.$class.'">
			<label for="'.$texto.'">'.$texto.'</label>
				<select class="select2_group form-control" name="'.$name.'" type="'.$tipo.'" >
					<option value="">Selecionar:</option>
					<option value="Não">Não</option>
					<option value="Sim">Sim</option>
				</select>
			</div>
		';
	}


	
	//FIM - FUNÇOES ALUNO -------------------------------------------------------------------------



	

		

?>