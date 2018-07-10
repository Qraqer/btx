$(function () {

    window.showPhone = function(block, id) {
        var $phoneDiv = $('[data-phone="' + id + '"]');
        $phoneDiv.find('button').remove();
        $phoneDiv.find('span').html(window.phones[block][id]);
    }
});