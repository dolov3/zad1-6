<?php

class TextInput
{
    protected $value = '';

    public function add($text)
    {
        $this->value .= $text;
    }

    public function getValue()
    {
        return $this->value;
    }
}

class NumericInput extends TextInput
{
    public function add($text)
    {
        // Sprawdza czy podany tekst składa się tylko z cyfr
        if (ctype_digit($text)) {
            $this->value .= $text;
        }
    }
}

// Przykład użycia
$textInput = new TextInput();
$textInput->add('Hello');
$textInput->add(' World ');
echo $textInput->getValue(); // Output: Hello World

$numericInput = new NumericInput();
$numericInput->add('345');
$numericInput->add('Hello');
$numericInput->add('567');
echo $numericInput->getValue(); // Output: 345567

?>