<?php
/**
 * Created by PhpStorm.
 * User: green
 * Date: 10/16/14
 * Time: 9:32 PM
 */
?>

<link rel="stylesheet" type="text/css" href="css/style.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>

<form enctype="multipart/form-data" action="files.php" method="post">

    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
    <input name="userFile[]" type="file" multiple class="files" /><br />
    <input name="userFile[]" type="file" multiple class="files" /><br />
    <input name="userFile[]" type="file" multiple class="files" /><br />

    <div class="progress">
        <div class="bar"></div>
        <div class="percent">0%</div>
    </div>

    <br />
    <input type="submit" value="Send" name="submit" onclick="javascript:void(0)" />
    <input type="reset" value="Reset" onclick="$('.bar').css('width', '0'); $('.percent').html('0%'); $('#status').html('');" />
</form>

<div id="status"></div>

<script>
    (function() {
        var bar = $('.bar');
        var percent = $('.percent');
        var status = $('#status');
        var file = $('.files');

        $('form').ajaxForm({
            beforeSend: function() {
                status.empty();
                var percentVal = '0%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            uploadProgress: function(event, position, total, percentComplete) {
                if(file.val() != "") {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                }
            },
            success: function() {
                if(file.val() != "") {
                    var percentVal = '100%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                }
            },
            complete: function(xhr) {
                status.html(xhr.responseText);
            }
        });
    })();
</script>
