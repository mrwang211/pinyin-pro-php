<?php

namespace Mrwang211\PinyinPro;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Mrwang211\PinyinPro\Commands\PinyinProCommand;

class PinyinProServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('pinyin-pro')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_pinyin_pro_table')
            ->hasCommand(PinyinProCommand::class);
    }
}
