<?php

namespace DuRoom\ClipboardJS\Listeners;

use DuRoom\Api\Serializer\UserSerializer;
use DuRoom\Api\Event\Serializing;
use DuRoom\Settings\SettingsRepositoryInterface;
use Illuminate\Contracts\Events\Dispatcher;

class SaveSettings {
    protected $settings;

    public function __construct(SettingsRepositoryInterface $settings) {
        $this->settings = $settings;
    }

    public function subscribe(Dispatcher $events) {
        $events->listen(Serializing::class, [$this, 'addAttributes']);
    }

    public function addAttributes(Serializing $event) {
        $event->attributes['duroom-clipboardjs.theme_name'] = $this->settings->get('duroom-clipboardjs.theme_name');
        $event->attributes['duroom-clipboardjs.is_show_codeLang'] = $this->settings->get('duroom-clipboardjs.is_show_codeLang');
        $event->attributes['duroom-clipboardjs.is_copy_enable'] = $this->settings->get('duroom-clipboardjs.is_copy_enable');
    }
}
