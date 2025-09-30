<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\Admin\Menu;

class ValidarCampoUrl implements ValidationRule
{
    public function passes($attribute, $value)
    {
        if($value != '#'){
            $menu = Menu::where($attribute, $value)->where('id', '!=', request()->route('id'))->get();
            return $menu->isEmpty();
        }
        return true;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->passes($attribute, $value)) {
            $fail('Esta url ya esta asignada');
        }
    }
}
