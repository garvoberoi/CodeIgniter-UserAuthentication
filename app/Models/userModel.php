<?php namespace App\Models ;

use CodeIgniter\Model; 

class userModel extends Model{
    protected $table = 'users';
    protected $allowedFields = ['name','email','password'];
    protected $beforeInsert = ['beforeInsert'];

    protected function beforeInsert(array $data)
	{
		$data = $this->passwordHash($data);
		return $data;
	}

	protected function passwordHash(array $data)
	{
		if (isset($data['data']['password'])) {
			$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
		return $data;
	}
}

