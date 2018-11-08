<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class OrderRule implements Rule
{
    /**
     * Create a new rule instance.
     * @param array $orders
     */
    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    /**
     * Contain array of items's orders into user's items
     *
     * @var array $orders
     */
    private $orders;

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return count(array_keys($this->orders, $value)) === 1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Repeat order :attribute.';
    }
}
