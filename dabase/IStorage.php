<?php

interface IStorage
{
    public function getAll();

    public function getOne($id);

    public function store(Journ $blog);

    public function remove($id);

    public function edit($id, $title, $body);
}