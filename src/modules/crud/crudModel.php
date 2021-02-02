<?php
class CrudModel
{
    public $id;
    public $mar;
    public $nom;
    public $sto;
    public $pre;

    public function createProducto()
    {
        $sql = "INSERT INTO `productos`(
            `Pro_id`,
            `Pro_marca`,
            `Pro_nombre`,
            `Pro_stock`,
            `Pro_precio`
        )
        VALUES(
            NULL,
            ?,
            ?,
            ?,
            ?
        );";
        $par = [
            $this->mar,
            $this->nom,
            $this->sto,
            $this->pre,
        ];
        return _query($sql, $par, RES_ROW_COUNT, null, false);
    }

    public function getProductos()
    {
        $sql = "select * from productos order by Pro_id";
        return _query($sql, [], RES_FETCH_ASSOC, null, false);
    }

    public function getProducto()
    {
        $sql = "select * from productos where Pro_id = ?";
        return _query($sql, [$this->id], RES_FETCH_ASSOC, null, false);
    }

    public function updateProducto()
    {
        $sql = "UPDATE
            `productos`
        SET
            `Pro_marca` = ?,
            `Pro_nombre` = ?,
            `Pro_stock` = ?,
            `Pro_precio` = ?
        WHERE
            `productos`.`Pro_id` = ?";
        $par = [
            $this->mar,
            $this->nom,
            $this->sto,
            $this->pre,
            $this->id
        ];
        return _query($sql, $par, RES_ROW_COUNT, null, false);
    }

    public function deleteProducto()
    {
        $sql = "delete from productos where Pro_id = ?";
        return _query($sql, [$this->id], RES_ROW_COUNT, null, false);
    }

}
