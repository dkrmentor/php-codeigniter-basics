<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'admin';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'id', 'fname', 'lname', 'email', 'password', 'created_at', 'updated_at'
    ];

   protected $beforeInsert   = ["beforeInsert"];
    protected $beforeUpdate   = ["beforeUpdate"];
    
    // Define a function that will be called before inserting a new row
    protected function beforeInsert(array $data)
    {
        // Hash the password field using the 'passwordHash()' function
        $data = $this->passwordHash($data);

        // Add the current date and time to the 'created_at' field
        $data['data']['created_at'] = date('Y-m-d H:i:s');

        // Return the modified data array
        return $data;
    }

    // Define a function that will be called before updating an existing row
    protected function beforeUpdate(array $data)
    {
        // Hash the password field using the 'passwordHash()' function
        $data = $this->passwordHash($data);

        // Add the current date and time to the 'updated_at' field
        $data['data']['updated_at'] = date('Y-m-d H:i:s');

        // Return the modified data array
        return $data;
    }

    // Define a function that hashes the 'password' field in a data array
    protected function passwordHash(array $data)
    {
        // If the 'password' field is set in the data array
        if (isset($data['data']['password'])) {
            // Hash the 'password' field using the bcrypt algorithm
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }

        // Return the modified data array
        return $data;
    }


}
