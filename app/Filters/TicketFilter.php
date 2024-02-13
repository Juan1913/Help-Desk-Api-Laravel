<?php

namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class TicketFilter extends ApiFilter{

    protected $safeParams = [
        'user' => ['eq'],
        'category_name' => ['eq'],
        'email' => ['eq'],
        'status' => ['eq'],
        'priority' => ['eq'],
        'month' => ['eq', 'gt', 'lt',],
        'year' => ['eq', 'gt', 'lt',],


       

    ];
    protected $operatorMap = [
    
        'eq' => '=', 
        'lt' => '<', 
        'lte' => '<=',
        'gt' => '>', 
        'gte' => '>=', 
    ];
    }

    