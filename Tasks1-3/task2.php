<?

function reformat(string $input): string {
    $vowels = ['a', 'e', 'i', 'o', 'u'];

    $formattedOutput = ucfirst(strtolower(str_ireplace($vowels, '', $input)));

    return print($formattedOutput);
}