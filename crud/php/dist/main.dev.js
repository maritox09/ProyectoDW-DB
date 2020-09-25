"use strict";

$(".btnedit").click(function (e) {
  var x = display(e);
  var id = $("input[name*='id']");
  var nombre = $("input[name*='nombre']");
  var cantidad = $("input[name*='cantidad']");
  id.val(x[0]);
  nombre.val(x[1]);
  cantidad.val(x[2]);
});

function display(e) {
  var id = 0;
  var td = $("#tbody tr td");
  var valores = [];
  var _iteratorNormalCompletion = true;
  var _didIteratorError = false;
  var _iteratorError = undefined;

  try {
    for (var _iterator = td[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
      var valor = _step.value;

      if (valor.dataset.id == e.target.dataset.id) {
        valores[id++] = valor.textContent;
      }
    }
  } catch (err) {
    _didIteratorError = true;
    _iteratorError = err;
  } finally {
    try {
      if (!_iteratorNormalCompletion && _iterator["return"] != null) {
        _iterator["return"]();
      }
    } finally {
      if (_didIteratorError) {
        throw _iteratorError;
      }
    }
  }

  return valores;
}