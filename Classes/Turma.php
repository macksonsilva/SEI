<?php
	require_once 'Classes/Conexao.php';
	class Turma extends Conexao{
		
		//Inicio: Atributos da classe
			private $id = null;
			private $nome = null;
			private $turno = null;
			private $ano = null;
			private $nivel = null;
			private $situacao = null;
			private $qtd = null;
			private $sala = null;
			private $serie = null;
			


		//Fim: Atributos da classe

		//Inicio: Set e Get 
			public function setId($id){
				$this->id=$id;
			}
			public function getId(){
				return $this->id;
			}

			public function setNome($nome){
				$this->nome=$nome;
			}
			public function getNome(){
				return $this->nome;
			}

			public function setTurno($turno){
				$this->turno=$turno;
			}
			public function getTurno(){
				return $this->turno;
			}

			public function setAno($ano){
				$this->ano=$ano;
			}
			public function getAno(){
				return $this->ano;
			}

			public function setNivel($nivel){
				$this->nivel=$nivel;
			}
			public function getNivel(){
				return $this->nivel;
			}

			public function setSituacao($situacao){
				$this->situacao=$situacao;
			}
			public function getSituacao(){
				return $this->situacao;
			}

			public function setQtdaluno($qtd){
				$this->qtd=$qtd;
			}
			public function getQtdaluno(){
				return $this->qtd;
			}

			public function setSala($sala){
				$this->sala=$sala;
			}
			public function getSala(){
				return $this->sala;
			}

			public function setSerie($serie){
				$this->serie=$serie;
			}
			public function getSerie(){
				return $this->serie;
			}



			

		//Fim: Set e Get 
		//Inicio: Metodo de cadastro
		public function cadastro(){	
			$con = $this->Conectar();
			
			try {
					$cadTurma = $con->prepare("INSERT INTO turma(tur_nome, tur_turno, tur_ano, tur_nivel, tur_situacao, tur_qtd_aluno, sala_sal_id, serie_ser_id) VALUES (:tur_nome, :tur_turno, :tur_ano, :tur_nivel, :tur_situacao, :tur_qtd_aluno, :sala_sal_id, :serie_ser_id);");
					$cadTurma->bindValue(':tur_nome', $this->getNome());
					$cadTurma->bindValue(':tur_turno', $this->getTurno());
					$cadTurma->bindValue(':tur_ano', $this->getAno());
					$cadTurma->bindValue(':tur_nivel', $this->getNivel());
					$cadTurma->bindValue(':tur_situacao', $this->getSituacao());
					$cadTurma->bindValue(':tur_qtd_aluno', $this->getQtdaluno());
					$cadTurma->bindValue(':sala_sal_id', $this->getSala());
					$cadTurma->bindValue(':serie_ser_id', $this->getSerie());
					$cadTurma->execute();

				if ($cadTurma->rowCount()==1) {
							return true;
						}else {
							return false;
						}
			} catch (Exception $e) {
				echo "Erro na inserção Objeto Material";
			}
		}//Fim: Metodo de cadastro
	
	
		//Inicio: Metodo de lista
			public function lista(){
				$con = $this->Conectar();
				try {
					$listaTurma = $con->prepare("SELECT
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
					$listaTurma->execute();
					
						if ($listaTurma->rowCount()>=0) {
							return $listaTurma;
						}else {
							return false;
						}
				} catch (Exception $e) {
					echo "Erro na Seleção";		
			}
		}//Fim: Metodo de lista


	}//Fim da classe


?>