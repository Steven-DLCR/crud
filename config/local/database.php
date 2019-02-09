<?php

Class Database
{
	protected $_db;

	private $_host = "localhost";
    private $_user = "root";
    private $_pass = "";
    private $_name = "";

	public function __construct()
	{
		try {
            $this->_db = new PDO('mysql:host='.$this->_host.';dbname='.$this->_name, $this->_user, $this->_pass);
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->_db->exec("set names utf8");
		} catch (PDOException $e) {
            return;
		}
	}
}