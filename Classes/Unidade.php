<?php
	require_once 'Classes/Conexao.php';
	class Unidade extends Conexao{
		
		//Inicio: Atributos da classe
			private $id = null;
			private $nome = null;
			private $endereco = null;
			private $fone = null;
			private $gerente = null;

			
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

			public function setendereco($endereco){
				$this->endereco=$endereco;
			}
			public function getendereco(){
				return $this->endereco;
			}

			public function setefone($fone){
				$this->fone=$fone;
			}
			public function getfone(){
				return $this->fone;
			}

			public function setegerente($gerente){
				$this->gerente=$gerente;
			}
			public function getgerente(){
				return $this->gerente;
			}
		
		//Fim: Set e Get 

		//Inicio: Metodo de cadastro
		public function cadastro(){	
			$con = $this->Conectar();
			
			try {
					$cadTurma = $con->prepare("INSERT INTO unidade(uni_nome, uni_endereco, uni_fone, uni_gerente) VALUES (:uni_nome, :uni_endereco, :uni_fone, :uni_gerente);");
					$cadUnidade->bindValue(':uni_nome', $this->getNome());
					$cadUnidade->bindValue(':uni_endereco', $this->getendereco());
					$cadUnidade->bindValue(':uni_fone', $this->getfone());
					$cadUnidade->bindValue(':uni_gerente', $this->getgerente());
					
					$cadUnidade->execute();

				if ($cadUnidade->rowCount()==1) {
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
					$listaUnidade = $con->prepare("SELECT * FROM unidade;");
					$listaUnidade->execute();
					
						if ($listaUnidade->rowCount()>=0) {
							return $listaUnidade;
						}else {
							return false;
						}
				} catch (Exception $e) {
					echo "Erro na Seleção";		
			}
		}//Fim: Metodo de lista


	}//Fim da classe


?>