<?php

declare(strict_types=1);

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace PhpCsFixer\Tests\Fixer\Basic;

use PhpCsFixer\Tests\Test\AbstractFixerTestCase;

/**
 * @internal
 *
 * @covers \PhpCsFixer\Fixer\Basic\CurlyBracesPositionFixer
 */
final class CurlyBracesPositionFixerTest extends AbstractFixerTestCase
{
    /**
     * @param array<string, mixed> $configuration
     *
     * @dataProvider provideFixCases
     */
    public function testFix(string $expected, ?string $input = null, array $configuration = []): void
    {
        $this->fixer->configure($configuration);

        $this->doTest($expected, $input);
    }

    public static function provideFixCases(): iterable
    {
        yield 'if (default)' => [
            '<?php
                if ($foo) {
                    foo();
                }',
            '<?php
                if ($foo)
                {
                    foo();
                }',
        ];

        yield 'if (next line)' => [
            '<?php
                if ($foo)
                {
                    foo();
                }',
            '<?php
                if ($foo) {
                    foo();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'if (same line without extra space)' => [
            '<?php
                if ($foo){
                    foo();
                }',
            '<?php
                if ($foo) {
                    foo();
                }',
            ['control_structures_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'else (default)' => [
            '<?php
                if ($foo) {
                    foo();
                }
                else {
                    bar();
                }',
            '<?php
                if ($foo)
                {
                    foo();
                }
                else
                {
                    bar();
                }',
        ];

        yield 'else (next line)' => [
            '<?php
                if ($foo)
                {
                    foo();
                }
                else
                {
                    bar();
                }',
            '<?php
                if ($foo) {
                    foo();
                }
                else {
                    bar();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'else (same line without extra space)' => [
            '<?php
                if ($foo){
                    foo();
                }
                else{
                    bar();
                }',
            '<?php
                if ($foo) {
                    foo();
                }
                else {
                    bar();
                }',
            ['control_structures_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'elseif (default)' => [
            '<?php
                if ($foo) {
                    foo();
                }
                elseif ($bar) {
                    bar();
                }',
            '<?php
                if ($foo)
                {
                    foo();
                }
                elseif ($bar)
                {
                    bar();
                }',
        ];

        yield 'elseif (next line)' => [
            '<?php
                if ($foo)
                {
                    foo();
                }
                elseif ($bar)
                {
                    bar();
                }',
            '<?php
                if ($foo) {
                    foo();
                }
                elseif ($bar) {
                    bar();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'elseif (same line without extra space)' => [
            '<?php
                if ($foo){
                    foo();
                }
                elseif ($bar){
                    bar();
                }',
            '<?php
                if ($foo) {
                    foo();
                }
                elseif ($bar) {
                    bar();
                }',
            ['control_structures_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'else if (default)' => [
            '<?php
                if ($foo) {
                    foo();
                }
                else if ($bar) {
                    bar();
                }',
            '<?php
                if ($foo)
                {
                    foo();
                }
                else if ($bar)
                {
                    bar();
                }',
        ];

        yield 'else if (next line)' => [
            '<?php
                if ($foo)
                {
                    foo();
                }
                else if ($bar)
                {
                    bar();
                }',
            '<?php
                if ($foo) {
                    foo();
                }
                else if ($bar) {
                    bar();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'else if (same line without extra space)' => [
            '<?php
                if ($foo){
                    foo();
                }
                else if ($bar){
                    bar();
                }',
            '<?php
                if ($foo) {
                    foo();
                }
                else if ($bar) {
                    bar();
                }',
            ['control_structures_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'for (default)' => [
            '<?php
                for (;;) {
                    foo();
                }',
            '<?php
                for (;;)
                {
                    foo();
                }',
        ];

        yield 'for (next line)' => [
            '<?php
                for (;;)
                {
                    foo();
                }',
            '<?php
                for (;;) {
                    foo();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'for (same line without extra space)' => [
            '<?php
                for (;;){
                    foo();
                }',
            '<?php
                for (;;) {
                    foo();
                }',
            ['control_structures_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'foreach (default)' => [
            '<?php
                foreach ($foo as $bar) {
                    foo();
                }',
            '<?php
                foreach ($foo as $bar)
                {
                    foo();
                }',
        ];

        yield 'foreach (next line)' => [
            '<?php
                foreach ($foo as $bar)
                {
                    foo();
                }',
            '<?php
                foreach ($foo as $bar) {
                    foo();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'foreach (same line without extra space)' => [
            '<?php
                foreach ($foo as $bar){
                    foo();
                }',
            '<?php
                foreach ($foo as $bar) {
                    foo();
                }',
            ['control_structures_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'while (default)' => [
            '<?php
                while ($foo) {
                    foo();
                }',
            '<?php
                while ($foo)
                {
                    foo();
                }',
        ];

        yield 'while (next line)' => [
            '<?php
                while ($foo)
                {
                    foo();
                }',
            '<?php
                while ($foo) {
                    foo();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'while (same line without extra space)' => [
            '<?php
                while ($foo){
                    foo();
                }',
            '<?php
                while ($foo) {
                    foo();
                }',
            ['control_structures_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'do while (default)' => [
            '<?php
                do {
                    foo();
                } while ($foo);',
            '<?php
                do
                {
                    foo();
                } while ($foo);',
        ];

        yield 'do while (next line)' => [
            '<?php
                do
                {
                    foo();
                } while ($foo);',
            '<?php
                do {
                    foo();
                } while ($foo);',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'do while (same line without extra space)' => [
            '<?php
                do{
                    foo();
                } while ($foo);',
            '<?php
                do {
                    foo();
                } while ($foo);',
            ['control_structures_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'switch (default)' => [
            '<?php
                switch ($foo) {
                    case 1:
                        foo();
                }',
            '<?php
                switch ($foo)
                {
                    case 1:
                        foo();
                }',
        ];

        yield 'switch (next line)' => [
            '<?php
                switch ($foo)
                {
                    case 1:
                        foo();
                }',
            '<?php
                switch ($foo) {
                    case 1:
                        foo();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'switch (same line without extra space)' => [
            '<?php
                switch ($foo){
                    case 1:
                        foo();
                }',
            '<?php
                switch ($foo) {
                    case 1:
                        foo();
                }',
            ['control_structures_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'try catch finally (default)' => [
            '<?php
                switch ($foo) {
                    case 1:
                        foo();
                }',
            '<?php
                switch ($foo)
                {
                    case 1:
                        foo();
                }',
        ];

        yield 'try catch finally (next line)' => [
            '<?php
                switch ($foo)
                {
                    case 1:
                        foo();
                }',
            '<?php
                switch ($foo) {
                    case 1:
                        foo();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'try catch finally (same line without extra space)' => [
            '<?php
                switch ($foo){
                    case 1:
                        foo();
                }',
            '<?php
                switch ($foo) {
                    case 1:
                        foo();
                }',
            ['control_structures_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'class (default)' => [
            '<?php
                class Foo
                {
                }',
            '<?php
                class Foo {
                }',
        ];

        yield 'class (same line)' => [
            '<?php
                class Foo {
                }',
            '<?php
                class Foo
                {
                }',
            ['classes_opening_brace' => 'same_line'],
        ];

        yield 'class (same line without extra space)' => [
            '<?php
                class Foo{
                }',
            '<?php
                class Foo
                {
                }',
            ['classes_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'function (default)' => [
            '<?php
                function foo()
                {
                }',
            '<?php
                function foo() {
                }',
        ];

        yield 'function (same line)' => [
            '<?php
                function foo() {
                }',
            '<?php
                function foo()
                {
                }',
            ['functions_opening_brace' => 'same_line'],
        ];

        yield 'function (same line without extra space)' => [
            '<?php
                function foo(){
                }',
            '<?php
                function foo()
                {
                }',
            ['functions_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'anonymous function (default)' => [
            '<?php
                $foo = function () {
                };',
            '<?php
                $foo = function ()
                {
                };',
        ];

        yield 'anonymous function (next line)' => [
            '<?php
                $foo = function ()
                {
                };',
            '<?php
                $foo = function () {
                };',
            ['anonymous_functions_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'anonymous function (same line without extra space)' => [
            '<?php
                $foo = function (){
                };',
            '<?php
                $foo = function () {
                };',
            ['anonymous_functions_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'with blank lines inside braces' => [
            '<?php
                class Foo
                {

                    public function foo()
                    {

                        if (true) {

                            echo "foo";

                        }

                    }

                }',
            '<?php
                class Foo {

                    public function foo() {

                        if (true)
                        {

                            echo "foo";

                        }

                    }

                }',
        ];

        yield 'with comment after opening brace (default)' => [
            '<?php
                function foo() /* foo */ // foo
                {
                }',
            '<?php
                function foo() /* foo */ { // foo
                }',
        ];

        yield 'with comment after opening brace (same line)' => [
            '<?php
                function foo() { // foo
                /* foo */
                }',
            '<?php
                function foo() // foo
                { /* foo */
                }',
            ['functions_opening_brace' => 'same_line'],
        ];

        yield 'with comment after opening brace (same line without extra space)' => [
            '<?php
                function foo(){ // foo
                /* foo */
                }',
            '<?php
                function foo() // foo
                { /* foo */
                }',
            ['functions_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'next line with multiline signature' => [
            '<?php
                if (
                    $foo
                ) {
                    foo();
                }',
            '<?php
                if (
                    $foo
                )
                {
                    foo();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'next line with newline before closing parenthesis' => [
            '<?php
                if ($foo
                ) {
                    foo();
                }',
            '<?php
                if ($foo
                )
                {
                    foo();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'same line without extra space with newline before closing parenthesis' => [
            '<?php
                if ($foo
                ){
                    foo();
                }',
            '<?php
                if ($foo
                )
                {
                    foo();
                }',
            ['control_structures_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'next line with newline in signature but not before closing parenthesis' => [
            '<?php
                if (
                    $foo)
                {
                    foo();
                }',
            '<?php
                if (
                    $foo) {
                    foo();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'same line without extra space with newline in signature but not before closing parenthesis' => [
            '<?php
                if (
                    $foo){
                    foo();
                }',
            '<?php
                if (
                    $foo) {
                    foo();
                }',
            ['control_structures_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'anonymous class (same line)' => [
            '<?php
                $foo = new class() {
                };',
            '<?php
                $foo = new class()
                {
                };',
        ];

        yield 'anonymous class (next line)' => [
            '<?php
                $foo = new class()
                {
                };',
            '<?php
                $foo = new class() {
                };',
            ['anonymous_classes_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'anonymous class (same line without extra space)' => [
            '<?php
                $foo = new class(){
                };',
            '<?php
                $foo = new class() {
                };',
            ['anonymous_classes_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'next line with multiline signature and return type' => [
            '<?php
                function foo(
                    $foo
                ): int {
                    foo();
                }',
            '<?php
                function foo(
                    $foo
                ): int
                {
                    foo();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'same line without extra space with multiline signature and return type' => [
            '<?php
                function foo(
                    $foo
                ): int{
                    foo();
                }',
            '<?php
                function foo(
                    $foo
                ): int
                {
                    foo();
                }',
            ['functions_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'next line with multiline signature and return type (nullable)' => [
            '<?php
                function foo(
                    $foo
                ): ?int {
                    foo();
                }',
            '<?php
                function foo(
                    $foo
                ): ?int
                {
                    foo();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'same line without extra space with multiline signature and return type (nullable)' => [
            '<?php
                function foo(
                    $foo
                ): ?int{
                    foo();
                }',
            '<?php
                function foo(
                    $foo
                ): ?int
                {
                    foo();
                }',
            ['functions_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'next line with multiline signature and return type (array)' => [
            '<?php
                function foo(
                    $foo
                ): array {
                    foo();
                }',
            '<?php
                function foo(
                    $foo
                ): array
                {
                    foo();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'same line without extra space with multiline signature and return type (array)' => [
            '<?php
                function foo(
                    $foo
                ): array{
                    foo();
                }',
            '<?php
                function foo(
                    $foo
                ): array
                {
                    foo();
                }',
            ['functions_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'next line with multiline signature and return type (class name)' => [
            '<?php
                function foo(
                    $foo
                ): \Foo\Bar {
                    foo();
                }',
            '<?php
                function foo(
                    $foo
                ): \Foo\Bar
                {
                    foo();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'same line without extra space with with multiline signature and return type (class name)' => [
            '<?php
                function foo(
                    $foo
                ): \Foo\Bar{
                    foo();
                }',
            '<?php
                function foo(
                    $foo
                ): \Foo\Bar
                {
                    foo();
                }',
            ['functions_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'next line with newline before closing parenthesis and return type' => [
            '<?php
                function foo($foo
                ): int {
                    foo();
                }',
            '<?php
                function foo($foo
                ): int
                {
                    foo();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'same line without extra space with newline before closing parenthesis and return type' => [
            '<?php
                function foo($foo
                ): int{
                    foo();
                }',
            '<?php
                function foo($foo
                ): int
                {
                    foo();
                }',
            ['functions_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'next line with newline before closing parenthesis and callable type' => [
            '<?php
                function foo($foo
                ): callable {
                    return function (): void {};
                }',
            '<?php
                function foo($foo
                ): callable
                {
                    return function (): void {};
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'same line without extra space with newline before closing parenthesis and callable type' => [
            '<?php
                function foo($foo
                ): callable{
                    return function (): void {};
                }',
            '<?php
                function foo($foo
                ): callable
                {
                    return function (): void {};
                }',
            ['functions_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'next line with newline in signature but not before closing parenthesis and return type' => [
            '<?php
                function foo(
                    $foo): int
                {
                    foo();
                }',
            '<?php
                function foo(
                    $foo): int {
                    foo();
                }',
            ['control_structures_opening_brace' => 'next_line_unless_newline_at_signature_end'],
        ];

        yield 'same line without extra space with newline in signature but not before closing parenthesis and return type' => [
            '<?php
                function foo(
                    $foo): int{
                    foo();
                }',
            '<?php
                function foo(
                    $foo): int {
                    foo();
                }',
            ['functions_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'multiple elseifs' => [
            '<?php if ($foo) {
                } elseif ($foo) {
                } elseif ($foo) {
                } elseif ($foo) {
                } elseif ($foo) {
                } elseif ($foo) {
                } elseif ($foo) {
                } elseif ($foo) {
                } elseif ($foo) {
                }',
            '<?php if ($foo){
                } elseif ($foo){
                } elseif ($foo){
                } elseif ($foo){
                } elseif ($foo){
                } elseif ($foo){
                } elseif ($foo){
                } elseif ($foo){
                } elseif ($foo){
                }',
        ];

        yield 'multiple elseifs (same line without extra space)' => [
            '<?php if ($foo){
                } elseif ($foo){
                } elseif ($foo){
                } elseif ($foo){
                } elseif ($foo){
                } elseif ($foo){
                } elseif ($foo){
                } elseif ($foo){
                } elseif ($foo){
                }',
            '<?php if ($foo) {
                } elseif ($foo) {
                } elseif ($foo) {
                } elseif ($foo) {
                } elseif ($foo) {
                } elseif ($foo) {
                } elseif ($foo) {
                } elseif ($foo) {
                } elseif ($foo) {
                }',
            ['control_structures_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'open brace preceded by comment and whitespace' => [
            '<?php
                if (true) { /* foo */
                    foo();
                }',
            '<?php
                if (true) /* foo */ {
                    foo();
                }',
        ];

        yield 'open brace preceded by comment and whitespace (without extra space)' => [
            '<?php
                if (true){ /* foo */
                    foo();
                }',
            '<?php
                if (true) /* foo */ {
                    foo();
                }',
            ['control_structures_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'open brace surrounded by comment and whitespace' => [
            '<?php
                if (true) { /* foo */ /* bar */
                    foo();
                }',
            '<?php
                if (true) /* foo */ { /* bar */
                    foo();
                }',
        ];

        yield 'open brace surrounded by comment and whitespace (without extra space)' => [
            '<?php
                if (true){ /* foo */ /* bar */
                    foo();
                }',
            '<?php
                if (true) /* foo */ { /* bar */
                    foo();
                }',
            ['control_structures_opening_brace' => 'same_line_without_extra_space'],
        ];

        yield 'open brace not preceded by space and followed by a comment' => [
            '<?php class test
{
    public function example()// example
    {
    }
}
',
            '<?php class test
{
    public function example(){// example
    }
}
',
        ];

        yield 'open brace not preceded by space and followed by a space and comment' => [
            '<?php class test
{
    public function example() // example
    {
    }
}
',
            '<?php class test
{
    public function example(){ // example
    }
}
',
        ];
    }

    /**
     * @dataProvider provideFix80Cases
     *
     * @requires PHP 8.0
     */
    public function testFix80(string $expected, ?string $input = null): void
    {
        $this->doTest($expected, $input);
    }

    public static function provideFix80Cases(): iterable
    {
        yield 'function (multiline + union return)' => [
            '<?php
                function sum(
                    int|float $first,
                    int|float $second,
                ): int|float {
                }',
            '<?php
                function sum(
                    int|float $first,
                    int|float $second,
                ): int|float
                {
                }',
        ];

        yield 'function (multiline + union return with whitespace)' => [
            '<?php
                function sum(
                    int|float $first,
                    int|float $second,
                ): int | float {
                }',
            '<?php
                function sum(
                    int|float $first,
                    int|float $second,
                ): int | float
                {
                }',
        ];

        yield 'method with static return type' => [
            '<?php
                class Foo
                {
                    function sum(
                        $foo
                    ): static {
                    }
                }',
            '<?php
                class Foo
                {
                    function sum(
                        $foo
                    ): static
                    {
                    }
                }',
        ];
    }

    /**
     * @dataProvider provideFix81Cases
     *
     * @requires PHP 8.1
     */
    public function testFix81(string $expected, ?string $input = null): void
    {
        $this->doTest($expected, $input);
    }

    public static function provideFix81Cases(): iterable
    {
        yield 'function (multiline + intersection return)' => [
            '<?php
                function foo(
                    mixed $bar,
                    mixed $baz,
                ): Foo&Bar {
                }',
        ];
    }

    /**
     * @dataProvider provideFix82Cases
     *
     * @requires PHP 8.2
     */
    public function testFix82(string $expected, ?string $input = null): void
    {
        $this->doTest($expected, $input);
    }

    public static function provideFix82Cases(): iterable
    {
        yield 'function (multiline + DNF return)' => [
            '<?php
                function foo(
                    mixed $bar,
                    mixed $baz,
                ): (Foo&Bar)|int|null {
                }',
        ];
    }
}
