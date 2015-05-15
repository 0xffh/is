$(document).ready(function() {
    var modal =$('#preview-modal');    
    modal.find('input[type=submit]').click(function() {        
        $(this).parents('form').submit();
    });
    
    $('.make-preview').click(function() {
        modal.modal('show');
    });
    
    modal.find('img.target').Jcrop({
        aspectRatio : 9 / 10,
        minSize : typeof globalVars.minSize === undefined ? false : globalVars.minSize,
        maxSize : typeof globalVars.maxSize === undefined ? false : globalVars.maxSize,
        onSelect : function(coords) {
            var form = modal.find('.upload');
            form.find('input[name=x]').val(coords.x);
            form.find('input[name=y]').val(coords.y);
            form.find('input[name=w]').val(coords.w);
            form.find('input[name=h]').val(coords.h);
        }
    });
});