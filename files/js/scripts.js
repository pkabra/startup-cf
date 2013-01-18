// JavaScript Document
function changeBack(val){
	if(val){
		$('#text').animate({opacity:'0'},2000);
		$('#text').css({display:'none'});
		$('#logo').animate({opacity:'1'},2000);
		$('#text').css({display:'block'});
	}
	else{
		$('#text').animate({opacity:'0.3'},2000);
		$('#text').css({display:'block'});
		$('#logo').animate({opacity:'0'},2000);
		$('#text').css({display:'none'});
	}
}

function runFilter(obj){
		$('#companyfilter').keyup(function(){
        var filter = $(obj).val(), count = 0;
        $(".company_logos:first li").each(function () {
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).addClass("hidden");
            } else {
                $(this).removeClass("hidden");
                count++;
            }
			$('ul.company_logos>li[class!=hidden]').tsort('p.comporder', {order:'asc'});
			$('ul.company_logos>li[class=hidden]').tsort({order:'asc'});
        });
		});
}

function like(id){
	var form = document.getElementById('form'+id);
	var likebutton = document.getElementById('pop'+id);
	if(form.elements['name'].value == ""){
		$('#nerr'+id).show();
		return;
	}
	else if(form.elements['email'].value == ""){
		$('#eerr'+id).show();
		return;
	}
	else if(form.elements['major'].value == ""){
		$('#merr'+id).show();
		return;
	}
	else if(form.elements['level'].value == ""){
		$('#lerr'+id).show();
		return;
	}
	else{
		$.ajax({
			url:'files/likes.php',
			type:'POST',
			data:{name:form.elements['name'].value, email:form.elements['email'].value, idnum:id, major:form.elements['major'].value, level:form.elements['level'].value},
			success:function(data,text){$('#debug').append(data);}
		});
		/*
		var idnums;
		if($.cookie('_careerfair_87ea5dfc8b8e384d848979496e706390b497e547')){
			idnums = $.cookie('_careerfair_87ea5dfc8b8e384d848979496e706390b497e547');
		}
		idnums = id+',';
		$.cookie('_careerfair_87ea5dfc8b8e384d848979496e706390b497e547', idnums, {expires:'365'});
		if($.cookie('_careerfair_6ae999552a0d2dca14d62e2bc8b764d377b1dd6c')){
			$.cookie('_careerfair_6ae999552a0d2dca14d62e2bc8b764d377b1dd6c', form.elements['name'].value, {expires:'365'});
			$.cookie('_careerfair_a88b7dcd1a9e3e17770bbaa6d7515b31a2d7e85d', form.elements['email'].value, {expires:'365'});
		}
		*/
		$(likebutton).popover('hide');
		$(likebutton).button('loading');
	}
}

function setLikes(){
	if($.cookie('_careerfair_87ea5dfc8b8e384d848979496e706390b497e547')){
		var ids = $.cookie('_careerfair_87ea5dfc8b8e384d848979496e706390b497e547');
	}
}