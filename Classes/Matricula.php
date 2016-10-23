<?php
	require_once 'Classes/Conexao.php';
	class Matricula extends Conexao{
		
		//Inicio: Atributos da classe
			private $idmatricula = null;
			private $aluno = null;
			private $turma = null;
			private $ano = null;
			private $responsavel = null;
			private $contato = null;
			private $categoria = null;
			private $status = null;


						  			
		//Fim: Atributos da classe

		//Inicio: Set e Get 
			public function setIdMatricula($idmatricula){
				$this->idmatricula=$idmatricula;
			}
			public function getIdMatricula(){
				return $this->idmatricula;
			}

			public function setAluno($aluno){
				$this->aluno=$aluno;
			}
			public function getAluno(){
				return $this->aluno;
			}

			public function setTurma($turma){
				$this->turma=$turma;
			}
			public function getTurma(){
				return $this->turma;
			}


			public function setAno($ano){
				$this->ano=$ano;
			}
			public function getAno(){
				return $this->ano;
			}


			public function setResponsavel($responsavel){
				$this->responsavel=$responsavel;
			}
			public function getResponsavel(){
				return $this->responsavel;
			}

			public function setContato($contato){
				$this->contato=$contato;
			}
			public function getContato(){
				return $this->contato;
			}

			public function setCategoria($categoria){
				$this->categoria=$categoria;
			}
			public function getCategoria(){
				return $this->categoria;
			}

			public function setStatus($status){
				$this->status=$status;
			}
			public function getStatus(){
				return $this->status;
			}
	
		//Fim: Set e Get 
		
		//Inicio: Metodo de cadastro
		public function cadastro(){	
			$con = $this->Conectar();
			
			try {
					$cadMatricula = $con->prepare("INSERT INTO matricula(aluno_alu_id, turma_tur_id, mat_ano, mat_responsavel, mat_resp_contato, mat_resp_categoria, mat_status) VALUES (:aluno_alu_id, :turma_tur_id, :mat_ano, :mat_responsavel, :mat_resp_contato, :mat_resp_categoria, :mat_status);");
					$cadMatricula->bindValue(':aluno_alu_id', $this->getAluno());
					$cadMatricula->bindValue(':turma_tur_id', $this->getTurma());
					$cadMatricula->bindValue(':mat_ano', $this->getAno());
					$cadMatricula->bindValue(':mat_responsavel', $this->getResponsavel());
					$cadMatricula->bindValue(':mat_resp_contato', $this->getContato());
					$cadMatricula->bindValue(':mat_resp_categoria', $this->getCategoria());
					$cadMatricula->bindValue(':mat_status', $this->getStatus());
					
					$cadMatricula->execute();

				if ($cadMatricula->rowCount()==1) {
							return true;
						}else {
							return false;
						}
			} catch (Exception $e) {
				echo "Erro na inserção Objeto Material";
			}
		}//Fim: Metodo de cadastro de Funcionarios
	
		//Inicio: Metodo de lista
			public function lista(){
				$con = $this->Conectar();
				try {
					$listaMatricula = $con->prepare("SELECT * FROM matricula;");
					$listaMatricula->execute();
					
						if ($listaMatricula->rowCount()>=0) {
							return $listaMatricula;
						}else {
							return false;
						}
				} catch (Exception $e) {
					echo "Erro na Seleção";		
			}
		}//Fim: Metodo de lista

		//Inicio: Metodo de listaMatriculados
			public function listaMatriculados(){
				$con = $this->Conectar();
				try {
					$listaMatricula = $con->prepare("SELECT
															matricula.aluno_alu_id,
															matricula.turma_tur_id,
															matricula.mat_ano,
															matricula.mat_responsavel,
															matricula.mat_resp_contato,
															matricula.mat_resp_categoria,
															matricula.mat_status,
															aluno.alu_id,
															aluno.alu_nome,
															turma.tur_id,
															turma.tur_nome,
															turma.serie_ser_id,
															sala.sal_id,
															sala.sal_nome,
															unidade.uni_id,
															unidade.uni_nome,
															serie.ser_id,
															serie.ser_nome
															FROM
															matricula
															INNER JOIN aluno ON matricula.aluno_alu_id = aluno.alu_id
															INNER JOIN turma ON matricula.turma_tur_id = turma.tur_id
															INNER JOIN sala ON turma.sala_sal_id = sala.sal_id
															INNER JOIN unidade ON sala.unidade_uni_id = unidade.uni_id
															INNER JOIN serie ON turma.serie_ser_id = serie.ser_id;");
					$listaMatricula->execute();
					
						if ($listaMatricula->rowCount()>=0) {
							return $listaMatricula;
						}else {
							return false;
						}
				} catch (Exception $e) {
					echo "Erro na Seleção";		
			}
		}//Fim: Metodo de listaMatriculados

		//Inicio: Metodo de listaMatriculados
			public function buscaMatriculados(){
				$con = $this->Conectar();
				try {
					$listaBuscaMatricula = $con->prepare("SELECT
                                                        matricula.aluno_alu_id,
                                                        matricula.turma_tur_id,
                                                        matricula.mat_ano,
                                                        matricula.mat_status,
                                                        aluno.alu_id,
                                                        aluno.alu_nome,
                                                        turma.tur_id,
                                                        turma.tur_nome,
                                                        turma.tur_turno,
                                                        turma.tur_ano,
                                                        turma.serie_ser_id,
                                                        serie.ser_id,
                                                        serie.ser_nome,
                                                        sala.sal_id,
                                                        sala.sal_nome,
                                                        turma.sala_sal_id,
                                                        sala.unidade_uni_id,
                                                        unidade.uni_id,
                                                        unidade.uni_nome,
                                                        unidade.uni_endereco,
                                                        unidade.uni_fone,
                                                        unidade.uni_gerente
                                                        FROM
                                                        matricula
                                                        INNER JOIN aluno ON matricula.aluno_alu_id = aluno.alu_id
                                                        INNER JOIN turma ON matricula.turma_tur_id = turma.tur_id
                                                        INNER JOIN serie ON turma.serie_ser_id = serie.ser_id
                                                        INNER JOIN sala ON turma.sala_sal_id = sala.sal_id
                                                        INNER JOIN unidade ON sala.unidade_uni_id = unidade.uni_id
                                                        WHERE matricula.turma_tur_id = turma.tur_id AND matricula.aluno_alu_id =:aluno_alu_id;");
					$listaBuscaMatricula->bindValue(':aluno_alu_id', $this->getIdMatricula());
					$listaBuscaMatricula->execute();
					
						if ($listaBuscaMatricula->rowCount()>=0) {
							return $listaBuscaMatricula;
						}else {
							return false;
						}
				} catch (Exception $e) {
					echo "Erro na Seleção";		
			}
		}//Fim: Metodo de listaMatriculados


	}//Fim da classe


?>