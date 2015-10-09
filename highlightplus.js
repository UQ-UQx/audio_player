setInterval(function() {
	//console.log('I should be running');
    var thedata = $('#highlighttime').find('iframe').data();
    if(thedata) {
      $('div.audiohighlight .highlight').each(function() {
        var eldata = $(this).data();
        var buttonText = $(this).text();
		var button = $(this);
		if(eldata.highlightsq){
			var sq = eldata.highlightsq;
			$.each(sq, function(index, val){
				var currentTime = Number((thedata.currenttime).toFixed());
				console.log(currentTime+" --- "+val[0]+' - '+val[1]);
				if(currentTime == val[0]){
					button.addClass('active');
				}
				if(currentTime == val[1]){
					button.removeClass('active');
				}
			});
		}else{
			if(thedata.currenttime > eldata.starttime && thedata.currenttime < eldata.endtime) {
				$(this).addClass('active');
	        } else {
	        	$(this).removeClass('active');
	        }	
		}
      });
    }
},500);

