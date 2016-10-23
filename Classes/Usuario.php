<?php
	require_once 'Classes/Conexao.php';
	class Usuario extends Conexao{
		
		//Inicio: Atributos da classe
			private $id = null;
			private $nome = null;
			private $login = null;
			private $senha = null;
			private $fone = null;
			private $permissao = null;


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

			public function setLogin($login){
				$this->login=$login;
			}
			public function getLogin(){
				return $this->login;
			}

			public function setSenha($senha){
				$this->senha=$senha;
			}
			public function getSenha(){
				return $this->senha;
			}

			public function setFone($fone){
				$this->fone=$fone;
			}
			public function getFone(){
				return $this->fone;
			}

			public function setPermissao($permissao){
				$this->permissao=$permissao;
			}
			public function getPermissao(){
				return $this->permissao;
			}
		//Fim: Set e Get 
		
	
		//Inicio: Metodo de lista
			public function lista(){
				$con = $this->Conectar();
				try {
					$listaUsuario = $con->prepare("SELECT * FROM usuario;");
					$listaUsuario->execute();
					
						if ($listaUsuario->rowCount()>=0) {
							return $listaUsuario;
						}else {
							return false;
						}
				} catch (Exception $e) {
					echo "Erro na Seleção";		
			}
		}//Fim: Metodo de lista

		//Inicio: Metodo de cadastro
		public function cadastro(){	
			$con = $this->Conectar();
			
			try {
					$cadUsuario = $con->prepare("INSERT INTO usuario(usu_nome, usu_login, usu_senha, usu_contato, usu_permissao)VALUES(:usu_nome, :usu_login, :usu_senha, :usu_contato, :usu_permissao);");
					$cadUsuario->bindValue(':usu_nome', $this->getNome());
					$cadUsuario->bindValue(':usu_login', $this->getLogin());
					$cadUsuario->bindValue(':usu_senha', $this->getSenha());
					$cadUsuario->bindValue(':usu_contato', $this->getFone());
					$cadUsuario->bindValue(':usu_permissao', $this->getPermissao());
					$cadUsuario->execute();

				if ($cadUsuario->rowCount()==1) {
							return true;
						}else {
							return false;
						}
			} catch (Exception $e) {
				echo "Erro na inserção Objeto Material";
			}
		}//Fim: Metodo de cadastro de Funcionarios


	}//Fim da classe


?>