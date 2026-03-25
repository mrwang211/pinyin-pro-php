<?php

namespace Mrwang211\PinyinPro;

class PinyinUtils
{
    private const string REG_TONE_1 = '/(ā|ō|ē|ī|ū|ǖ|n̄|m̄|ê̄)/';

    private const string REG_TONE_2 = '/(á|ó|é|í|ú|ǘ|ń|ḿ|ế)/';

    private const string REG_TONE_3 = '/(ǎ|ǒ|ě|ǐ|ǔ|ǚ|ň|m̌|ê̌)/';

    private const string REG_TONE_4 = '/(à|ò|è|ì|ù|ǜ|ǹ|m̀|ề)/';

    private const string REG_TONE_0 = '/(a|o|e|i|u|ü|ê)/';

    private const string SPECIAL_TONE = '/(n|m)$/';

    private const array SEARCH = ['ā', 'á', 'ǎ', 'à', 'ō', 'ó', 'ǒ', 'ò', 'ē', 'é', 'ě', 'è', 'ī', 'í', 'ǐ', 'ì', 'ū', 'ú', 'ǔ', 'ù', 'ǖ', 'ǘ', 'ǚ', 'ǜ', 'n̄', 'ń', 'ň', 'ǹ', 'm̄', 'ḿ', 'm̌', 'm̀', 'ê̄', 'ế', 'ê̌', 'ề'];

    private const array REPLACE = ['a', 'a', 'a', 'a', 'o', 'o', 'o', 'o', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'u', 'u', 'u', 'u', 'ü', 'ü', 'ü', 'ü', 'n', 'n', 'n', 'n', 'm', 'm', 'm', 'm', 'ê', 'ê', 'ê', 'ê'];

    public static function getNumOfTone(string $pinyin): string
    {

        $pinyinArray = explode(' ', $pinyin);
        $toneNumArray = array_map(function (string $character) {
            if (preg_match(self::REG_TONE_1, $character)) {
                return '1';
            } elseif (preg_match(self::REG_TONE_2, $character)) {
                return '2';
            } elseif (preg_match(self::REG_TONE_3, $character)) {
                return '3';
            } elseif (preg_match(self::REG_TONE_4, $character)) {
                return '4';
            } elseif (preg_match(self::REG_TONE_0, $character)) {
                return '0';
            } elseif (preg_match(self::SPECIAL_TONE, $character)) {
                return '0';
            } else {
                return '';
            }
        }, $pinyinArray);

        return implode(' ', $toneNumArray);
    }

    public static function getPinyinWithoutTone(string $pinyin): string
    {
        return str_replace(
            PinyinUtils::SEARCH,
            PinyinUtils::REPLACE,
            $pinyin
        );
    }
}
