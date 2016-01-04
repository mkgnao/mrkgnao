var supports = {};
var style = document.body.style;


var flexbox = function() {
  return supports.flexbox || (supports.flexbox = ('flexBasis' in style ||
      'msFlexAlign' in style || 'webkitBoxDirection' in style));
};

// Add an `is-legacy` class on browsers that don't supports flexbox.
if (!flexbox()) {
  var div = document.createElement('div');
  div.className = 'Error';
  div.innerHTML = `Your browser does not support Flexbox.
                   Parts of this site may not appear as expected.`;

  document.body.insertBefore(div, document.body.firstChild);
}
