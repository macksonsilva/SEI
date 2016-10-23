<?php
	require_once 'Classes/Conexao.php';
	class Sala extends Conexao{
		
		//Inicio: Atributos da classe
			private $id = null;
			private $nome = null;
			private $qtdaluno = null;
			private $situacao = null;
			private $unidade = null;
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

			public function setQtdaluno($qtdaluno){
				$this->qtdaluno=$qtdaluno;
			}
			public function getQtdaluno(){
				return $this->qtdaluno;
			}

			public function setSituacao($situacao){
				$this->situacao=$situacao;
			}
			public function getSituacao(){
				return $this->situacao;
			}

			public function setUnidade($unidade){
				$this->unidade=$unidade;
			}
			public function getUnidade(){
				return $this->unidade;
			}


		//Fim: Set e Get 
		
		//Inicio: Metodo de cadastro
		public function cadastro(){	
			$con = $this->Conectar();
			
			try {
					$cadSala = $con->prepare("INSERT INTO sala(sal_nome, sal_qtd_aluno, sal_situacao, unidade_uni_id) VALUES (:sal_nome, :sal_qtd_aluno, :sal_situacao, :unidade_uni_id);");
					$cadSala->bindValue(':sal_nome', $this->getNome());
					$cadSala->bindValue(':sal_qtd_aluno', $this->getQtdaluno());
					$cadSala->bindValue(':sal_situacao', $this->getSituacao());
					$cadSala->bindValue(':unidade_uni_id', $this->getUnidade());
					$cadSala->execute();

				if ($cadSala->rowCount()==1) {
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
					$listaSala = $con->prepare("SELECT  sala.sal_id,
														sala.sal_nome,
														sala.sal_qtd_aluno,
														sala.sal_situacao,
														sala.unidade_uni_id,
														unidade.uni_id,
														unidade.uni_nome
														FROM
														sala, unidade 
														WHERE sala.unidade_uni_id = unidade.uni_id;");
					$listaSala->execute();
					
						if ($listaSala->rowCount()>=0) {
							return $listaSala;
						}else {
							return false;
						}
				} catch (Exception $e) {
					echo "Erro na Seleção";		
			}
		}//Fim: Metodo de lista


	}//Fim da classe


?>