<?php

namespace baseControler;

abstract class BaseController
{
    abstract function create($model);
    abstract function read();
    abstract function update($codigo, $model);
    abstract function delete($codigo);
    abstract function readRow($codigo);
}

abstract class ActividadBaseController
{
    abstract function create($model);
    abstract function read($codigo);
    abstract function update($id, $model);
    abstract function delete($id);
    abstract function readRow($id);
}