<?

function next_binary_number(array $input): string
{
    $power = count($input) - 1;
    $decimalNumber = 0;
    $base = 2;
    
    for ($i = 0; $i < count($input); $i++) {
        $currentResult = $input[$i] * $base ** $power;
        $power--;

        $decimalNumber = $decimalNumber + $currentResult;
    }

    $nextDecimalNumber = ++$decimalNumber;
    $quotient = $nextDecimalNumber;
    $binaryNumber = '';
    
    while (true) {
        $remainder = $quotient % 2;
        $quotient = ($quotient - $quotient % 2) / 2;
        $binaryNumber = $remainder . "" . $binaryNumber;
        
        if ($quotient === 0) {
            break;
        }
    }
    
    return print($binaryNumber);
}
