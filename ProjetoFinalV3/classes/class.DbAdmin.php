<?php

/**
 * Esse é o formato de comentário para documentação
 * - PHP Doc ( PHP Documentor )
 */
 
class DbAdmin
{

	//propriedades
	private $tipo;
	private $conn;
	
	
	//método construtor
	public function DbAdmin($tipo)
	{
		$this->tipo = $tipo;
	}
	
	
	//método que conecta com o SGBD
	public function connect ($host, $user, $pass, $base)
	{
		switch($this->tipo)	
		{
			case 'mysql':
				
				$this->conn = mysql_connect($host, $user, $pass);
				mysql_select_db($base);
				
			break;	
			
			case 'pgsql':
				
				$string = 'host='.$host.' port=5432 dbname ='.$base.' user='.$user.' password='.$pass;  
				$this->conn = pg_connect($string);
				
			break;
			
		}// fim switch($this->tipo)
	
	}// fim public function connect ($host, $user, $pass, $base)
	

	//método que executa uma instrução SQL e retorna um resultado
	public function query($sql)
	{
		switch($this->tipo){
			
			case 'mysql':
						
				$res = mysql_query($sql, $this->conn) or die (mysql_error());
			
			break;
			
			case 'pgsql':
			
				$res = pg_query($this->conn, $sql) or die ('bug');
			
			break;
			
		}// fim switch($this->tipo){
		
		return $res;
	
	}// fim public function query($sql)
	
	
	//método que retorna o número de linhas de uma consulta SQL
	public function rows_result($res)
	{
	
		switch($this->tipo){
			
			case 'mysql':
				
				$num = mysql_num_rows($res);
			
			break;
			
			case 'pgsql':
			
				$num = pg_num_rows($res);
			
			break;
			
		}// fim switch($this->tipo){
		
		return $num;
		
	}// fim public function rows($res)

	//método que retorna o número de linhas afetadas por um comando sql
	public function rows_affected($res)
	{
	
		switch($this->tipo){
			
			case 'mysql':
				
				$num = mysql_affected_rows($res);
			
			break;
			
		}// fim switch($this->tipo){
		
		return $num;
		
	}// fim public function rows($res)
	
	//método que retorna um dado de uma coluna de um result de consulta
	public function result ($res, $lin, $col)
	{
		switch($this->tipo){
			
			case 'mysql':
				
				$val = mysql_result($res, $lin, $col);
			
			break;
			
			case 'pgsql':
			
				$val - pg_fetch_result($res, $lin, $col);
			
			break;
			
		}// fim switch($this->tipo){
		
		return $val;
	}// fim public function result ($res, $lin, $col)
	
	
	//método que retorna o o ultimo ID inserido no BD
	public function lastid($res)
	{
	
		switch($this->tipo){
			
			case 'mysql':
				
				$num = mysql_insert_id($this->conn);
			
			break;
			
			case 'pgsql':
			
				//$num = pg_last_oid();
			
			break;
			
		}// fim switch($this->tipo){
		
	}// fim public function lastid($res)
	
	

	//método que fecha a conexão com o SGBD
	public function close($res)
	{
	
		switch($this->tipo){
			
			case 'mysql':
				
				mysql_close($this->conn);
			
			break;
			
			case 'pgsql':
			
				pg_close($this->conn);
			
			break;
			
		}// fim switch($this->tipo){
		
	}// fim public function lastid($res)

}


?>