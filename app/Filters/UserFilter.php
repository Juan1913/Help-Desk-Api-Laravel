<?php

namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class UserFilter extends ApiFilter{

    protected $safeParams = [
        'name' => ['eq'],
        'lastname' => ['eq'],
        'email' => ['eq'],

    ];
    protected $operatorMap = [
    
        'eq' => '=', 
        'lt' => '<', 
        'lte' => '<=',
        'gt' => '>', 
        'gte' => '>=', 
    ];
    }