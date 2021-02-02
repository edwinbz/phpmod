<?php
class CrudController
{
    public function createProducto(){
        $model = new CrudModel();
        $model->mar = _val('mar');
        $model->nom = _val('nom');
        $model->sto = _val('sto');
        $model->pre = _val('pre');
        $create = $model->createProducto();
        return ($create > 0);
    }

    public function getProductos()
    {
        $model = new CrudModel();
        return $model->getProductos();
    }

    public function getProducto($id)
    {
        $model = new CrudModel();
        $model->id = $id;
        return _getFirst($model->getProducto());
    }

    public function updateProducto(){
        $model = new CrudModel();
        $model->id = _val('id');
        $model->mar = _val('mar');
        $model->nom = _val('nom');
        $model->sto = _val('sto');
        $model->pre = _val('pre');
        $create = $model->updateProducto();
        return ($create > 0);
    }

    public function deleteProducto($id)
    {
        $model = new CrudModel();
        $model->id = $id;
        $delete = $model->deleteProducto();
        return ($delete > 0);
    }
}
