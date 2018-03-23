"use strict"

var contacts = (function() {
    var self = {}, cardTemplate;

    self.init = function() {
        $('#frm-add-contact').on('submit', function(e) {
            e.preventDefault();
            var frm = $(this);
            $.ajax({
                url: "/testemadeira/contacts",
                type:'post',
                dataType: 'json',
                data: self.parseForm(frm)
            }).done(function() {
                $('#mdl-add-contact').modal('hide');
                frm[0].reset();
                self.clear();
                self.get();
            }).fail(function() {
                alert( "error" );
            });
            return false;
        });
        $('#lst-contacts').on('click', '.btn-delete', function(e) {
            //alert($(this).closest('.ctn-card').attr('data-contact-id'));
            $.ajax({
                url: "/testemadeira/contacts/" + $(this).closest('.ctn-card').attr('data-contact-id'),
                type:'delete',
                dataType: 'json'
            }).done(function() {
                self.clear();
                self.get();
            }).fail(function() {
                alert( "error" );
            });
        });

        $('#lst-contacts').on('click', '.btn-edit', function(e) {
            //alert($(this).closest('.ctn-card').attr('data-contact-id'));
            $.ajax({
                url: "/testemadeira/contacts/" + $(this).closest('.ctn-card').attr('data-contact-id'),
                type:'delete',
                dataType: 'json'
            }).done(function() {
                self.clear();
                self.get();
            }).fail(function() {
                alert( "error" );
            });
        });
    }

    self.clear = function () {
        $('#lst-contacts').html('');
    }

    self.get = function() {
        var tpl = $('#tpl-card').text(), tmp, ctnCards = $('#lst-contacts');
        
        $.ajax({
            url: "/testemadeira/contacts",
            context: document.body
        }).done(function(data) {
            for(var contactID in data) {
                if(data[contactID] != null) {
                    tmp = tpl.replace('{{name}}', data[contactID].nome)
                             .replace('{{phone}}', data[contactID].phone)
                             .replace('{{email}}', data[contactID].email)
                             .replace('{{age}}', data[contactID].age)
                             .replace('{{contact-id}}', data[contactID].id);
                    ctnCards.append(tmp);
                }
            }
        });
        
    }

    self.parseForm = function($form){
        var serialized = $form.serializeArray();
        var s = '';
        var data = {};
        for(s in serialized){
            data[serialized[s]['name']] = serialized[s]['value']
        }
        return JSON.stringify(data);
    }

    return self;
}());