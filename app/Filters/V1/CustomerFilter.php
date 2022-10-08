<?php 

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class CustomerFilter extends ApiFilter{

    //The very first rule of handeling user request is to not trust user inputs

    protected $safeParams = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postalCode' => ['eq', 'gt', 'lt'] //allowed fields with the operators that mek sens with them
    ];

    protected $columnMap = [ //something to transform our field from the querystring in the database field
        'postalCode' => 'postal_code'    
    ];

    protected $operatorsMap = [ //someway to transform operators from the querystring in in operators that Eloquent is going to need
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=' 
    ];
}

?>