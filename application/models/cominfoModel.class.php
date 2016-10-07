<?php
class cominfoModel extends Model {
	private $id;
	private $limit;
	private $comcode;
	private $comname;
	private $ip;
	private $mac;
	private $user;
	private $department;
	private $room;
	private $cpu;
	private $memory;
	private $memoryType;
	private $motherboardModel;
	private $chipset;
	private $machineRoomPort;
	private $switchNumber;
	private $internet;
	private $sww;
	private $application;
	private $description;
	private $updateTime;
	private $kind;
	public function __set($_key, $_value) {
		$this->$_key = $_value;
	}
	public function __get($_key) {
		return $this->$_key;
	}
	
	/**
	 * 获得所有的计算机记录的信息，按名称倒序排列
	 */
	public function getALLCominfo() {
		$_sql = "select * from wire.cominfo order by comname desc " . $this->limit;
		
		
		return parent::getAllData ( $_sql );
	}
	/**
	 * 获得所有计算机记录的记录总数
	 */
	public function getALLCominfoTotal() {
		
		$_sql = "select * from wire.cominfo";
		return parent::getTotal ( $_sql );
	}
	
	/**
	 * 获得一条符合要求的计算机信息
	 */
	public function getOneCominfo() {
		$_sql = "select * from wire.cominfo where id=" . $this->id;
// 		echo $_sql;
		return parent::getOne ( $_sql );
	}
	public function deleteConinfo() {
		$_sql = "delete from wire.cominfo where id=" . $this->id;
// 		echo $_sql;
		return parent::cud ( $_sql );
	}
	public function addCominfo() {
		$_sql = "insert into wire.cominfo(
				comcode,
				comname,
				ip,
				mac,
				user,
				department,
				cpu,
				memoryCapacity,
				memoryType,
				motherboardModel,
				chipset,
				machineRoomPort,
				switchNumber,
				internet,
				sww,
				application,
				description,
				updateTime
		)values(
			'" . $this->comcode . "',
			'" . $this->comname . "',
			'" . $this->ip . "',
			'" . $this->mac . "',
			'" . $this->user . "',
			'" . $this->department . "',
			'" . $this->cpu . "',
			'" . $this->memoryCapacity . "',
			'" . $this->memoryType . "',
			'" . $this->motherboardModel . "',
			'" . $this->chipset . "',
			'" . $this->machineRoomPort . "',
			'" . $this->switchNumber. "',
			'" . $this->internet . "',
			'" . $this->sww . "',
			'" . $this->application . "',
			'" . $this->description . "',
			now()
		)";
// 		echo $_sql;
		return parent::cud ( $_sql );
	}
	public function updateCominfo() {
		$_sql = "update wire.cominfo set 
				comcode='".$this->comcode."',
				comname='".$this->comname."',
				ip='".$this->ip."',
				mac='".$this->mac."',
				user='".$this->user."',
				department='".$this->department."',
				cpu='".$this->cpu."',
				memoryCapacity='".$this->memoryCapacity."',
				memoryType='".$this->memoryType."',
				motherboardModel='".$this->motherboardModel."',
				chipset='".$this->chipset."',
				machineRoomPort='".$this->machineRoomPort."',
				switchNumber='".$this->switchNumber."',
				internet='".$this->internet."',
				sww='".$this->sww."',
				application='".$this->application."',
				description='".$this->description."',
				updateTime=now()
		where id='".$this->id."'";
// 		echo $_sql;
// 		exit();
		return parent::cud ( $_sql );
	}
}