<?php

use Mrwang211\PinyinPro\PinyinProBuilder;

describe('PinyinPro', function () {
    describe('convert', function () {
        test('default', function () {
            $pinyinPro = new PinyinProBuilder()->build();
            $result = $pinyinPro->convert('pin1 yin1');
            expect($result)->toBe('pīn yīn');
        });

        test('separator', function () {
            $pinyinPro = new PinyinProBuilder()->withSeparator('-')->build();
            $result = $pinyinPro->convert('pin1-yin1');
            expect($result)->toBe('pīn-yīn');
        });

        test('numToSymbol', function () {
            $pinyinPro = new PinyinProBuilder()->withFormat('numToSymbol')->build();
            $result = $pinyinPro->convert('pin1 yin1');
            expect($result)->toBe('pīn yīn');
        });

        test('symbolToNum', function () {
            $pinyinPro = new PinyinProBuilder()->withFormat('symbolToNum')->build();
            $result = $pinyinPro->convert('pīn yīn');
            expect($result)->toBe('pin1 yin1');
        });

        test('toneNone', function () {
            $pinyinPro = new PinyinProBuilder()->withFormat('toneNone')->build();
            $result = $pinyinPro->convert('pīn yīn');
            expect($result)->toBe('pin yin');
        });

        test('array', function () {
            $pinyinPro = new PinyinProBuilder()->build();
            $result = $pinyinPro->convert(['pin1', 'yin1']);
            expect($result)->toMatchArray(['pīn', 'yīn']);
        });

        test('array others', function () {
            $pinyinPro = new PinyinProBuilder()->build();
            $result = $pinyinPro->convert(['pin1', 'a', 'yin1']);
            expect($result)->toMatchArray(['pīn', 'a', 'yīn']);
        });

        test('string others', function () {
            $pinyinPro = new PinyinProBuilder()->build();
            $result = $pinyinPro->convert('pin1 a   yin1');
            expect($result)->toBe('pīn a   yīn');
        });

        test('v', function () {
            $pinyinPro = new PinyinProBuilder()->build();
            $result = $pinyinPro->convert('lv4 se4');
            expect($result)->toBe('lǜ sè');
        });

        test('format noen', function () {
            $pinyinPro = new PinyinProBuilder()->withFormat('none')->build();
            $result = $pinyinPro->convert('lv4 se4');
            expect($result)->toBe('lv4 se4');
        });

        test('numToSymbol abnormal', function () {
            $pinyinPro = new PinyinProBuilder()->withFormat('numToSymbol')->build();
            $result = $pinyinPro->convert('l2');
            expect($result)->toBe('l2');
        });

        test('numToSymbol iu', function () {
            $pinyinPro = new PinyinProBuilder()->withFormat('numToSymbol')->build();
            $result = $pinyinPro->convert('liu2');
            expect($result)->toBe('liú');
        });

        test('special tone', function () {
            $pinyinPro = new PinyinProBuilder()->withFormat('symbolToNum')->build();
            $result = $pinyinPro->convert('m̄ hm ê̄ ế ê̌ ề');
            expect($result)->toBe('m1 hm0 ê1 ê2 ê3 ê4');
        });
    });
});
