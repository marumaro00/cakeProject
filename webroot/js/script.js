$(document).load(function(){
	function load(container, link)
    {
        $.ajax({
            url : link,
            dataType: 'html',
            async : true,
            success: function(result){
                $(container).html(result);
            }
        });
    };
	$('.btn-edit').click(function(e){
            $('#modal').find('.modal-content').load($(this).attr('href'));
            $('#modal').modal('show');
            return false;
    });
});