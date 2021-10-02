<?php

namespace app\model;

class Field
{
    public string $name;
    public string $type;
    public string $data;
    public string $label;
    public array $rules;

    public function __construct(string $name, string $type, string $data = "", string $label, array $rules)
    {
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
        $this->data = $data;
        $this->rules = $rules;
    }

    public function validate(): array
    {
        // possible rules
        // required
        // email
        // min [number]
        // max [number]
        $errors = [];

        foreach ($this->rules as $rule) {
            if (is_string($rule)) {
                // required or email
                if ($rule === "required" && strlen($this->data) === 0) {
                    $errors[] = "$this->label is required";
                } else if ($rule === "email" && !filter_var($this->data, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "This is not a valid email address";
                }
            } else if (is_array($rule)) {
                // min or max
                if ($rule[0] === "min" && strlen($this->data) < $rule[1]) {
                    $errors[] = "$this->label too short";
                } else if ($rule[0] === "max" && strlen($this->data) > $rule[1]) {
                    $errors[] = "$this->label too big";
                }
            }
        }

        return $errors;
    }
}
