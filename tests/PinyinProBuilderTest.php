<?php

use Mrwang211\PinyinPro\PinyinProBuilder;

describe('PinyinProBuilder', function () {
    it('initializes default separator when none is provided', function () {
        $pinyinPro = new PinyinProBuilder()->build();
        expect($pinyinPro->getSeparator())->toBe(' ');
    });

    it('initializes default format when none is provided', function () {
        $pinyinPro = new PinyinProBuilder()->build();
        expect($pinyinPro->getFormat())->toBe('numToSymbol');
    });

    it('updates separator when one is provided', function () {
        $pinyinPro = new PinyinProBuilder()->withSeparator('my_sep')->build();
        expect($pinyinPro->getSeparator())->toBe('my_sep');
    });

    it('updates format when one is provided', function () {
        $pinyinPro = new PinyinProBuilder()->withFormat('my_format')->build();
        expect($pinyinPro->getFormat())->toBe('my_format');
    });
});
