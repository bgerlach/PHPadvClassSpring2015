<?php
/**
 * Interface for Database Access Object
 * 
 * Object interfaces allow you to create code which specifies the methods a class must implement, 
 * without having to define how these methods are handled.
 * 
 * So it's the blueprint for a class on what functions should be created.
 * 
 * In the class name we add an "I" so we know it's an interface
 * 
 * @author GForti
 *  
 */
interface IDAO {
    
    public function idExisit($id);
    
    public function getById($id);

    public function delete($id); 

    public function save(IModel $model);
        
    public function getAllRows();   
}