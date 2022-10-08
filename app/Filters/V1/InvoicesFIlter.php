<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class InvoicesFilter extends ApiFilter{
    //The very first rule of handeling user request is to not trust user inputs

    protected $safeParams = [
        'customerId' => ['eq'],
        'amount' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'status' => ['eq', 'ne'],
        'billedDate' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'paidDate' => ['eq', 'lt', 'gt', 'lte', 'gte']
        //allowed fields with the operators that make sens with them
    ];

    protected $columnMap = [ //something to transform our field from the querystring in the database field
        'customerId' => 'customer_id',    
        'billedDate' => 'billed_date',    
        'paidDate' => 'paid_date'    
    ];

    protected $operatorsMap = [ //someway to transform operators from the querystring in in operators that Eloquent is going to need
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!=' 
    ];
}

?>