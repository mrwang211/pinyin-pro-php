<?php

namespace Mrwang211\PinyinPro;

class PinyinProBuilder
{
    private PinyinPro $pinyinProInstance;

    public function __construct()
    {
        $this->pinyinProInstance = new PinyinPro;
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
        return $this->pinyinProInstance;
    }
}
