<?php


/**
 * @param $input: number need validate
 * @param $condition: ["type" => "isInt, bigger, options", "values" => [if neccessatry]]
 * @return bool
 */
function validateInput($input, $condition)
{
    switch ($condition['type']){
        case 'isInt':return  (is_numeric($input) && is_int($input + 0)) ? true : false ; break;
        case 'bigger': return validateInput($input, ["type"=>"isInt"]) && $input > $condition['values'][0] ? true : false ; break;
        //case 'options': return $this->validateInput($input, ["type"=>"isInt"]) && ($input == $condition['value'][0] || $input == $condition['value'][1]) ? true : false; break;
        case 'options':
            if(!validateInput($input, ["type"=>"isInt"]))
            {
                return false; break;
            }
            else
            {
                foreach( $condition['values'] as $value)
                {
                    if($input == $value)
                    {
                        return true; break;
                    }
                }
                return false; break;
            }
    }

}