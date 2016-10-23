<?php
	require_once 'Classes/Conexao.php';
	class Aluno extends Conexao{
		
		//Inicio: Atributos da classe
			private $id = null;
			private $nome = null;
			private $nguerra = null;
			private $cpf = null;
			private $nascimento = null;
			private $idade = null;
			private $rg = null;
			private $sexo = null;
			private $etinia = null;
			private $endereco = null;
			private $bairro = null;
			private $cep = null;
			private $pai = null;
			private $empresap = null;
			private $funcaop = null;
			private $contatop = null;
			private $mae = null;
			private $empresam = null;
			private $funcaom = null;
			private $contatom = null;
			private $pne = null;
			private $foto = null;
			private $observacao = null;
		
			// private $qtdaluno = null;
			// private $situacao = null;

		//Fim: Atributos da classe

		//Inicio: Set e Get 
			public function setId($id){
				$this->id=$id;
			}
			public function getId(){
				return $this->id;
			}

			public function setnome($nome){
				$this->nome=$nome;
			}
			public function getnome(){
				return $this->nome;
			}

			public function setnguerra($nguerra){
				$this->nguerra=$nguerra;
			}
			public function getnguerra(){
				return $this->nguerra;
			}


			public function setcpf($cpf){
				$this->cpf=$cpf;
			}
			public function getcpf(){
				return $this->cpf;
			}

			public function setnascimento($nascimento){
				$this->nascimento=$nascimento;
			}
			public function getnascimento(){
				return $this->nascimento;
			}

			public function setidade($idade){
				$this->idade=$idade;
			}
			public function getidade(){
				return $this->idade;
			}

			public function setrg($rg){
				$this->rg=$rg;
			}
			public function getrg(){
				return $this->rg;
			}

			public function setsexo($sexo){
				$this->sexo=$sexo;
			}
			public function getsexo(){
				return $this->sexo;
			}

			public function setetinia($etinia){
				$this->etinia=$etinia;
			}
			public function getetinia(){
				return $this->etinia;
			}

			public function setendereco($endereco){
				$this->endereco=$endereco;
			}
			public function getendereco(){
				return $this->endereco;
			}

			public function setbairro($bairro){
				$this->bairro=$bairro;
			}
			public function getbairro(){
				return $this->bairro;
			}

			public function setcep($cep){
				$this->cep=$cep;
			}
			public function getcep(){
				return $this->cep;
			}

			public function setpai($pai){
				$this->pai=$pai;
			}
			public function getpai(){
				return $this->pai;
			}

			public function setempresap($empresap){
				$this->empresap=$empresap;
			}
			public function getempresap(){
				return $this->empresap;
			}

			
			public function setfuncaop($funcaop){
				$this->funcaop=$funcaop;
			}
			public function getfuncaop(){
				return $this->funcaop;
			}
			
				
			public function setcontatop($contatop){
				$this->contatop=$contatop;
			}
			public function getcontatop(){
				return $this->contatop;
			}
					
			
			public function setmae($mae){
				$this->mae=$mae;
			}
			public function getmae(){
				return $this->mae;
			}
			
			
			public function setempresam($empresam){
				$this->empresam=$empresam;
			}
			public function getempresam(){
				return $this->empresam;
			}

			public function setfuncaom($funcaom){
				$this->funcaop=$funcaop;
			}
			public function getfuncaom(){
				return $this->funcaom;
			}
			
			
			public function setcontatom($contatom){
				$this->contatom=$contatom;
			}
			public function getcontatom(){
				return $this->contatom;
			}
			
			
			public function setpne($pne){
				$this->pne=$pne;
			}
			public function getpne(){
				return $this->pne;
			}
			
			
			public function setfoto($foto){
				$this->foto=$foto;
			}
			public function getfoto(){
				return $this->foto;
			}
			
			
			public function setobservacao($observacao){
				$this->observacao=$observacao;
			}
			public function getobservacao(){
				return $this->observacao;
			}
			

			

			/*

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
			
			*/

		//Fim: Set e Get 
		
		//Inicio: Metodo de Cadastro
			public function cadastro(){
				$con = $this->Conectar();
					try {
						$cadAluno = $con->prepare("INSERT INTO aluno(alu_nome, alu_nome_guerra, alu_cpf, alu_data_nasc, alu_idade, alu_rg, alu_sexo, alu_etinia, alu_endereco, alu_bairro, alu_cep, alu_pai, alu_pai_trabalho, alu_pai_funcao, alu_pai_contato, alu_mae, alu_mae_trabalho, alu_mae_funcao, alu_mae_contato, alu_pne, alu_foto, alun_obs) VALUES (:alu_nome, :alu_nome_guerra, :alu_cpf, :alu_data_nasc, :alu_idade, :alu_rg, :alu_sexo, :alu_etinia, :alu_endereco, :alu_bairro, :alu_cep, :alu_pai, :alu_pai_trabalho, :alu_pai_funcao, :alu_pai_contato, :alu_mae, :alu_mae_trabalho, :alu_mae_funcao, :alu_mae_contato, :alu_pne, :alu_foto, :alun_obs)");
						$cadAluno->bindValue(':alu_nome', $this->getnome());
						$cadAluno->bindValue(':alu_nome_guerra', $this->getnguerra());
						$cadAluno->bindValue(':alu_cpf', $this->getcpf());
						$cadAluno->bindValue(':alu_data_nasc', $this->getnascimento());
						$cadAluno->bindValue(':alu_idade', $this->getidade());
						$cadAluno->bindValue(':alu_rg', $this->getrg());
						$cadAluno->bindValue(':alu_sexo', $this->getsexo());
						$cadAluno->bindValue(':alu_etinia', $this->getetinia());
						$cadAluno->bindValue(':alu_endereco', $this->getendereco());
						$cadAluno->bindValue(':alu_bairro', $this->getbairro());
						$cadAluno->bindValue(':alu_cep', $this->getcep());
						$cadAluno->bindValue(':alu_pai', $this->getpai());

						$cadAluno->bindValue(':alu_pai_trabalho', $this->getpai());
						$cadAluno->bindValue(':alu_pai_funcao', $this->getfuncaop());
						$cadAluno->bindValue(':alu_pai_contato', $this->getcontatop());


						$cadAluno->bindValue(':alu_mae', $this->getmae());
						$cadAluno->bindValue(':alu_mae_trabalho', $this->getempresam());
						$cadAluno->bindValue(':alu_mae_funcao', $this->getfuncaom());
						$cadAluno->bindValue(':alu_mae_contato', $this->getcontatom());
						$cadAluno->bindValue(':alu_pne', $this->getpne());
						$cadAluno->bindValue(':alu_foto', $this->getfoto());
						$cadAluno->bindValue(':alun_obs', $this->getobservacao());

						$cadAluno->execute();

					if ($cadAluno->rowCount()==1) {
							return true;
						}else {
							return false;
						}
			} catch (Exception $e) {
				echo "Erro na inserção Objeto Material";
			}
		}//Fim: Metodo de cadastro de Aluno


		//Inicio: Metodo de lista
			public function lista(){
				$con = $this->Conectar();
				try {
					$listaAluno = $con->prepare("SELECT * FROM aluno;");
					$listaAluno->execute();
					
						if ($listaAluno->rowCount()>=0) {
							return $listaAluno;
						}else {
							return false;
						}
				} catch (Exception $e) {
					echo "Erro na Seleção";		
			}
		}//Fim: Metodo de lista


	}//Fim da classe


?>