<?php

use PhpCsFixer\Fixer\FunctionNotation\NativeFunctionInvocationFixer;

$finder = PhpCsFixer\Finder::create()
    ->in('src')
    ->exclude(['var', 'migrations']);

$config = new PhpCsFixer\Config();

return $config->setRules([
    '@PhpCsFixer' => true,
    '@Symfony' => true,
    'array_syntax' => ['syntax' => 'short'],
    'native_function_invocation' => [
        'include' => [
            NativeFunctionInvocationFixer::SET_COMPILER_OPTIMIZED,
            NativeFunctionInvocationFixer::SET_INTERNAL,
        ],
        'scope' => 'all'
    ],
    'return_assignment' => false,
    'declare_strict_types' => true
])
    ->setFinder($finder);