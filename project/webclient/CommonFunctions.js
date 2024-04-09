// 页面控件的值转为json字符串
function PageToJson(content) {
  var filedList = $(content).find('[fieldName]');
  var data = '{';
  for (var i = 0, i_Count = filedList.length; i < i_Count; i++) {
    var value;
    if ($(filedList[i]).attr('type') == 'checkbox')
      value = $(filedList[i]).is(':checked') ? 'true' : 'false';
    else
      value = $(filedList[i]).val();
    data += '"' + $(filedList[i]).attr('fieldName') + '":"' + value + '",';
  }
  if (data[data.length - 1] == ',') data = data.substring(0, data.length - 1);
  data += '}';
  return data;
}

// 页面控件的值转为json
function PageToJsonObj(content) {
  var filedList = $(content).find('[fieldName]');
  var data = {};
  for (var i = 0, i_Count = filedList.length; i < i_Count; i++) {
    var value;
    if ($(filedList[i]).attr('type') == 'checkbox')
      value = $(filedList[i]).is(':checked') ? 'true' : 'false';
    else
      value = $(filedList[i]).val();
    data[$(filedList[i]).attr('fieldName')] = value;
  }
  return data;
}

// 用json对象给页面控件赋值
function JsonToPage(content, data) {
  for (var key in data) {
    var filed = $(content).find('[fieldName=\'' + key + '\']').first();
    if (filed) {
      filed.val(data[key]);
    }
  }
}

function JsonStrToJson(jsonStr) {
  return (new Function('return ' + jsonStr))();
}

function JsonToJsonStr(jsonObj) {
  return JSON.stringify(jsonObj);
}

// 选中文本框文字
function SetSelectText(el, start, end) {
  if (el.createTextRange) {
    var Range = el.createTextRange();
    Range.collapse();
    Range.moveEnd('character', end);
    Range.moveStart('character', start);
    Range.select();
  } else if (el.setSelectionRange) {
    el.focus();
    el.setSelectionRange(start, end);  // 设光标
  }
}

// 获取选中的文字
function GetSelectText(id) {
  var word = '';
  if (document.selection) {
    o = document.selection.createRange();
    if (o.text.length > 0) word = o.text;
  } else {
    o = document.getElementById(id);
    p1 = o.selectionStart;
    p2 = o.selectionEnd;
    if (p1 || p1 == '0') {
      if (p1 != p2) word = o.value.substring(p1, p2);
    }
  }
  return word;
}

// 设置文本框光标位置
function SetCursorPosition(elem, caretPos) {
  elem = $(elem)[0];
  if (elem != null) {
    if (elem.createTextRange) {
      var range = elem.createTextRange();
      range.move('character', caretPos);
      range.select();
    } else {
      elem.focus();
      elem.setSelectionRange(caretPos, caretPos);
    }
  }
}

function CheckIP(strIP) {
  if (!(strIP)) return false;
  var re = /^(\d+)\.(\d+)\.(\d+)\.(\d+)$/g;  // 匹配IP地址的正则表达式
  if (re.test(strIP)) {
    if (RegExp.$1 < 256 && RegExp.$2 < 256 && RegExp.$3 < 256 &&
        RegExp.$4 < 256)
      return true;
  }
  return false;
}

function CheckNum(str) {
  var re = /^\d+$/g;  // 匹配数字的正则表达式
  if (re.test(str)) return true;
  return false;
}

function checkMAC(str) {
  var re =
      /^([a-fA-F0-9]{1,2}:){5}[a-fA-F0-9]{1,2}$/g;  // 匹配MAC地址的正则表达式
  if (re.test(str)) return true;
  return false;
}

function GetKeyCode(e) {
  e = e ? e : window.event;
  var keyCode = e.which ? e.which : e.keyCode;
  return keyCode;
}

// 只能输入数字的文本框（不包括小数点）
function ToNumOnlyTxt(txt) {
  // 8 = BackSpace
  // 110 = KP_Decimal
  // 190 = period colon
  $(txt).keydown(function(event) {
    var keyCode = GetKeyCode(event);
    return keyCode >= 48 && keyCode <= 57 || keyCode >= 96 && keyCode <= 105 ||
        keyCode == 46 || keyCode == 8 || keyCode == 9;
  });
  $(txt).keyup(function() {
    $(txt).val($(txt).val().replace(/[^\d]/g, ''));
  });
}

// 只能输入数字的文本框（不在keyup时替换）
function ToNumOnlyTxt_NoReplace(txt) {
  // 8 = BackSpace
  // 110 = KP_Decimal
  // 190 = period colon
  $(txt).keydown(function(event) {
    var keyCode = GetKeyCode(event);
    return keyCode >= 48 && keyCode <= 57 || keyCode >= 96 && keyCode <= 105 ||
        keyCode == 46 || keyCode == 8 || keyCode == 9;
  });
}

function ValidateFloat(e, pnumber) {
  if (!/^\d+[.]?\d*$/.test(pnumber)) {
    var newValue = /^\d+[.]?\d*/.exec(e.value);
    if (newValue != null) {
      e.value = newValue;
    } else {
      e.value = '';
    }
  }
  return false;
}


function ValidateFloat2(e, pnumber) {
  if (!/^\d+[.]?[1-9]?$/.test(pnumber)) {
    var newValue = /\d+[.]?[1-9]?/.exec(e.value);
    if (newValue != null) {
      e.value = newValue;
    } else {
      e.value = '';
    }
  }

  return false;
}

// xml字符串转xml文档对象
function XMLStr2XMLDoc(txt) {
  var xmlDoc;
  if (window.DOMParser) {
    parser = new DOMParser();
    xmlDoc = parser.parseFromString(txt, 'text/xml');
  } else {  // IE
    var versions = [
      'MSXML2.DOMDocument.6.0', 'MSXML2.DOMDocument.3.0', 'Microsoft.XMLDOM'
    ];
    for (var i = 0; i < versions.length; i++) {
      try {
        xmlDoc = new ActiveXObject(versions[i]);
        xmlDoc.async = 'false';
        xmlDoc.loadXML(txt);
        break;
      } catch (ex) {
      }
    }
  }
  return xmlDoc;
}

// xml文档对象转xml字符串
function XMLDoc2XMLStr(doc) {
  if (doc.xml)
    return doc.xml;
  else
    return (new XMLSerializer()).serializeToString(doc);
}

// XML转换为JSON对象
function xml2json(xml, path) {
  var obj = {};
  if (typeof xml == 'string') {
    xml = XMLStr2XMLDoc(xml);
  }

  var $xml = path ? $(path, xml).parent() : $(xml);
  var children = $xml.children();
  var attributes = xml.attributes;
  if (attributes && attributes.length > 0) {
    $.each(attributes, function(index, element) {
      obj['@' + element.nodeName] = element.nodeValue;
    });
  }

  if (children.size() > 0) {
    $xml.children().each(function(index, element) {
      var name = element.nodeName;
      var subObj = xml2json(element);
      if (obj[name]) {
        if (!(obj[name] instanceof Array)) {
          var tmpObj = obj[name];
          obj[name] = [];
          obj[name].push(tmpObj);
        }
        obj[name].push(subObj);
      } else {
        obj[name] = subObj;
      }
    });
  } else if ($xml.size() > 0) {
    var text = $xml.text();
    if (attributes.length > 0) {
      obj['innerText'] = text;
    } else {
      obj = text;
    }
  }
  return obj;
}

// 开始拖拽
function DragSetCapture(o) {
  if (o.setCapture) {
    o.setCapture();
  } else if (window.captureEvents) {
    window.captureEvents(Event.MOUSEMOVE | Event.MOUSEDOWN);
  }
}

// 结束拖拽
function DragReleaseCapture(o) {
  if (o.releaseCapture) {
    o.releaseCapture();
  } else if (window.captureEvents) {
    window.captureEvents(Event.MOUSEMOVE | Event.MOUSEUP);
  }
}

function getArrMinus(arr1, arr2) {
  var a = $.grep(arr1, function(val, key) {
    return $.inArray(val, arr2) == -1;
  });
  return a;
}

Date.prototype.format = function(format, lang) {
  var self = this;
  var o = {
    'M+': this.getMonth() + 1,  // month
    'd+': this.getDate(),       // day
    'H+': this.getHours(),      // 24hour
    'h+': function() {
      var h = self.getHours();
      if (h == 0)
        return 12;
      else if (h > 12)
        return h - 12;
      else
        return h;
    }(),                                          // 12hour
    'm+': this.getMinutes(),                      // minute
    's+': this.getSeconds(),                      // second
    'q+': Math.floor((this.getMonth() + 3) / 3),  // quarter
    'S': this.getMilliseconds(),                  // millisecond
    'tt': function() {
      lang = lang || 'en-us';
      if (!Date.prototype.format.lang[lang]) {
        lang = 'en-us';
      }
      var h = self.getHours();
      if (h < 12)
        return Date.prototype.format.lang[lang]['am'];
      else
        return Date.prototype.format.lang[lang]['pm'];
    }()
  };
  if (/(y+)/.test(format))
    format = format.replace(
        RegExp.$1, (this.getFullYear() + '').substr(4 - RegExp.$1.length));
  for (var k in o)
    if (new RegExp('(' + k + ')').test(format))
      format = format.replace(
          RegExp.$1,
          RegExp.$1.length == 1 ? o[k] :
                                  ('00' + o[k]).substr(('' + o[k]).length));
  return format;
};

Date.prototype.format.lang = {
  'en-us': {am: 'AM', pm: 'PM'},
  'zh-cn': {am: 'AM', pm: 'PM'}
};

Date.parse = function(dateString, dateSpliter) {
  if (!dateSpliter) {
    dateSpliter = '-';
  }

  var dateParts = dateString.match(new RegExp(
      '^(\\d{1,4})' + dateSpliter + '(\\d{1,2})' + dateSpliter +
      '(\\d{1,2}) (\\d{1,2}):(\\d{1,2}):(\\d{1,2})$'));
  return dateParts && dateParts.length == 7 ?
      new Date(
          dateParts[1], dateParts[2] * 1 - 1, dateParts[3], dateParts[4],
          dateParts[5], dateParts[6]) :
      null;
};

Date.parseByFormat = function(dateString, dateFormat) {
  switch (dateFormat) {
    case 'year-month-day':  //"yyyy/MM/dd"
      var dateParts = dateString.match(new RegExp(
          '^(\\d{1,4})/(\\d{1,2})/(\\d{1,2}) (\\d{1,2}):(\\d{1,2}):(\\d{1,2})( pm| am| PM| AM)?$'));
      if (dateParts && dateParts.length == 8) {
        var d7 = $.trim(dateParts[7]);
        if (d7.length == 0) {
          return new Date(
              dateParts[1], dateParts[2] * 1 - 1, dateParts[3], dateParts[4],
              dateParts[5], dateParts[6]);
        } else {
          if (d7.toLowerCase() == 'pm') {
            dateParts[4] = dateParts[4] * 1 + 12;
          }
          return new Date(
              dateParts[1], dateParts[2] * 1 - 1, dateParts[3], dateParts[4],
              dateParts[5], dateParts[6]);
        }
      }
      return null;
    case 'month-day-year':  //"MM/dd/yyyy"
      var dateParts = dateString.match(new RegExp(
          '^(\\d{1,2})/(\\d{1,2})/(\\d{1,4}) (\\d{1,2}):(\\d{1,2}):(\\d{1,2})( pm| am| PM| AM)?$'));
      if (dateParts && dateParts.length == 8) {
        var d7 = $.trim(dateParts[7]);
        if (d7.length == 0) {
          return new Date(
              dateParts[3], dateParts[1] * 1 - 1, dateParts[2], dateParts[4],
              dateParts[5], dateParts[6]);
        } else {
          if (d7.toLowerCase() == 'pm') {
            dateParts[4] = dateParts[4] * 1 + 12;
          }
          return new Date(
              dateParts[3], dateParts[1] * 1 - 1, dateParts[2], dateParts[4],
              dateParts[5], dateParts[6]);
        }
      }
      return null;
    case 'day-month-year':  //"dd/MM/yyyy"
      var dateParts = dateString.match(new RegExp(
          '^(\\d{1,2})/(\\d{1,2})/(\\d{1,4}) (\\d{1,2}):(\\d{1,2}):(\\d{1,2})( pm| am| PM| AM)?$'));
      if (dateParts && dateParts.length == 8) {
        var d7 = $.trim(dateParts[7]);
        if (d7.length == 0) {
          return new Date(
              dateParts[3], dateParts[2] * 1 - 1, dateParts[1], dateParts[4],
              dateParts[5], dateParts[6]);
        } else {
          if (d7.toLowerCase() == 'pm') {
            dateParts[4] = dateParts[4] * 1 + 12;
          }
          return new Date(
              dateParts[3], dateParts[2] * 1 - 1, dateParts[1], dateParts[4],
              dateParts[5], dateParts[6]);
        }
      }
      return null;
    default:
      return null;
  }
};

// 当地时间转UTC时间
function LocalTime2UTCTime(dateObj) {
  var t_offset = dateObj.getTimezoneOffset();
  var utcTime = dateObj.getTime() + t_offset * 60 * 1000;
  dateObj.setTime(utcTime);
  return dateObj;
}

// UTC时间转当地时间
function UTCTime2LocalTime(dateObj) {
  var t_offset = dateObj.getTimezoneOffset();
  var utcTime = dateObj.getTime() - t_offset * 60 * 1000;
  dateObj.setTime(utcTime);
  return dateObj;
}

// 字符编码数值对应的存储长度：
// UCS-2编码(16进制) UTF-8 字节流(二进制)
// 0000 - 007F	   0xxxxxxx （1字节）
// 0080 - 07FF	   110xxxxx 10xxxxxx （2字节）
// 0800 - FFFF	   1110xxxx 10xxxxxx 10xxxxxx （3字节）
// var str="，";
// alert("字符数"+str.length+" ，字节数"+str.getBytesLength());
String.prototype.getBytesLength = function() {
  var totalLength = 0;
  var charCode;
  for (var i = 0; i < this.length; i++) {
    charCode = this.charCodeAt(i);
    if (charCode < 0x007f) {
      totalLength++;
    } else if ((0x0080 <= charCode) && (charCode <= 0x07ff)) {
      totalLength += 2;
    } else if ((0x0800 <= charCode) && (charCode <= 0xffff)) {
      totalLength += 3;
    } else {
      totalLength += 4;
    }
  }
  return totalLength;
};

// 按字节数截取字符串，中英文混合时无乱码
//$sourcestr：源字符串
//$cutlength：字节长度
function cut_str_utf8_byte($sourcestr, $cutlength) {
  var $returnstr = $sourcestr;
  var $i = 0;  // 字节个数
  var $j = 0;  // 字符个数
  var $lastByte = 0;
  $str_length = $sourcestr.length;  // 字符长度
  while (($i <= $cutlength) && ($j < $str_length)) {
    charCode = $sourcestr.charCodeAt($j);
    if (charCode < 0x007f) {
      $i++;
      $j++;
      $lastByte = 1;
    } else if ((0x0080 <= charCode) && (charCode <= 0x07ff)) {
      $i += 2;
      $j++;
      $lastByte = 2;
    } else if ((0x0800 <= charCode) && (charCode <= 0xffff)) {
      $i += 3;
      $j++;
      $lastByte = 3;
    } else {
      $i += 4;
      $j++;
      $lastByte = 4;
    }
  }
  if ($i > $cutlength) {
    $returnstr = $sourcestr.substr(0, $j - 1);
  }
  return $returnstr;
}

/*
 * 调用方式
 * var template1="apple is {0}，banana is {1}";
 * var result1=template1.format("red","yellow");
 */
String.prototype.format = function(args) {
  var result = this;
  if (arguments.length > 0) {
    for (var i = 0; i < arguments.length; i++) {
      if (arguments[i] != undefined) {
        var reg = new RegExp('(\\{' + i + '\\})', 'g');
        result = result.replace(reg, arguments[i]);
      }
    }
  }
  return result;
};

/*
 * 调用方式
 * var template1="apple is %1，banana is %2";
 * var result1=template1.formatForLang("red","yellow");
 */
String.prototype.formatForLang = function(args) {
  var result = this;
  if (arguments.length > 0) {
    for (var i = 0; i < arguments.length; i++) {
      if (arguments[i] != undefined) {
        var reg = new RegExp('(%' + (i + 1) + ')', 'g');
        result = result.replace(reg, arguments[i]);
      }
    }
  }
  return result;
};

function isEnter(ev) {
  ev = ev || window.event;
  var code = (ev.keyCode || ev.which);
  return code == 13;
}

function getPort() {
  //	var port;
  //	$.ajax({
  //		async: false,
  //		cache: false,
  //		type: "GET",
  //		url: webBase + "OCX/LocalParameters.xml",
  //		data: "",
  //		success: function(data) {
  //			port = $.trim($("LocalParameters > NetPort",
  //$(data)).text());
  //		}
  //	});
  //	return port;

  //	$.ajax({
  //		async: false,
  //		cache: false,
  //		type: "GET",
  //		url: webBase + "server.js",
  //		dataType: "script",
  //		success: function (html) {
  //		}
  //	});
  //	return NetPort;
  var port;
  try {
    XmlHttpClient.SendHttpRequest({
      url: dataServiceBase + 'queryNetStatus',
      type: 'POST',
      async: false,
      data: emptyRequest,
      beforeSend: XmlHttpClient.CommBeforeSend,
      callback: function(result) {
        var hostName = window.top.location.hostname;
        var isInternal = false;
        if ($('response>status', result).text() == 'success') {
          if ($('response>content>ipGroup>switch', result).text() == 'true') {
            isInternal =
                hostName == $('response>content>ipGroup>ip', result).text();
          } else {
            $('response>content>nic>item', result)
                .each(function(index, element) {
                  if ($('>ip', element).text() == hostName ||
                      $('>ipV6', element).text() == hostName) {
                    isInternal = true;
                    return false;
                  }
                });
          }
        }
        XmlHttpClient.SendHttpRequest({
          url: dataServiceBase + 'queryUPnPCfg',
          type: 'POST',
          async: false,
          data: emptyRequest,
          beforeSend: XmlHttpClient.CommBeforeSend,
          callback: function(result) {
            if ($('response>status', result).text() == 'success') {
              $('response>content>ports>item', result).each(function(i, elem) {
                if ($('>portType', elem).text() == 'SERVICE') {
                  if (isInternal) {
                    port = $('>localPort', elem).text();
                  } else {
                    port = $('>externalPort', elem).text();
                  }
                  return false;
                }
              });
            }
          }
        });
      }
    });
  } catch (ex) {
    //		alert(ex);
  }
  return port;
}

/**
 * 对象数组转变为键映射
 * @param array 对象数组
 * @param keyField 作为键的字段
 * @param keyFunction 格式化键的函数（可选）
 *		@param value4KeyField 键字段所对应的值
 *		@returns 格式化好的键
 */
function objArray2Map(array, keyField, keyFunction) {
  // 判断是否是数组
  if ($.isArray(array)) {
    var map = {};
    for (var i = 0; i < array.length; i++) {
      map[keyFunction && typeof keyFunction == 'function' ?
              keyFunction(array[i][keyField]) :
              array[i][keyField]] = array[i];
    }
    return map;
  }
  return null;
}


/*
AJAX请求封装
标准的XMLHttpRequest对象，不能跨域访问，为联调方便
优先初始化ActiveXObject
*/
function XmlHttpClient() {}

XmlHttpClient.CommBeforeSend =
    function(xhr) {
  var auInfo = $.cookie('auInfo');
  if (auInfo) {
    xhr.setRequestHeader('Authorization', 'Basic ' + auInfo);
    return true;
  } else {
    window.top.location.href = '/Pages/login.htm';
    return false;
  }
}

    // 判断公共错误
    XmlHttpClient.checkCommonError =
        function(xmlHttp) {
  if ($('response>status', xmlHttp.responseXML).text() != 'success') {
    switch ($('response>errorCode', xmlHttp.responseXML).text()) {
      case '536870947':
        window.top.hideLoading();
        if (window.top.MsgBoxHelper) {
          window.top.MsgBoxHelper.Show(
              'info', LangCtrl._L_('IDCS_INFO_TIP'),
              LangCtrl._L_('IDCS_LOGIN_FAIL_REASON_U_P_ERROR'), function() {
                window.top.MainCtrl.logout();
              }, null, null, 306);
          return false;
        }
      case '536870948':
        window.top.hideLoading();
        if (window.top.MsgBoxHelper) {
          window.top.MsgBoxHelper.Show(
              'info', LangCtrl._L_('IDCS_INFO_TIP'),
              LangCtrl._L_('IDCS_LOGIN_FAIL_REASON_U_P_ERROR'), function() {
                window.top.MainCtrl.logout();
              }, null, null, 306);
          return false;
        }
      case '536870951':
        window.top.hideLoading();
        if (window.top.MsgBoxHelper) {
          window.top.MsgBoxHelper.Show(
              'info', LangCtrl._L_('IDCS_INFO_TIP'),
              LangCtrl._L_('IDCS_LOGIN_FAIL_USER_LOCKED'), function() {
                window.top.MainCtrl.logout();
              }, null, null, 306);
          return false;
        }
    }
  }
  return true;
}

        XmlHttpClient.SendHttpRequest =
            function(options) {
  var settings = $.extend(
      {
        url: '/',
        type: 'POST',
        async: true,
        data: '',
        dataType: 'xml',
        callback: null,
        timeout: null,
        clearXMLHttpRequest: false,
        checkCommonErrorSwitch: true,
        beforeSend: function(xhr) {
          return true;
        },
        error: function(msg) {}
      },
      options);
  var xmlHttp = XmlHttpClient._getXmlHttp();
  var checkTimeOut = null;
  xmlHttp.open(settings.type, settings.url, settings.async);
  if (settings.async) {
    xmlHttp.onreadystatechange = function() {
      if (xmlHttp.readyState == 4) {
        if (checkTimeOut) clearTimeout(checkTimeOut);
        if (xmlHttp.status == 200) {
          if (settings.dataType == 'xml') {
            if (settings.checkCommonErrorSwitch) {
              if (XmlHttpClient.checkCommonError(xmlHttp)) {
                settings.callback(xmlHttp.responseXML);
              }
            } else {
              settings.callback(xmlHttp.responseXML);
            }
          } else
            settings.callback(xmlHttp.responseText);
        } else {
          settings.error('httpStatus:' + xmlHttp.status);
        }
        if (settings.clearXMLHttpRequest) xmlHttp = null;
      }
    }
  }
  xmlHttp.setRequestHeader('If-Modified-Since', '0');
  if (!settings.beforeSend(xmlHttp)) {
    return false;
  }
  xmlHttp.send(settings.data);
  if (settings.timeout) {
    checkTimeOut = setTimeout(sendTimeOut, settings.timeout);
  }
  if (!settings.async) {
    if (checkTimeOut) clearTimeout(checkTimeOut);
    if (settings.dataType == 'xml')
      return settings.callback(xmlHttp.responseXML);
    else
      return settings.callback(xmlHttp.responseText);

    if (settings.clearXMLHttpRequest) xmlHttp = null;
  }

  function sendTimeOut() {
    if (xmlHttp) xmlHttp.abort();
    settings.error('timeout');
  }
}

            // private: xmlhttp factory
            XmlHttpClient._getXmlHttp =
                function() {
  try {
    if (window.ActiveXObject)
      return new ActiveXObject(XmlHttpClient._getXmlHttpProgID());
    if (window.XMLHttpRequest) {
      var req = new XMLHttpRequest();
      // some versions of Moz do not support the readyState property and the
      // onreadystate event so we patch it!
      if (req.readyState == null) {
        req.readyState = 1;
        req.addEventListener('load', function() {
          req.readyState = 4;
          if (typeof req.onreadystatechange == 'function')
            req.onreadystatechange();
        }, false);
      }
      return req;
    }
  } catch (ex) {
  }
  throw new Error('Your browser does not support XmlHttp objects');
} XmlHttpClient._getXmlHttpProgID =
                    function() {
  if (XmlHttpClient._getXmlHttpProgID.progid)
    return XmlHttpClient._getXmlHttpProgID.progid;
  var progids = [
    'Msxml2.XMLHTTP.5.0', 'Msxml2.XMLHTTP.4.0', 'MSXML2.XMLHTTP.3.0',
    'MSXML2.XMLHTTP', 'Microsoft.XMLHTTP'
  ];
  var o;
  for (var i = 0; i < progids.length; i++) {
    try {
      o = new ActiveXObject(progids[i]);
      return XmlHttpClient._getXmlHttpProgID.progid = progids[i];
    } catch (ex) {
    };
  }
  throw new Error('Could not find an installed XML parser');
}

                    XmlHttpClient.BindPageByXml =
                        function(mapping, xmlDoc, formatters, context) {
  if (!context) {
    context = document;
  }

  for (var key in mapping) {
    var element = $('#' + key, context);
    var node;
    var dataType;
    var bind;
    var value = '';

    if (typeof mapping[key] == 'string') {
      node = $(mapping[key], xmlDoc);
      dataType = 'string';
      bind = 'text';
    } else {
      node = $(mapping[key]['path'], xmlDoc);
      dataType = mapping[key]['dataType'];
      if (!dataType) {
        dataType = 'string';
      }
      bind = mapping[key]['bind'];
      if (!bind) {
        bind = 'text';
      }
    }

    if (bind == 'text') {
      value = $.trim(node.text());
    } else if (bind.indexOf('@') == 0) {
      value = $.trim(node.attr(bind.substr(1)));
    }

    if (dataType && dataType.toLowerCase() == 'boolean') {
      if (element.attr('type') == 'checkbox') {
        element.attr('checked', value.toLowerCase() === 'true');
      }
    } else {
      if (formatters && formatters[key]) {
        value = formatters[key].call(element, value);
      }

      if (value !== false) {
        element.val(value);
      }
    }
  }
}

                        XmlHttpClient.GetXmlByPage =
                            function(mapping, xmlDoc, parsers, context) {
  if (!context) {
    context = document;
  }

  for (var key in mapping) {
    var element = $('#' + key, context);
    var node;
    var dataType;
    var bind;
    var value = '';

    if (typeof mapping[key] == 'string') {
      node = $(mapping[key], xmlDoc);
      dataType = 'string';
      bind = 'text';
    } else {
      node = $(mapping[key]['path'], xmlDoc);
      dataType = mapping[key]['dataType'];
      if (!dataType) {
        dataType = 'string';
      }
      bind = mapping[key]['bind'];
      if (!bind) {
        bind = 'text';
      }
    }

    if (dataType && dataType.toLowerCase() == 'boolean') {
      if (element.attr('type') == 'checkbox') {
        value = element.attr('checked') == 'checked' ? 'true' : 'false';
      }
    } else {
      value = element.val();
    }

    if (parsers && parsers[key]) {
      value = parsers[key](element.val());
    }

    if (bind == 'text') {
      if (dataType == 'string') {
        node.empty();
        node.append(xmlDoc.createCDATASection(value));
      } else {
        node.text(value);
      }
    } else if (bind.indexOf('@') == 0) {
      node.attr(bind.substr(1), value);
    }
  }
  return encodeURIComponent(XMLDoc2XMLStr(xmlDoc));
}

                            XmlHttpClient.Verification =
                                function(
                                    elementId, path, xmlDoc, message, context,
                                    offset) {
  if (!context) {
    context = document;
  }

  var element = $('#' + elementId, context);
  var node = $(path, xmlDoc);
  var type = node.attr('type').toLowerCase();
  ClearFloatError();

  var isError = false;
  switch (type) {
    case 'uint16':
      var min = 0;
      var max = 65535;
      var value = element.val() * 1;
      if (isNaN(value) || value < min || value > max) {
        isError = true;
        ShowFloatError(element, message.format(min, max), offset);
      }
      break;
    case 'uint32':
      var min = 0;
      var max = 4294967296;
      var value = element.val() * 1;
      if (isNaN(value) || value < min || value > max) {
        isError = true;
        ShowFloatError(element, message.format(min, max), offset);
      }
      break;
  }
  return isError;
}

function ShowError(elementId, message) {
  var element = $('#' + elementId);
  element.focus();
  if (element.select) {
    element.select();
  }
  var elementTip = $('#' + elementId + '_tip').html(message);
  elementTip.show();
  elementTip.click(function() {
    $(this).html('');
    $(this).hide();
  });
  setTimeout(function() {
    elementTip.html('');
    elementTip.hide();
  }, 5000);
}

function ClearError() {
  $('span.errorTip').html('').hide();
}

/*
 * 浮动错误提示框
 */
function ShowFloatError($element, msg, offset, className) {
  var scrollOffsetElement;
  // 兼容对象化传参
  if (arguments.length == 1) {
    msg = arguments[0].msg;
    offset = arguments[0].offset;
    className = arguments[0].className;
    scrollOffsetElement = arguments[0].scrollOffsetElement;
    $element = arguments[0].element;
  }

  var className = className || 'floadErrorTip';

  if ($element.is(':text') && $element.select) {
    $element.select();
  }
  var errorMsg = $(
      '<div class = "' + className +
      'Div" style = "display:none;"><span class = "' + className +
      '">&nbsp;</span><span class = "floatInfoSpan">' + msg + '</span></div>');
  var scrollTop = 0;
  var scrollLeft = 0;
  if (scrollOffsetElement) {
    scrollTop = scrollOffsetElement.scrollTop();
    scrollLeft = scrollOffsetElement.scrollLeft();
  }
  var position = $element.position();
  errorMsg.css(
      'top',
      position.top + (offset && !isNaN(offset.top) ? offset.top : 0) +
          scrollTop + 'px');
  errorMsg.css(
      'left',
      position.left + 10 + (offset && !isNaN(offset.left) ? offset.left : 0) +
          scrollLeft + $element.width() + 'px');
  errorMsg.appendTo($element.parent());

  errorMsg.css('display', 'inline-block');
  errorMsg.click(function() {
    $(this).remove();
  });
  setTimeout(function() {
    if (errorMsg) {
      errorMsg.fadeOut(3000, function() {
        errorMsg.remove();
      });
    }
  }, 2000);
}

function ClearFloatError(context, className) {
  var className = className || 'floadErrorTip';
  if (!context) {
    context = document;
  }
  $('div.' + className + 'Div', context).remove();
}

/*
获取文本匹配的节点
*/
function getTextMatchNodes($nodes, text) {
  var matchNodes = [];
  $nodes.each(function(e, elem) {
    if ($.trim($(elem).text()) == text) {
      matchNodes.push(elem);
    }
  });
  return matchNodes;
}

/*
自动管理一组元素的相邻边框
*/
function autoBorder($curElement, $elements, options) {
  var curIndex = $curElement ? $elements.index($curElement) : -1;
  var settings = $.extend(
      true, {
        first: {
          'border-top': '1px solid #999999',
          'border-bottom': '1px solid #999999'
        },
        normal: {'border-top': 'none', 'border-bottom': '1px solid #999999'},
        last: {'border-top': 'none', 'border-bottom': '1px solid #999999'}
      },
      options);
  var length = $elements.size();
  $elements.each(function(index, element) {
    var $this = $(this);
    $this.css({
      'border-top': settings
          [index == 0              ? 'first' :
               index == length - 1 ? 'last' :
                                     'normal']['border-top'],
      'border-bottom': settings
          [index == 0              ? 'first' :
               index == length - 1 ? 'last' :
                                     'normal']['border-bottom']
    });
    if (curIndex > -1) {
      switch (index) {
        case curIndex - 1:
          $this.css('border-bottom', 'none');
          break;
        case curIndex:
          $this.css({'border-top': 'none', 'border-bottom': 'none'});
          break;
        case curIndex + 1:
          $this.css('border-top', 'none');
          break;
      }
    }
  });
}

/**
 * 初始化数字输入框
 *
 * @param $textInput 文本框JQuery对象
 * @param options 选项
 */
function initNumberInput($textInput, options) {
  var settings = $.extend(
      {
        maxValue: null,      // 最大值
        minValue: null,      // 最小值
        enableEmpty: false,  // 是否允许空值
        context: document,   // 上下文环境
        onInput: null,  // 代码改变文本框的值，不会触发oninput事件，这里作为补充
        onFixedEvent:
            null  // 修正处理函数，在修正值之后触发，为了解决和其他控件的blur事件冲突，可以在最后修正值之后再根据正确的值做一些处理
      },
      options);

  $textInput.data('initNumberInput_settings', settings);

  $textInput.unbind('keydown', _initNumberInput_keydown)
      .keydown(_initNumberInput_keydown)
      .unbind('blur', _initNumberInput_blur)
      .blur(_initNumberInput_blur);
}

function _initNumberInput_keydown(event) {
  var settings = $(this).data('initNumberInput_settings');
  var keyCode = event.which;

  if (
      keyCode == 9      // Tab
      || keyCode == 16  // Shift
      || keyCode == 17  // Ctrl
      || keyCode == 18  // Alt
      || keyCode == 35  // End
      || keyCode == 36  // Home
      || keyCode == 37  // 向左
      || keyCode == 39  // 向右
      || keyCode == 13  // 回车
      || keyCode == 8   // 退格
      || keyCode == 46  // 删除
  ) {
    return true;
  }

  if (keyCode == 32) {  // 空格
    return false;
  }

  var range = getSelectRange(this, settings.context);
  var $this = $(this);
  var oldText = $this.val();
  var startIndex = range.start;
  var endIndex = range.end;
  var letter = String.fromCharCode(keyCode);
  var posIndex = endIndex + 1;

  if (keyCode >= 96 && keyCode <= 105) {  // 数字小键盘
    letter = String.fromCharCode(keyCode - 48);
  }
  if (keyCode == 38) {  // 向上
    if (!$.isNumeric(oldText)) {
      return false;
    }
    letter = oldText * 1 + 1 + '';
    posIndex = endIndex;
    startIndex = 0;
    endIndex = letter.length;
  }
  if (keyCode == 40) {  // 向下
    if (!$.isNumeric(oldText)) {
      return false;
    }
    letter = oldText * 1 - 1 + '';
    posIndex = endIndex;
    startIndex = 0;
    endIndex = oldText.length;
  }
  //		if (keyCode == 8) {// 退格
  //			letter = "";
  //			if (startIndex == endIndex) {
  //				startIndex--;
  //			}
  //			posIndex = startIndex;
  //		}
  //		if (keyCode == 46) {// 删除
  //			letter = "";
  //			if (startIndex == endIndex) {
  //				endIndex++;
  //			}
  //			posIndex = startIndex;
  //		}
  var newText =
      oldText.substring(0, startIndex) + letter + oldText.substring(endIndex);

  if (newText == '') {
    if (settings.enableEmpty) {
      $this.val(newText);
      if (typeof settings.onInput == 'function' && oldText != $this.val()) {
        settings.onInput($this.val(), this);
      }
      return false;
    } else {
      $this.val(settings.minValue);
      if (typeof settings.onInput == 'function' && oldText != $this.val()) {
        settings.onInput($this.val(), this);
      }
    }
  }

  if ($.isNumeric(newText) && !/^0\d+$/.test(newText)) {
    if (((settings.minValue || settings.minValue === 0) &&
         newText * 1 < settings.minValue && keyCode == 40) ||
        ((settings.maxValue || settings.maxValue === 0) &&
         newText * 1 > settings.maxValue)) {
      return false;
    }
    $this.val(newText);
    setSelectRange(this, posIndex, posIndex, settings.context);
    if (typeof settings.onInput == 'function' && oldText != $this.val()) {
      settings.onInput($this.val(), this);
    }
  }
  return false;
}

function _initNumberInput_blur(event) {
  var settings = $(this).data('initNumberInput_settings');
  var value = $(this).val();
  var isFixed = false;
  if (value == '') {
    if (settings.enableEmpty) {
    } else {
      $(this).val(settings.minValue);
      isFixed = true;
    }
  } else if ($(this).val() * 1 < settings.minValue) {
    $(this).val(settings.minValue);
    isFixed = true;
  }
  if (isFixed && settings.onFixedEvent) {
    settings.onFixedEvent($(this).val(), this);
  }
}

/**
 * 初始化字符串输入框
 *
 * @param $textInput 文本框JQuery对象
 * @param options 选项
 */
function initStringInput($textInput, options) {
  var settings = $.extend(
      {
        maxLeng: null,     // 最大字节长度
        context: document  // 上下文环境
      },
      options);

  $textInput.data('initStringInput_settings', settings);

  $textInput.attr('maxlength', settings.maxLeng);
  $textInput.unbind('keyup', _initStringInput_keyup)
      .keyup(_initStringInput_keyup)
      .unbind('blur', _initStringInput_blur)
      .blur(_initStringInput_blur);
}

function _initStringInput_keyup(event) {
  var $this = $(this);
  var text = $this.val();
  var settings = $this.data('initStringInput_settings');
  if (text.getBytesLength() > settings.maxLeng) {
    var newText = cut_str_utf8_byte(text, settings.maxLeng);
    $this.val(newText);
  }
}

function _initStringInput_blur(event) {
  var $this = $(this);
  var settings = $this.data('initStringInput_settings');
  var newText = cut_str_utf8_byte($this.val(), settings.maxLeng);
  $this.val(newText);
}

/*
初始化名称用户名输入框
规则：
	有效输入字母、数字、下划线、中划线、空格
	不支持前后空格，中间可以有空格
	允许的最大长度60
	不允许空
*/
function initUserNameInput($textInput, options) {
  var settings = $.extend(
      {
        maxLeng: 60,       // 最大字节长度
        context: document  // 上下文环境
      },
      options);

  $textInput.data('initUserNameInput_settings', settings);
  $textInput.attr('maxlength', settings.maxLeng);
  $textInput.unbind('keyup', _initUserNameInput_keyup)
      .keyup(_initUserNameInput_keyup)
      .unbind('blur', _initUserNameInput_blur)
      .blur(_initUserNameInput_blur);
}

// function _initUserNameInput_keydown(e) {
//	var keyCode = GetKeyCode(e);
//	e = e ? e : window.event;
//	return keyCode >= 48 && keyCode <= 57 //数字0-9
//	|| keyCode >= 96 && keyCode <= 105  //小键盘数字0-9
//	|| keyCode == 46 //Delete
//	|| keyCode == 8 //BackSpace
//	|| keyCode == 9 //Tab
//	|| keyCode == 16 // Shift
//	|| keyCode == 17// Ctrl
//	|| keyCode == 18// Alt
//	|| keyCode == 32// 空格
//	|| keyCode == 35// End
//	|| keyCode == 36// Home
//	|| keyCode == 37// 向左
//	|| keyCode == 39// 向右
//	|| keyCode == 13// 回车
//	|| keyCode >= 65 && keyCode <= 90;//A-Z
// }

function _initUserNameInput_keyup(event) {
  var $this = $(this);
  var text = $this.val().replace(/[^ A-Za-z0-9_-]+/g, '');
  var settings = $this.data('initUserNameInput_settings');
  if (text.getBytesLength() > settings.maxLeng) {
    text = cut_str_utf8_byte(text, settings.maxLeng);
  }
  $this.val(text);
}

function _initUserNameInput_blur(event) {
  var $this = $(this);
  $this.val($.trim($this.val().replace(/[^ A-Za-z0-9_-]+/g, '')));
  var newText = cut_str_utf8_byte(
      $this.val(), $this.data('initUserNameInput_settings').maxLeng);
  $this.val(newText);
}

function checkUserName(value) {
  var re = /^[ A-Za-z0-9_-]*$/g;  // 匹配用户名的正则表达式
  if (re.test(value)) {
    return true;
  } else {
    return false;
  }
}

/*
初始化密码输入框
规则：
	有效输入字母、数字
	不允许空
	最大长度16
*/
function initPwdInput($textInput, options) {
  var settings = $.extend(
      {
        maxLeng: 16,       // 最大字节长度
        context: document  // 上下文环境
      },
      options);

  $textInput.attr('maxlength', settings.maxLeng);
  $textInput.unbind('keydown', _initPwdInput_keydown)
      .keydown(_initPwdInput_keydown);
}

function _initPwdInput_keydown(e) {
  var keyCode = GetKeyCode(e);
  e = e ? e : window.event;
  return keyCode >= 48 && keyCode <= 57   // 数字0-9
      || keyCode >= 96 && keyCode <= 105  // 小键盘数字0-9
      || keyCode == 46                    // Delete
      || keyCode == 8                     // BackSpace
      || keyCode == 9                     // Tab
      || keyCode == 35                    // End
      || keyCode == 36                    // Home
      || keyCode == 37                    // 向左
      || keyCode == 39                    // 向右
      || keyCode == 13                    // 回车
      || keyCode >= 65 && keyCode <= 90;  // A-Z
}

function checkPwd(value) {
  var re = /^[A-Za-z0-9]*$/g;  // 匹配密码的正则表达式
  if (re.test(value)) {
    return true;
  } else {
    return false;
  }
}

/*
Email合法性验证
规则：
	必须有@
	@前后字符串都不能为空
	有效输入字母、数字、下划线、中划线、点。
	最大长度60
	不允许为空
*/
function initEmailInput($textInput, options) {
  var settings = $.extend(
      {
        maxLeng: 60,       // 最大字节长度
        context: document  // 上下文环境
      },
      options);

  $textInput.data('initEmaiInput_settings', settings);
  $textInput.attr('maxlength', settings.maxLeng);
  $textInput.unbind('keyup', _initEmailInput_keyup)
      .keyup(_initEmailInput_keyup)
      .unbind('blur', _initEmailInput_blur)
      .blur(_initEmailInput_blur);
}

function _initEmailInput_keyup(event) {
  var $this = $(this);
  var text = $this.val();
  var settings = $this.data('initEmaiInput_settings');
  if (text.getBytesLength() > settings.maxLeng) {
    text = cut_str_utf8_byte(text, settings.maxLeng);
  }
  $this.val(text);
}

function _initEmailInput_blur(event) {
  var $this = $(this);
  var newText = cut_str_utf8_byte(
      $.trim($this.val()), $this.data('initEmaiInput_settings').maxLeng);
  $this.val(newText);
}

function CheckEmail(strEmail) {
  //	var re = /^[.A-Za-z0-9_-]+@[.A-Za-z0-9_-]+$/g; //匹配IEmail的正则表达式
  var re = /^[\-\_\w]+(\.[\-\_\w]+)*@[\-\_\w]+(\.[\-\_\w]+)+$/g;
  if (re.test(strEmail))
    return true;
  else
    return false;
}

/*
通道名称、预置点、巡航线、权限组名等
规则：
	前后不允许空格
	有效符号下划线、中划线、空格
	支持所有字符
	不允许空
	最大长度60
*/
function initNameInput($textInput, options) {
  var settings = $.extend(
      {
        maxLeng: 60,       // 最大字节长度
        context: document  // 上下文环境
      },
      options);

  $textInput.data('initNameInput_settings', settings);
  $textInput.attr('maxlength', settings.maxLeng);
  $textInput.unbind('keyup', _initNameInput_keyup)
      .keyup(_initNameInput_keyup)
      .unbind('blur', _initNameInput_blur)
      .blur(_initNameInput_blur);
}

function _initNameInput_keyup(event) {
  var $this = $(this);
  var text = $this.val();
  var settings = $this.data('initNameInput_settings');
  if (text.getBytesLength() > settings.maxLeng) {
    text = cut_str_utf8_byte(text, settings.maxLeng);
  }
  $this.val(text);
}

function _initNameInput_blur(event) {
  var $this = $(this);
  var newText = cut_str_utf8_byte(
      $.trim($this.val()), $this.data('initNameInput_settings').maxLeng);
  $this.val(newText);
}

function checkName(value) {
  return true;
  //	var re = /^[.A-Za-z0-9_-]*$/g; //匹配IEmail的正则表达式
  //	if (re.test(value)) {
  //		return true;
  //	}
  //	else {
  //		return false;
  //	}
}

/*
初始化域名输入框
规则：
	有效输入字母、数字、下划线、中划线、点。
	最大长度60
	不允许为空
*/
function initDomainInput($textInput, options) {
  var settings = $.extend(
      {
        maxLeng: 60,       // 最大字节长度
        context: document  // 上下文环境
      },
      options);

  $textInput.data('initDomainInput_settings', settings);
  $textInput.attr('maxlength', settings.maxLeng);
  $textInput.unbind('keyup', _initDomainInput_keyup)
      .keyup(_initDomainInput_keyup)
      .unbind('blur', _initDomainInput_blur)
      .blur(_initDomainInput_blur);
}

function _initDomainInput_keyup(event) {
  var $this = $(this);
  var text = $this.val().replace(/[^.A-Za-z0-9_-]+/g, '');
  var settings = $this.data('initDomainInput_settings');
  if (text.getBytesLength() > settings.maxLeng) {
    text = cut_str_utf8_byte(text, settings.maxLeng);
  }
  $this.val(text);
}

function _initDomainInput_blur(event) {
  var $this = $(this);
  $this.val($.trim($this.val().replace(/[^.A-Za-z0-9_-]+/g, '')));
  var newText = cut_str_utf8_byte(
      $this.val(), $this.data('initDomainInput_settings').maxLeng);
  $this.val(newText);
}

function CheckDomain(strEmail) {
  var re = /^[.A-Za-z0-9_-]*$/g;  // 匹配IEmail的正则表达式
  if (re.test(strEmail))
    return true;
  else
    return false;
}


/*
获取选中区间
*/
function getSelectRange(textControl, context) {
  var range = {};
  if (!context) {
    context = document;
  }
  if (context.selection) {
    if (textControl.tagName != undefined && textControl.tagName == 'INPUT') {
      var selectionRange = context.selection.createRange();
      var textControlRange = textControl.createTextRange();
      range.text = selectionRange.text;
      var oldLength = range.text.length;
      selectionRange.setEndPoint('EndToStart', textControlRange);
      var newLength = selectionRange.text.length;
      range.start = newLength;
      range.end = newLength + oldLength;
    }
  } else {
    range.start = textControl.selectionStart;
    range.end = textControl.selectionEnd;
    range.text = textControl.value.substring(range.start, range.end);
  }
  return range;
}

/*
设置选中区间
*/
function setSelectRange(textControl, startIndex, endIndex, context) {
  if (!context) {
    context = document;
  }
  if (context.selection) {
    var range = textControl.createTextRange();
    range.collapse(true);
    range.moveStart('character', startIndex);
    range.moveEnd('character', endIndex - startIndex);
    range.select();
  } else {
    textControl.setSelectionRange(startIndex, endIndex);
    textControl.focus();
  }
}

/*
时间字符串转【单位】数
参数：timeStr: 00:00:00
返回：int
*/
function time2UnitValue(timeStr, unit) {
  var timeArr =
      timeStr.match(/^(2[0-3]|[01]?[0-9]):([0-5]?[0-9]):([0-5]?[0-9])$/);
  if (timeArr && timeArr.length == 4) {
    if (unit == 'ms') {
      return timeArr[1] * 60 * 60 * 1000 + timeArr[2] * 60 * 1000 +
          timeArr[3] * 1000;
    } else if (unit == 's') {
      return timeArr[1] * 60 * 60 + timeArr[2] * 60 + timeArr[3] * 1;
    }
  }
  return 0;
}

function getShortString(str, len) {
  return str.length > len ? str.substr(0, len) + '...' : str;
}

// 禁用菜单链接
function disableMenu(menuIds) {
  if (typeof menuIds == 'string') {
    menuIds = [menuIds];
  }

  $($.map(
         menuIds,
         function(element) {
           return '[menu_id="' + element + '"]';
         })
        .join(','))
      .addClass('disabled')
      .unbind('click')
      .click(function(event) {
        event.stopPropagation();
      })
      .prev('.subSp')
      .addClass('disabled')
      .end()
      .filter('a')
      .attr({href: 'javascript:void(0);', hidefocus: true});
}

// 判断所有模块异步调用是否完毕
function callbackAllComplete(modules, key) {
  if (!key) {
    key = 'callbackComplete';
  }
  var callbackComplete = true;
  $.each(modules, function(index, element) {
    callbackComplete = callbackComplete && element[key];
  });
  if (callbackComplete) {
    $.each(modules, function(index, element) {
      element[key] = false;
    });
  }
  return callbackComplete;
}

// 用实体替换特殊字符
function replaceWithEntity(str) {
  str = '' + str;  // 参数必须转换为字符串，否则可能会报错
  var entityList = [
    {ch: '&', entity: '&amp;'}, {ch: '<', entity: '&lt;'},
    {ch: '>', entity: '&gt;'}, {ch: '"', entity: '&quot;'}
  ];
  $.each(entityList, function(index, element) {
    str = str.replace(new RegExp(element.ch, 'g'), element.entity);
  });
  return str;
}

/* 获取推荐的比特率范围
   参数：options: {
      resolution: {
             width: 1920,
                 height: 1080
      },
          level: "highest",
          fps: 25,
          maxQoI: 10240
   }
*/
function getBitrateRange(options) {
  // 计算分辨率对应参数
  var resolution = options['resolution'];
  if (typeof resolution == 'string') {
    var resParts = resolution.split('x');
    resolution = {width: resParts[0] * 1, height: resParts[1] * 1};
  }
  var resolution = resolution['width'] * resolution['height'];
  if (!resolution) {
    return null;
  }
  var resParam =
      Math.floor(resolution / (resolution >= 1920 * 1080 ? 200000 : 150000));
  if (!resParam) {
    resParam = 0.5;
  }

  // 计算图像质量对应参数
  var levelParamMapping =
      {highest: 100, higher: 67, medium: 50, lower: 34, lowest: 25};
  var levelParam = levelParamMapping[options['level']];
  if (!levelParam) {
    return null;
  }

  // 根据帧率使用不同公式计算下限和上限
  var minBase = 768 * resParam * levelParam *
      (options['fps'] >= 10 ? options['fps'] : 10) / 3000;
  var min = Math.floor(
      minBase -
      (options['fps'] >= 10 ? 0 : (10 - options['fps']) * minBase * 2 / 27));
  var maxBase = 1280 * resParam * levelParam *
      (options['fps'] >= 10 ? options['fps'] : 10) / 3000;
  var max = Math.floor(
      maxBase -
      (options['fps'] >= 10 ? 0 : (10 - options['fps']) * maxBase * 2 / 27));
  if (!min || !max) {
    return null;
  }

  return {
    min: options['maxQoI'] ? options['maxQoI'] < min ? options['maxQoI'] : min :
                             min,
    max: max
  };
}

// 检测客户端操作系统
function detectOS() {
  var platform = navigator.platform.toLowerCase();
  var isWin =
      (platform == 'win32') || (platform == 'win64') || (platform == 'windows');
  if (isWin) return 'windows';
  var isMac = (platform == 'mac68k') || (platform == 'macppc') ||
      (platform == 'macintosh') || (platform == 'macintel');
  if (isMac) return 'mac';
  var isUnix = (platform == 'x11') && !isWin && !isMac;
  if (isUnix) return 'unix';
  var isLinux = (String(platform).indexOf('linux') > -1);
  if (isLinux) return 'linux';
  return 'unknow';
}

// 检测客户端浏览器类型
function detectBrowser() {
  var userAgent = navigator.userAgent.toLowerCase();
  // 兼容IE11，部分IE11没有msie字符串
  if (/msie/i.test(userAgent) ||
      (userAgent.indexOf('trident') > -1 && userAgent.indexOf('rv') > -1)) {
    return 'ie';
  } else if (/firefox/i.test(userAgent)) {
    return 'firefox';
  } else if (/chrome/i.test(userAgent)) {
    return 'chrome';
  } else if (/opera/i.test(userAgent)) {
    return 'opera';
  } else if (/webkit/i.test(userAgent)) {
    return 'safari';
  } else {
    return 'unknow';
  }
}