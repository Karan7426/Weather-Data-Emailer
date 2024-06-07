<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'users';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		"full_name",
		"email",
		"mobile_number",
		"password",
		"created_on",
		"is_active"
	];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// // Callbacks
	// protected $allowCallbacks       = true;
	// protected $beforeInsert         = ["beforeInsert"];
	// protected $afterInsert          = [];
	// protected $beforeUpdate         = [];
	// protected $afterUpdate          = [];
	// protected $beforeFind           = [];
	// protected $afterFind            = [];
	// protected $beforeDelete         = [];
	// protected $afterDelete          = [];


	
	  function insertRecord($table, $colums)                        {
		$db      = \Config\Database::connect();
		$builder = $db->table($table);
		if ($builder->insert($colums))
		return  $db->insertID();
		else
		return false;  // echo  $db->getLastQuery();die; 
	   
		}

		function updateRecord($table, $colums, $condition)            {

		$db      = \Config\Database::connect();
		$builder = $db->table($table);




		if ( $builder->where($condition)->set($colums)->update())
		return true;
		else
		return false;
		}
		function deleteRecord($table, $condition)                     {
		$db      = \Config\Database::connect();
		$builder = $db->table($table);
		if ($builder->delete($condition))
		return true;
		else
		return false; 
		}

		function getQuery($sql)                                      {
		$fetchRow = $this->db->query($sql);
		return $fetchRow;
		}
		function runQuery($sql, $flag = '')                          {
		// echo $sql; die;
		$this->result = $this->db->query($sql);
		if ($flag)
		return $this->result->getRow();
		else
		return $this->result->getResult();
		}


	// protected function beforeInsert(array $data)
	// {
	// 	$data = $this->$data;
	// 	return $data;
	// }

	// protected function passwordHash(array $data)
	// {
	// 	if (isset($data['data']['password'])) {
	// 		$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
	// 	}

	// 	return $data;
	// }



	protected function passwordVerify(array $data)
{
    if (isset($data['data']['password']) && isset($data['user']['password'])) {
        return password_verify($data['data']['password'], $data['user']['password']);
    }
    return false;
}


	function UserDetail($email)
	{
		 
		
				   $sql = "select * from assdt_users  where email = :email:";
				   $data = $this->db->query($sql, [ 'email'     => $email ]);
				  return  $results = $data->getRow();
				   
	}

	

}?>