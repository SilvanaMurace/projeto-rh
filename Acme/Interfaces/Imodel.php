<?php

namespace Acme\Interfaces;

interface Imodel{

	public function create($attributes);

	public function read($ord);

	public function update($id,$attributes);

	public function delete($name,$value);

	public function findBy($name,$value);

	public function findByTwo($name1,$value1,$name2,$value2);
}
?>