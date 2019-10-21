$(document).ready(function() {
    $('#searchBox').on('submit', function(e) {
        var $this = $(this);
        $this.attr('action', $('input[name=action]:checked', $this).val());
    });
    

    //$('.bp-list-item.image a').on('click', function(e) {
        //fenster = window.open($(this).attr('href'), "Image", "width=600,height=700,resizable=yes,scrollbars=yes");
        //fenster.focus();
        //e.preventDefault();
    //});
    
    $('.tx-bluhmpresse .f3-widget-paginator').each(function(i) {
        var $this = $(this);
        if($('li', $this).length < 2) {
            $this.hide();
        }
    });
});