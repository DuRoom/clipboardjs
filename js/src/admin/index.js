import app from 'duroom/common/app';

app.initializers.add('duroom/clipboardjs', (app) => {

  function getTrans(key) {
    return app.translator.trans('duroom-clipboardjs.admin.settings.' + key);
  }
  
  const themes = {
    'default': getTrans('themes.default'),
    'github': getTrans('themes.github'),
    'lingcoder': getTrans('themes.lingcoder'),
    'csdn': getTrans('themes.csdn'),
    'cnblog': getTrans('themes.cnblog'),
    'jianshu': getTrans('themes.jianshu'),
    'segmentfault': getTrans('themes.segmentfault'),
  }

  app.extensionData.for('duroom-clipboardjs')
    .registerSetting({
        setting: 'duroom-clipboardjs.theme_name',
        type: 'select',
        options: themes,
        default: 'default',
        label: getTrans('themes_label')
    })
    .registerSetting({
      setting: 'duroom-clipboardjs.is_copy_enable',
      type: 'switch',
      label: getTrans('copy_enable_label')
    })
    .registerSetting({
      setting: 'duroom-clipboardjs.is_show_codeLang',
      type: 'switch',
      label: getTrans('codeLang_label')
    })
  console.log('[duroom/clipboardjs] Hello, admin!');
});
