<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class EnabledDate implements InvokableRule
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
        if (strtotime($value) > strtotime("+ 3 months")) {
            $fail('The :attribute was selected after the maximum date for reservation allowed (3 months).');
        }
    }
}
