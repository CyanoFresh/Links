/**
 * Site.js - Main JS of the site
 * @author Alex Solomaha <cyanofresh@gmail.com>
 */
$('#shareModal').modal('show');
var $form = $('#form');
var $formSpinner = $('#loadingSpinner');
var $resultElement = $('textarea#result');
var $resultSection = $('#result-section');
var $copyButton = $('#copyButton');
var $shareButton = $('#shareButton');

$form.on('beforeSubmit', function () {
    // Make loading spinner visible
    $formSpinner.addClass('is-active');

    // Ajax post request
    $.post($form.attr('action'), $form.serialize(), 'json')
        .success(function (data) {
            // Save shortened URL to the HTML
            $resultElement.html(data.shortUrl);
            // Show result card
            $resultSection.removeClass('hidden');
            // Select result
            $resultElement.select();
            // Stop loading spinner
            $formSpinner.removeClass('is-active');
        });

    return false;
});

// Bind copy event
$copyButton.on('click', function () {
    // Select result
    $resultElement.select();
    // Copy selected
    document.execCommand('copy');
});

// Bind share event
$shareButton.on('click', function () {
    // Show modal
    $('#shareModal').modal('show');
});