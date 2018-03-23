"use strict"
var core = (function(){
    var self = {}
    self.init = function () {
        $('*[data-mask=phone]').mask('(99) 99999-9999', {placeholder: "(__) _____-____"});
    }
    return self;
}());

$(document).ready(function() {
    core.init();
    contacts.init();
    contacts.get();
});