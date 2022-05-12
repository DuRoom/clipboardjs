<?php

/*
 * This file is part of duroom/clipboardjs.
 *
 * Copyright (c) 2022 NKDuy
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace DuRoom\ClipboardJS;

use DuRoom\Extend;
use Illuminate\Contracts\Events\Dispatcher;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/resources/less/forum.less'),
    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),
    new Extend\Locales(__DIR__ . '/resources/locale'),
    (new Extend\Event)
        ->subscribe(Listeners\SaveSettings::class),
    (new Extend\Settings())
        ->serializeToForum('themeName', 'duroom-clipboardjs.theme_name')
        ->serializeToForum('isCopyEnable', 'duroom-clipboardjs.is_copy_enable', 'boolVal')
        ->serializeToForum('isShowCodeLang', 'duroom-clipboardjs.is_show_codeLang', 'boolVal'),
];
