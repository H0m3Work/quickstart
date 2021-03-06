<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface 
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $_model;
    
    /**
     * EloquentRepository constructor
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->_model->findOrFail($id);
        return $result;
    }

    /**
     * Create
     * @param array $atributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->_model->created($attributes);
    }

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $retult = $this->findOrFail($id);
        
        $result->update($atributes);
        return $result;
    }

    /**
     * Delete
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->findOrFail($id);
        
        $result->delete();
        return true;    
    }
}
