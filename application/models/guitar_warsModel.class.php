<?php
class guitar_warsModel extends Model {
	
	private $id;
	private $limit;
	private $date;
	private $name;
	private $score;
	private $screenShot;
	private $kind;
	public function __set($_key, $_value) {
		$this->$_key = $_value;
	}
	public function __get($_key) {
		return $this->$_key;
	}
	
	/** 
	 *获得数据库内所有上传的数据 按分数降序输出 
	 *  
	 */
	public function getALLGuitarWarsScores() {
	
		$_sql = "select * from guitar_wars.guitar_wars order by score desc " . $this->limit;
	
		return parent::getAllData ( $_sql );
	}
	/**
	 * 获得所有计算机记录的记录总数
	 */
	public function getALLGuitarWarsScoresTotal() {
	
		$_sql = "select * from guitar_wars.guitar_wars";
		return parent::getTotal ( $_sql );
	}
	
	/**
	 * 获得一条符合要求的计算机信息
	 */
	public function getOneGuitarWarsScore() {
		$_sql = "select * from guitar_wars.guitar_wars where id=" . $this->id;
		// 		echo $_sql;
		return parent::getOne ( $_sql );
	}
	public function deleteOneGuitarWarsScore() {
		$_sql = "delete from guitar_wars.guitar_wars where id=" . $this->id;
	
		return parent::cud ( $_sql );
	}
	public function addGuitarWarsScore() {
	
		$_sql = "insert into guitar_wars.guitar_wars(
			id,
			date,
			name,
			score,
			screenShot
			
		)values(
			null,
			now(),
			'" . $this->name . "',
			'" . $this->score . "',
			'" . $this->screenShot."'
		)";
		
		
	
		return parent::cud ( $_sql );
	}
	public function updateOneGuitarWarsScore() {
		
		
		$_sql = "update guitar_wars.guitar_wars set
				name='".$this->name."',
				score=".$this->score.",
				date=now(),
				screenshot='".$this->screenShot."' 
		where id=".$this->id;
		
// 		echo $_sql;
		
		return parent::cud ( $_sql );
	}
}
	
	
	
	
	

	