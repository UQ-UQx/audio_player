setInterval(function() {
    var thedata = $('#highlighttime').find('iframe').data();
    if(thedata) {
      $('div.audiohighlight .highlight').each(function() {
        var eldata = $(this).data();
        var buttonText = $(this).text();
		var el = $(this);
		if(eldata.highlightsq){
			var sq = eldata.highlightsq;
			$.each(sq, function(index, val){
				var currentTime = Math.round(thedata.currenttime);
				if(currentTime == val[0]){
					el.css({'background':'yellow'});
					el.addClass('active');
				}
				if(currentTime == val[1]){
					el.css({'background':'none'});
					el.removeClass('active');
				}
			});
		}else{
			if(thedata.currenttime > eldata.starttime && thedata.currenttime < eldata.endtime) {
				$(this).css({'background':'yellow'});
				$(this).addClass('active');
	        } else {
		        $(this).css({'background':'none'});
	        	$(this).removeClass('active');
	        }	
		}
      });
    }
},500);

//OLD CODE - only supports 1 highlight timeslot
/*
  setInterval(function() {
    var thedata = $('#highlighttime').find('iframe').data();
    if(thedata) {
      $('div.audiohighlight .highlight').each(function() {
        var eldata = $(this).data();
        if(thedata.currenttime > eldata.starttime && thedata.currenttime < eldata.endtime) {
          $(this).css({'background':'yellow'});
          $(this).addClass('active');
        } else {
          $(this).css({'background':'none'});
          $(this).removeClass('active');
        }
      });
    }
  },500);
*/