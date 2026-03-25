<?php

namespace Mrwang211\PinyinPro;

class PinyinPro
{
    private string $separator;

    private string $format;

    public function __construct(string $separator = ' ', string $format = 'numToSymbol')
    {
        $this->separator = $separator;
        $this->format = $format;
    }

    public function convert(array|string $pinyin): array|string
    {
        $originalType = gettype($pinyin);

        if ($originalType === 'string') {
            $pinyin = explode($this->separator, $pinyin);
        }

        $pinyin = array_map(function ($item) {
            $format = $this->format;

            if ($format === 'numToSymbol') {
                return self::formatNumToSymbol($item);
            } elseif ($format === 'symbolToNum') {
                return self::formatSymbolToNum($item);
            } elseif ($format === 'toneNone') {
                return self::formatToneNone($item);
            }

            return $item;
        }, $pinyin);

        if ($originalType === 'string') {
            return implode($this->separator, $pinyin);
        }

        return $pinyin;
    }

    public function getSeparator(): string
    {
        return $this->separator;
    }

    public function setSeparator(string $separator): void
    {
        $this->separator = $separator;
    }

    public function getFormat(): string
    {
        return $this->format;
    }

    public function setFormat(string $format): void
    {
        $this->format = $format;
    }

    private static function formatNumToSymbol(string $pinyin): string
    {
        $lastChar = substr($pinyin, -1);

        if (ctype_digit($lastChar) && (int) $lastChar <= 4) {
            foreach (array_keys(ToneMap::DEFAULT_TONE_MAP) as $key) {
                if (str_contains($pinyin, $key)) {
                    return str_replace($key, ToneMap::DEFAULT_TONE_MAP[$key][$lastChar], substr($pinyin, 0, -1));
                }
            }
        }

        return $pinyin;
    }

    private static function formatSymbolToNum(string $pinyin): string
    {
        return PinyinUtils::getPinyinWithoutTone($pinyin).PinyinUtils::getNumOfTone($pinyin);
    }

    private static function formatToneNone(string $pinyin): string
    {
        return PinyinUtils::getPinyinWithoutTone($pinyin);
    }
}
