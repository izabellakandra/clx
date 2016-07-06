<?php

function validate_required($value)
{
    return !empty($value);
}

function validate_str_lt($value, $comp)
{
    return strlen($value) < $comp;
}

function validate_str_lte($value, $comp)
{
    return strlen($value) <= $comp;
}

function validate_str_gt($value, $comp)
{
    return strlen($value) > $comp;
}

function validate_str_gte($value, $comp)
{
    return strlen($value) >= $comp;
}


