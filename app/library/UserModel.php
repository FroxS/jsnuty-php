<?php

namespace jsnuty\app\library;

use jsnuty\app\database\DbModel;

abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}