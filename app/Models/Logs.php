<?php


namespace App\Models;


class Logs extends BaseModel
{
    const REQUEST = 'request';
    const ACTION = 'action';
    const MESSAGE = 'message';
    const LINE = 'line';
    const FILE = 'file';

    protected $table = 'logs';
}
