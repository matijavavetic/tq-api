<?

function repeat(array $array): string {
    $newArray = [];
    
    for ($i = 0; $i < 3; $i++) {
        $newArray = array_merge($newArray, $array);
    }

    return print_r($newArray, false);
}