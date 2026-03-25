<?php

namespace Mrwang211\PinyinPro;

class PinyinProBuilder
{
    private const string DEFAULT_SEPARATOR = ' ';

    private const string DEFAULT_FORMAT = 'numToSymbol';

    private PinyinPro $pinyinProInstance;

    public function __construct()
    {
        $this->pinyinProInstance = new PinyinPro(self::DEFAULT_SEPARATOR, self::DEFAULT_FORMAT);
    }

    public function withSeparator(string $separator): static
    {
        $this->pinyinProInstance->setSeparator($separator);

        return $this;
    }

    public function withFormat(string $format): static
    {
        $this->pinyinProInstance->setFormat($format);

        return $this;
    }

    public function build(): PinyinPro
    {
        if ($this->pinyinProInstance->getSeparator() == null) {
            $this->pinyinProInstance->setSeparator(self::DEFAULT_SEPARATOR);
        }

        if ($this->pinyinProInstance->getFormat() == null) {
            $this->pinyinProInstance->setFormat(self::DEFAULT_FORMAT);
        }

        return $this->pinyinProInstance;
    }
}
