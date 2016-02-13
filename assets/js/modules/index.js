"use strict";

var thisNewFunc = (function() {

	var fn = function() {
		console.log("test");
	};

	return {
		fn:fn
	};

})();

module.exports = thisNewFunc;
