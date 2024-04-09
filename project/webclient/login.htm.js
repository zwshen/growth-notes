var pageLangKeys = [
  'IDCS_LOGIN_NBSP', 'IDCS_USERNAME_TIP', 'IDCS_PASSWORD_TIP',
  'IDCS_WEB_CLIENT', 'IDCS_PROMPT_USERNAME_EMPTY',
  'IDCS_LOGIN_FAIL_REASON_U_P_ERROR', 'IDCS_LOGIN_FAIL_USER_LOCKED',
  'IDCS_LOGIN_FAIL_USER_LIMITED_TELNET', 'IDCS_BS_PLUGIN_DOWNLOAD'
];

document.write('...login.htm.js...<br>')

$(function() {
  // if (detectOS() == "mac") {
  // 	$("#dlPlugin").attr("href", "../OCX/NVMS9000.pkg");
  // }
  // else {
  // 	$("#dlPlugin").attr("href", "../OCX/WebClient_9000.exe");
  // }

  document.write('...login.htm.js...')

  // 检测是否有登录会话，如果有，直接进入系统
  var auInfo = $.cookie('auInfo');
  if (auInfo) {
    window.location.href = 'main.htm';
    return;
  }

  initLangCtrl();

  $('#btnLogin').click(funLogin);
  $('#txtUserName,#txtPassword').keydown(function(ev) {
    ev = ev || event;
    if (isEnter(ev)) funLogin(ev);
  });

  $('#txtUserName').watermark(LangCtrl._L_('IDCS_USERNAME_TIP'));
  $('#txtPassword').watermark(LangCtrl._L_('IDCS_PASSWORD_TIP'));
  //	initUserNameInput($("#txtUserName"), {

  //		maxLeng: pwdByteMaxLen
  //	});

  var t = LangCtrl._L_('IDCS_WEB_CLIENT');
  document.title = t == 'IDCS_WEB_CLIENT' ? '' : t;

  $('#btnLogin').focus();
});

function funLogin(e) {
  document.write('...login.htm.js funLogin...')

  $('#btnLogin').attr('disabled', true).addClass('disabled');
  $('#ErrorMsg').html('');
  if (e && e.stopPropagation) e.stopPropagation();
  if (!funVerify()) {
    $('#btnLogin').attr('disabled', false).removeClass('disabled');
    return;
  }
  var auInfo = zhBase64Encode(
      $.trim($('#txtUserName').val()) + ':' + $('#txtPassword').val());
  var auInfo = Encryption(
      $.trim($('#txtUserName').val()) + ':' + $.trim($('#txtPassword').val()));
  $.cookie('auInfo', auInfo);
  window.location.href = 'main.htm';
  return;
  try {
    XmlHttpClient.SendHttpRequest({
      url: dataServiceBase + 'doLogin',
      type: 'POST',
      async: true,
      data: emptyRequest,
      checkCommonErrorSwitch: false,
      beforeSend: function(xhr) {
        xhr.setRequestHeader('Authorization', 'Basic ' + auInfo);
        return true;
      },
      callback: function(result) {
        if ($('response>status', result).text() == 'success') {
          $.cookie('auInfo', auInfo);
          $.cookie('userId', $('response>content>userId', result).text());
          $.cookie(
              'authGroupId', $('response>content>authGroupId', result).text());
          $.cookie(
              'adminName',
              $('response>content>adminName', result).text() || 'admin');
          $.cookie(
              'resetPassword',
              $('response>content>resetPassword', result).text() || 'MTIzNDU2');
          initSystemAuth(result);
          XmlHttpClient.SendHttpRequest({
            url: dataServiceBase + 'querySystemCaps',
            type: 'POST',
            async: true,
            data: emptyRequest,
            beforeSend: XmlHttpClient.CommBeforeSend,
            callback: function(sysCapsResult) {
              $.cookie(
                  'analogChlCount',
                  $('response>content>analogChlCount', sysCapsResult).text());
              $.cookie(
                  'ipChlMaxCount',
                  $('response>content>ipChlMaxCount', sysCapsResult).text());
              window.location.href = 'main.htm';
            }
          });
        } else {
          $('#txtPassword').val('');
          var errorCode = $('response>errorCode', result).text();
          if (errorCode) {
            switch (errorCode) {
              case '536870947':
              case '536870948':
                $('#ErrorMsg')
                    .html(LangCtrl._L_('IDCS_LOGIN_FAIL_REASON_U_P_ERROR'));
                break;
              case '536870951':
                $('#ErrorMsg')
                    .html(LangCtrl._L_('IDCS_LOGIN_FAIL_USER_LOCKED'));
                break;
              case '536870953':
                $('#ErrorMsg')
                    .html(LangCtrl._L_('IDCS_LOGIN_FAIL_USER_LIMITED_TELNET'));
                break;
              default:
                $('#ErrorMsg')
                    .html(LangCtrl._L_('IDCS_UNKNOWN_ERROR_CODE') + errorCode);
            }
          } else
            $('#ErrorMsg').html(LangCtrl._L_('loginFailed'));
          $('#btnLogin').attr('disabled', false).removeClass('disabled');
        }
      }
    });
  } catch (ex) {
    alert(ex);
  }
}

function funVerify() {
  if (!$.trim($('#txtUserName').val())) {
    $('#txtUserName').focus();
    $('#ErrorMsg').html(LangCtrl._L_('IDCS_PROMPT_USERNAME_EMPTY'));
    return false;
  }
  return true;
}

// 初始化语言控件
function initLangCtrl() {
  try {
    XmlHttpClient.SendHttpRequest({
      url: dataServiceBase + 'getSupportLangList',
      type: 'POST',
      async: false,
      data: emptyRequest,
      checkCommonErrorSwitch: false,
      callback: function(result) {
        if ($('response>status', result).text() == 'success') {
          var defaultLangId =
              $('response>content', result).attr('currentLangType') ||
              langMap[(navigator.userLanguage || navigator.language)
                          .toLowerCase()];
          var langTypeList = $('#langTypeList');
          langTypeList.empty();
          $('response>content>item', result).each(function(index, element) {
            var $this = $(this);
            var langId = $this.attr('id');
            var langName = $('>name', $this).text();
            var langtype = 'en-us';
            $.each(langMap, function(key, value) {
              if (value.toLowerCase() == langId) {
                langtype = key;
                return false;
              }
            });
            langTypeList.append(
                '<div class="item" langtype="' + langtype + '" langId="' +
                langId + '">' + langName + '</div>');
          });

          if (!$.cookie('lang_id') && defaultLangId) {
            $.cookie('lang_id', defaultLangId);
            $.each(langMap, function(key, value) {
              if (value.toLowerCase() == defaultLangId) {
                $.cookie('lang_type', key);
                return false;
              }
            });
          }

          var langId = $.cookie('lang_id');

          $('#langType').click(function(event) {
            if (event.stopPropagation) {
              event.stopPropagation();
            }
            $('#langTypeList')[$('#langTypeList').is(':visible') ? 'hide' : 'show']();
          });

          $('#langTypeList>.item').each(function(index, element) {
            var $this = $(this);
            if ($this.attr('langId') == langId) {
              $('#langTypeSel').html($this.html());
              $this.addClass('selected');
            } else {
              $this.removeClass('selected');
            }
          });

          // 列表中没有该语言项则选中第一项
          if ($('#langTypeList>.item[langId="' + langId + '"]').size() == 0) {
            var langItem = $('#langTypeList>.item:eq(0)');
            var itemLangId = langItem.attr('langId');
            $('#langTypeSel').html(langItem.html());
            langItem.addClass('selected');
            $.cookie('lang_id', itemLangId);
            $.each(langMap, function(key, value) {
              if (value.toLowerCase() == itemLangId) {
                $.cookie('lang_type', key);
                return false;
              }
            });
          }

          $('#langTypeList>.item').click(function(event) {
            if (event.stopPropagation) {
              event.stopPropagation();
            }
            var $this = $(this);
            $('#langTypeList').hide();
            if ($this.hasClass('selected')) {
              return;
            }
            $('#langTypeSel').html($this.html());
            LangCtrl.changLang($this.attr('langtype'), $this.attr('langId'));
          });

          $(document).click(function(event) {
            $('#langTypeList').hide();
          });

          LangCtrl.isNeedLoadLang = true;
          LangCtrl.translate();
        } else {
          $(window.top.document.body).html('');
        }
      },
      error: function(msg) {
        $(window.top.document.body).html('');
      }
    });
  } catch (ex) {
    alert(ex);
  }
}

// 初始化权限
function initSystemAuth(xmlDoc) {
  var authMask = 0;
  $.each(systemAuthList, function(index, element) {
    if ($('response>content>systemAuth>' + element, xmlDoc).text() == 'true') {
      authMask += Math.pow(2, index);
    }
  });
  $.cookie('authEffective', $('response>content>authEffective', xmlDoc).text());
  $.cookie('authMask', authMask);
}