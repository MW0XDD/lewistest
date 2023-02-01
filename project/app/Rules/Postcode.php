<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class Postcode implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if(!preg_match(' /^[A-Z]{1,2}[0-9]{2,3}[A-Z]{2}|[A-Z]{1,2}[0-9]{1}[A-Z]{1}[0-9]{1}[A-Z]{2}|GIR0[A-Z]{2}$/i', $value)) {
            $fail('The :attribute is invalid.');
        }
    }
}
