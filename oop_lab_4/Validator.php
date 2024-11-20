<?php

class Validator
{
    private $errors = [];
    private $data = [];
    private $messages = [
        'required' => 'The :attribute is required',
        'email' => 'The :attribute is invalid',
        'phone' => 'The :attribute is invalid',
        'min' => 'The :attribute must be at least :value characters',
        'max' => 'The :attribute must not exceed :value characters',
    ];

    public function __construct()
    {
        $this->data = $this->sanitizeInput();
    }

    /**
     * Sanitize input data
     */
    private function sanitizeInput()
    {
        $sanitized = [];
        foreach ($_POST as $key => $value) {
            $sanitized[$key] = trim(htmlspecialchars($value));
        }
        return $sanitized;
    }

    /**
     * Get input value
     */
    public function input(string $key)
    {
        return $this->data[$key] ?? null;
    }

    /**
     * Set custom error messages
     */
    public function setMessages(array $messages): void
    {
        $this->messages = array_merge($this->messages, $messages);
    }

    /**
     * Validate data
     */
    public function validate(array $data)
    {

        foreach ($data as $field => $ruleSet) {

            $rules = explode('|', $ruleSet);

            // First check required rule
            if (in_array('required', $rules)) {
                $this->required($field);
                // If required fails, skip other validations for this field
                if (isset($this->errors[$field])) {
                    continue;
                }
            }

            foreach ($rules as $rule) {
                // Check if the rule has parameters (like min:3)
                if (strpos($rule, ':') !== false) {
                    list($method, $param) = explode(':', $rule);
                } else {
                    $method = $rule;
                    $param = null;
                }

                // Check if the method exists and call it
                if (method_exists($this, $method)) {
                    if ($param !== null) {
                        $this->{$method}($field, $param);
                    } else {
                        $this->{$method}($field);
                    }
                }
            }
        }

        return $this->passes();
    }

    /**
     * Validation rules
     */
    private function required($field)
    {
        if (empty($this->data[$field])) {
            $this->addError($field, $this->messages['required']);
        }
    }

    private function email($field)
    {
        if (!filter_var($this->data[$field], FILTER_VALIDATE_EMAIL)) {
            $this->addError($field, $this->messages['email']);
        }
    }
    private function phone($field)
    {
        if (!preg_match('/^[0-9]{11}$/', $this->data[$field])) {
            $this->addError($field, $this->messages['phone']);
        }
    }

    private function min($field, $value)
    {
        if (strlen($this->data[$field]) < $value) {
            $this->addError($field, $this->messages['min'], ['value' => $value]);
        }
    }

    private function max($field, $value)
    {
        if (strlen($this->data[$field]) > $value) {
            $this->addError($field, $this->messages['max'], ['value' => $value]);
        }
    }

    /**
     * Add validation error
     */
    private function addError(string $field, string $message, array $parameters = []): void
    {
        $message = str_replace(':attribute', $field, $message);
        foreach ($parameters as $key => $value) {
            $message = str_replace(":{$key}", $value, $message);
        }
        $this->errors[$field] = $message;
    }

    public function passes(): bool
    {
        return empty($this->errors);
    }

    public function fails(): bool
    {
        return !$this->passes();
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
