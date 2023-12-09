<?php

namespace App\Traits;

trait CaseConversion {

    protected function snakeToCamel($string) {
        return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $string))));
    }

    protected function camelToSnake($input)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
    }

    protected function kebabToCamel($input)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $input)));
    }

    protected function camelToKebab($input)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $input));
    }

    protected function snakeToKebab($input)
    {
        return str_replace('_', '-', $input);
    }

    protected function kebabToSnake($input)
    {
        return str_replace('-', '_', $input);
    }

    protected function camelToPascal($input)
    {
        return ucfirst($input);
    }

    protected function pascalToCamel($input)
    {
        return lcfirst($input);
    }

    protected function snakeToPascal($input)
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $input)));
    }

    protected function pascalToSnake($input)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
    }

    protected function kebabToPascal($input)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $input)));
    }

    protected function pascalToKebab($input)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $input));
    }

    protected function snakeToSentence($input)
    {
        return ucfirst(str_replace('_', ' ', $input));
    }

    protected function kebabToSentence($input)
    {
        return ucfirst(str_replace('-', ' ', $input));
    }

    protected function camelToSentence($input)
    {
        return ucfirst(preg_replace('/(?<!^)[A-Z]/', ' $0', $input));
    }

    protected function pascalToSentence($input)
    {
        return ucfirst(preg_replace('/(?<!^)[A-Z]/', ' $0', $input));
    }

    protected function sentenceToSnake($input)
    {
        return strtolower(str_replace(' ', '_', $input));
    }

    protected function sentenceToKebab($input)
    {
        return strtolower(str_replace(' ', '-', $input));
    }

    protected function sentenceToCamel($input)
    {
        return lcfirst(str_replace(' ', '', ucwords($input)));
    }

    protected function sentenceToPascal($input)
    {
        return str_replace(' ', '', ucwords($input));
    }
}