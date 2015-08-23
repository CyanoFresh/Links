/**
 * Site.js - Main JS of the site
 * @author Alex Solomaha <cyanofresh@gmail.com>
 */

var $form = $('#form');
var $resultElement = $('textarea#result');
var $copyButton = $('#copyButton');

$form.on('beforeSubmit', function () {
    $.post($form.attr('action'), $form.serialize(), function (data) {
        // Save shortened URL to the HTML
        $resultElement.html(data.shortUrl);
        // Show result card
        $('.hidden').removeClass('hidden');
        // Select result
        $resultElement.select();
    }, 'json');

    return false;
});

$copyButton.on('click', function () {
    // Select result
    $resultElement.select();
    // Copy selected
    document.execCommand('copy');
});