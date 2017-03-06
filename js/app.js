;(function($){
    $( "#datepicker" ).datepicker({
        dateFormat: "yy-mm-dd",
        onSelect: function(datetext){
            var d = new Date(); // for now
            datetext=datetext+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
            $('#datepicker').val(datetext);
        },
    });
    $(".delete_item").confirmModal();
})(jQuery)