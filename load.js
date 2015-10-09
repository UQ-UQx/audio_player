  $('document').ready(function() {
	
	//var origin = "https://tools.ceit.uq.edu.au";
	var origin = "localhost";
	var baseurl = "index.php?";
	
    $('.audioplayer').each(function() {
      if(!$(this).data('ready')) {
	     // console.log($(this).data());
        $(this).append($('<iframe></iframe>'));
        var frm = $(this).find('iframe');
        var hidetimeline = 'false';
        var playonly = 'false';
        var showsubtitles = 'true';
        var audiourl = '';
        var subtitleurl = '';
        if($(this).data('hidetimeline') == true) {
          hidetimeline = 'true';
        }
        if($(this).data('playonly') == true) {
          playonly = 'true';
        }
        	        
        if($(this).data('showsubtitles') == false){
	        showsubtitles = 'false';
	        //console.log("I'm False");

	        
        }
        if($(this).data('audiofile')) {
          audiourl = $(this).data('audiofile');
        }
        if($(this).data('subtitles')) {
          subtitleurl = $(this).data('subtitles');
        }
      frm.attr("src",baseurl+"audiofile="+audiourl+"&hidetimeline="+hidetimeline+"&subtitles="+subtitleurl+"&playonly="+playonly+"&showsubtitles="+showsubtitles+"&element="+$(this).attr('id')); 
      //console.log(audiourl);
      frm.css({'border':'0'});
      if(subtitleurl == '') {
	      frm.css({'height':'75px'});
      }
        $(this).data('ready','true');
      }
    });
  });
  function play(el_name) {
    $('#'+el_name).find('iframe').get(0).contentWindow.postMessage({"action":"play"},origin);
  }
  function pause(el_name) {
    $('#'+el_name).find('iframe').get(0).contentWindow.postMessage({"action":"pause"},origin);
  }
 
  function skipTo(el_name,time) {
    $('#'+el_name).find('iframe').get(0).contentWindow.postMessage({"action":"skip","time":time+""},origin);
  }
  function status(el_name) {
    //console.log($('#'+el_name).find('iframe').data());
    return $('#'+el_name).find('iframe').data()
    
  }
  window.addEventListener( "message",
    function (e) {
	  //if(e.origin !== 'https://tools.ceit.uq.edu.au'){ alert("Bad domain"); return; } 
      if(e.data.el_name != '') {
        $("#"+e.data.el_name).find('iframe').data(e.data);
      }
  },false);
