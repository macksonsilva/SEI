<?php
	require_once 'Classes/Conexao.php';
	class Serie extends Conexao{
		
		//Inicio: Atributos da classe
			private $id = null;
			
		//Fim: Atributos da classe

		//Inicio: Set e Get 
			public function setId($id){
				$this->id=$id;
			}
			public function getId(){
				return $this->id;
			}

			
		//Fim: Set e Get 
		
	
		//Inicio: Metodo de lista
			public function lista(){
				$con = $this->Conectar();
				try {
					$listaSerie = $con->prepare("SELECT  * FROM serie;");
					$listaSerie->execute();
					
						if ($listaSerie->rowCount()>=0) {
							return $listaSerie;
						}else {
							return false;
						}
				} catch (Exception $e) {
					echo "Erro na Seleção";		
			}
		}//Fim: Metodo de lista


	}//Fim da classe


?>