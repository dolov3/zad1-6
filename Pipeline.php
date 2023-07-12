<?php   
class Pipeline
{
    public static function make(...$functions)
    {
        return function ($arg) use ($functions) {
            $result = $arg;

            foreach ($functions as $function) {
                $result = $function($result);
            }
            return $result;
        };
    }
}

// Przykład użycia
$function1 = function ($var) {
    return $var * 3;
};

$function2 = function ($var) {
    return $var + 1;
};

$function3 = function ($var) {
    return $var / 2;
};

$pipeline = Pipeline::make($function1, $function2, $function3);

$result = $pipeline(3);

echo $result; // Output: 5
?>