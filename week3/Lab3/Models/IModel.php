<?php

namespace bgerlach\week2;

interface IModel {

    public function reset();
   
    public function map(array $values);
}
