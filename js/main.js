"use strict"
var core = (function(){
    var self = {}
    self.init = function () {
    }
    return self;
}());

$(document).ready(function() {
    core.init();
    contacts.init();
    contacts.get();
});