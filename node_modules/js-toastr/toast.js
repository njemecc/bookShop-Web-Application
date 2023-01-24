(function(root, factory) {
  if (typeof define === 'function' && define.amd) {
    define([], factory);
  } else if (typeof exports === 'object') {
    module.exports = factory();
  } else {
    root.toastr = factory();
  }
}(this, function() {
  "use strict";
  var toastr = {
    position : 'top-right',
    message: function(text, status, timeout) {
      var status = status || 'success';
      var timeout = timeout || 3000;
      var obj = obj || {};
      var id = document.getElementsByClassName('toast').length;
      var wrapper = document.createElement('div');
      wrapper.classList.add('toast', status);
      var textWrap = document.createElement('span');
      textWrap.classList.add('text');
      textWrap.innerText = text;
      wrapper.appendChild(textWrap);
      var icon = document.createElement('span');
      icon.classList.add('icon');
      icon.innerHTML = this.getIcon(status);
      wrapper.addEventListener('click', function(e) {
        document.getElementById('toast-wrap').removeChild(
          wrapper);
        clearTimeout(obj[id])
      });
      wrapper.appendChild(icon);
      if (document.getElementById('toast-wrap')) {
        document.getElementById('toast-wrap').appendChild(wrapper);
      } else {
        var elem = document.createElement('div');
        elem.id = "toast-wrap";
        elem.classList.add('toast-wrap',this.position)
        elem.appendChild(wrapper);
        document.body.appendChild(elem);
      }
      obj[id] = setTimeout(function() {
        document.getElementById('toast-wrap').removeChild(
          wrapper);
        if (!document.getElementsByClassName('toast')[0]) {
          obj = undefined;
          document.body.removeChild(document.getElementById(
            "toast-wrap"));
        }
      }, timeout);
    },
    setPosition:function(position){
       this.position = position;
    },
    getIcon: function(status) {
      var icon = '';
      switch (status) {
        case 'success':
          icon = '&#10004;';
          break;
        case 'error':
          icon = '&#x2715;';
          break;
        case 'info':
          icon = '&#8505;';
          break;
        case 'warning':
          icon = '&#9888;';
          break;
      }
      return icon;
    }
  };
  return toastr;
}));