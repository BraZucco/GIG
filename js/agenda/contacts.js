"use strict"

var contacts = (function() {
    var self = {}, cardTemplate;
    self.contactsData = [];

    self.init = function() {
        $('#frm-add-contact').on('submit', function(e) {
            e.preventDefault();
            var frm = $(this), sendDataSTR, sendDataOBJ, sendType;
            sendDataSTR = self.parseForm(frm);
            sendDataOBJ = JSON.parse(sendDataSTR);
            console.log(sendDataOBJ.id);
            sendType = (sendDataOBJ.id != '') ? 'put' : 'post';
            $.ajax({
                url: "/testemadeira/contacts/" + sendDataOBJ.id,
                type:sendType,
                dataType: 'json',
                data: sendDataSTR
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
            var editID = $(this).closest('.ctn-card').attr('data-contact-id'),
            contact = self.contactsData[editID];
            $('#frm-add-contact input[name=id]').val(contact.id);
            $('#frm-add-contact input[name=nome]').val(contact.nome);
            $('#frm-add-contact input[name=phone]').val(contact.phone);
            $('#frm-add-contact input[name=age]').val(contact.age);
            $('#frm-add-contact input[name=email]').val(contact.email);
            $('#mdl-add-contact').modal('show');
            /*
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
            */
        });
        $('#mdl-add-contact').bind('hidden.bs.modal', function () {
            $('#frm-add-contact input[name=id]').val('');
            $(this).find('form')[0].reset();
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
            self.contactsData = data;
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