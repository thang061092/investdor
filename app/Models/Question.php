<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table = 'question';
    protected $primaryKey = 'id';

    const ID = 'id';
    const TYPE = 'type';
    const STATUS = 'status';
    const NAME = 'name';
    const EMAIL = 'email';
    const QUESTION = 'question';
    const ANSWER_QUESTION = 'answer_question';
    
    const NO_ANSWER = 1;
    const ANSWER = 2;
    protected $guarded = [];  
}
