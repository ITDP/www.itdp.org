//KELL Validation
// v 1.27.1
var kellValdiationVersion = 1.27;
//place immediately after jquery library import
var j$ = jQuery.noConflict();

var formOkToSubmit = false;
j$(document).ready(function() {//assign event handler to required fields  
    j$('form.doValidate .required').change(function() {
        CheckField(this);
    });
    UpdateStates();
    CheckMode();
    // append a notice if In Test mode.
    if (j$('#OrderMode').val() == "Test") {
        j$('#SubmitButton').parent().prepend('<div class="formNotice" style="border-radius:5px;padding:1em; color:#837;display:inline-block;position:relative;z-index:1000;background:orange;font-weight:bold;">This Form is in TEST mode. Only the 4111 Credit Card will be processed.</div>');
    }
});
function setFormTarget(tgt) {
    j$(tgt + ' .required').change(function() {
        CheckField(this);
    });
}
function autoFader(sender, targetId) {
    if (j$(sender).val().trim() != '') {
        j$('#' + targetId).fadeIn(200);
    } else {
        j$('#' + targetId).fadeOut(200);
    }
}
function checkForm() {
    j$("input:radio[name=UnitPrice1]").parent().removeClass("inError");
    j$("#Other1").removeClass("inError");
    formOkToSubmit = true;
    CleanNumberOnlyFields();
    j$('form.doValidate .required').each(function(index) {
        if (!CheckField(this)) {
            formOkToSubmit = false;
            j$('.formNotice').show();
            setTimeout("j$('.formNotice').fadeOut(1000);", 6000);
        }
    });
    if (j$("form.doValidate input:radio[name=UnitPrice1]").length === 0){
        // Nonstandard Form.        
        if (j$("form.doValidate input[name=UnitPrice1]").length === 1){
             if (j$("form.doValidate input[name=UnitPrice1]").val() == 'Other'){
                if (isNaN(j$("form.doValidate input[name=Other1]").val())) {
                    j$("form.doValidate input[name=Other1]").addClass("inError");
                    formOkToSubmit = false;
                }
             }else{
               if (j$("form.doValidate input[name=UnitPrice1]").val().trim() === ''){
                   if(j$("input[name=UnitPrice1]").attr('type') != 'hidden'){
                        j$("form.doValidate input[name=UnitPrice1]").addClass("inError");
                    }else{
                        alert('Please enter a valid amount.');
                    }
                   formOkToSubmit = false;
               }else{
                   //make sure we're a valid positive amount
                   if (j$("form.doValidate input[name=UnitPrice1]").val() <= 0){
                       if(j$("input[name=UnitPrice1]").attr('type') != 'hidden'){
                        j$("form.doValidate input[name=UnitPrice1]").addClass("inError");
                    }else{
                        alert('Please enter a valid amount.');
                    }
                   formOkToSubmit = false;
                   } 
               } 
             }
        }else{ // no Amount field present... alert general error.
            alert('Please Select an amount.');
        }
    }else{ // we do have the standard Radio Buttons to check against    
        if (j$("form.doValidate input:radio[name=UnitPrice1]:checked").val() === "Other") {
            if (isNaN(j$("#Other1").val())) {
                j$("#Other1").addClass("inError");
                formOkToSubmit = false;
            }
        } else {
            if (j$("form.doValidate input:radio[name=UnitPrice1]:checked").length > 0) { //if we have a radio button
                if (isNaN(j$("form.doValidate input:radio[name=UnitPrice1]:checked").val())) {
                    j$("form.doValidate input:radio[name=UnitPrice1]").parent().addClass("inError");
                    formOkToSubmit = false;
                }//else it's a number and that's ok
            }else{
                // no radio selected
                 j$("form.doValidate input:radio[name=UnitPrice1]").parent().addClass("inError");
                 formOkToSubmit = false;
            }
        }
    }
    if (formOkToSubmit) {
        j$('form.doValidate').submit();
    }
}
/**
 * checks to see if the page was passed test=yes and if so switches form into test mode.
 * @returns null
 */
function CheckMode() {
    var prmstr = window.location.search.substr(1);
    var prmarr = prmstr.split("&");
    var params = {};

    for (var i = 0; i < prmarr.length; i++) {
        var tmparr = prmarr[i].split("=");
        params[tmparr[0]] = tmparr[1];
    }
    if (params.test == "true") {
        j$("#Cvv2").val('123');
        j$("#NameOnCard").val('John Smith');
        j$("#CardNumber").val('4111111111111111');
        j$("#ExpirationMonth").val('12');
        j$("#ExpirationYear").val('15');
        j$("#OrderMode").val('Test');

    }
}
function ClearError(target) {
    j$(target).removeClass('inError');
}
function ClearText(target) {
    j$('#' + target).val('');
}
function CleanNumberOnlyFields() {
    j$('input.numberOnly').each(function(index) {       
        var bOk = true;
        if(this.name === "BillingPostalCode"){
            if (j$('select[name="BillingCountryCode"]').val() != 840){
                bOk = false;
            }
        }
        if (bOk){
            j$(this).val(j$(this).val().replace(/[^\d.]/g, ''));
        }
    });
}
function CloneBlockToTarget(targetId, blockId) {
    j$('#' + targetId).html(j$('#' + blockId).html());
}
function CheckField(target) {
    var response = true;
    if (j$(target).hasClass('required')) {
        if (j$(target).hasClass('email')) {
            if (!isValidEmailAddress(j$.trim(j$(target).val()))) {
                SetError(target);
                response = false;
            } else {
                ClearError(target);
            }
        } else {
            if ((j$.trim(j$(target).val()) == "") || (j$.trim(j$(target).val()) == "--NA")) {
                SetError(target);
                response = false;
            } else {

                ClearError(target);
            }
        }
    }
    return response;
}
;
function IsNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
}
;
function SetError(target) {
    j$(target).addClass('inError');
}
;
function UpdateStates() {
    if (j$('#BillingCountryCode').val() == 840) {
        MakeStateDropdown("State");
        j$('#BillingStateProvince').html(j$('#usStates').html());

    } else {
        if (j$('#BillingCountryCode').val() == 124) {
            MakeStateDropdown("Province");
            j$('#BillingStateProvince').html(j$('#canadianProvinces').html());
        } else {
            MakeStateOther()
            // j$('#BillingStateProvince').html(j$('#otherStates').html());
        }
    }
    SetPostalReq();  // update the postal /zip as well.
}
function MakeStateDropdown(labelName) {
    var p = j$('#BillingStateProvince').parent();
    j$(p).html('<label for="BillingStateProvince" class="editable">' + labelName + ':</label>');
    j$(p).append('<select name="BillingStateProvince" class="required" size="1" onChange="CheckField(this);" id="BillingStateProvince" ></select>*');
}
/***
 * 
 * @returns {}
 */
function MakeStateOther() {
    var p = j$('#BillingStateProvince').parent();
    j$(p).html('<label for="BillingStateProvince" class="editable">State / Province:</label>');
    j$(p).append('<input type="text" name="BillingStateProvince" id="BillingStateProvince" />');
}
/**
 * Sets the zip/postal code as required for US & Canada
 * @returns {}
 */
function SetPostalReq() {
    if ((j$('#BillingCountryCode').val() == '840') || (j$('#BillingCountryCode').val() == '124')) {
        j$('#BillingPostalCode').addClass('required');
        j$('#BillingPostalCodeIndicator').show();
    } else {
        j$('#BillingPostalCode').removeClass('required');
        j$('#BillingPostalCode').removeClass('inError');
        j$('#BillingPostalCodeIndicator').hide();

    }
}
function ShowBlock(id, target) {
    if (j$('#' + id).prop('checked')) {
        j$("#" + target).fadeIn(200);
    } else {
        j$("#" + target).fadeOut(200);

    }
}
function ShowSelectedBlock(id, target) {
    if (j$('#' + id).val() != '') {
        j$("#" + target).fadeIn(200);
    } else {
        j$("#" + target).fadeOut(200);
    }
}
function ShowSelectedBlock(id, target, clear) {
    if (j$('#' + id).val() != '') {
        j$("#" + target).fadeIn(200);
    } else {
        if (clear) {
            j$("#" + target + " input").each(function() {
                j$(this).val('');
            });
        }
        j$("#" + target).fadeOut(200);
    }
}
function HideBlock(id, target) {
    if (j$('#' + id).prop('checked')) {
        j$("#" + target).fadeOut(200);

    } else {
        j$("#" + target).fadeIn(200);
    }
}
function SetRadio(name, newVal) {
    var radios = j$('input:radio[name=' + name + ']');
    radios.filter('[value=' + newVal + ']').prop('checked', true);
}