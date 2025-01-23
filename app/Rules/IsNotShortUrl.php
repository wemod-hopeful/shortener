<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class IsNotShortUrl implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (Str::startsWith($value, [
            'http://'.request()->getHost().'/go/',
            'https://'.request()->getHost().'/go/',
        ])) {
            $fail('The :attribute cannot already be a short URL.');
        }
    }
}
