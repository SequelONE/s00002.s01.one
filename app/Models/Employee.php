<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * @throws \JsonException
     */
    public function getAll() {
        $url = 'https://dummy.restapiexample.com/api/v1/employees';
        $json = file_get_contents($url);
        return json_decode($json, true, 512, JSON_THROW_ON_ERROR)['data'];
    }

    /**
     * @throws \JsonException
     */
    public function getEmployee($id)
    {
        $url = 'https://dummy.restapiexample.com/api/v1/employee/' . $id;
        $json = file_get_contents($url);
        return json_decode($json, true, 512, JSON_THROW_ON_ERROR)['data'];
    }

    /**
     * @throws \JsonException
     */
    public function updateEmployee($id)
    {
        $url = 'https://dummy.restapiexample.com/api/v1/employee/' . $id;
        $json = file_get_contents($url);
        return json_decode($json, true, 512, JSON_THROW_ON_ERROR)['data'];
    }

    /**
     * @throws \JsonException
     */
    public function createEmployee($id)
    {
        $url = 'https://dummy.restapiexample.com/api/v1/employee/' . $id;
        $json = file_get_contents($url);
        return json_decode($json, true, 512, JSON_THROW_ON_ERROR)['data'];
    }

    /**
     * @throws \JsonException
     */
    public function deleteEmployee($id)
    {
        $url = 'https://dummy.restapiexample.com/api/v1/employee/' . $id;
        $json = file_get_contents($url);
        return json_decode($json, true, 512, JSON_THROW_ON_ERROR)['data'];
    }
}
