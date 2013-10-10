//滑轮滚动 事件写法
//http://www.procab.ch

//mouse wheel event
var sectionsAry = ['body','#portfolio','#services','#team','#office','#feed'];
var totalSection = sectionsAry.length;
var currentSectionId = -1;
var isSectionMovementBusy = false;
var counter = 0;
$('body').bind('mousewheel', function(event, delta) {
	
	if(isSectionMovementBusy == true) return false;
	event.preventDefault();

	
	if(delta > 0){
		currentSectionId--;		
	}else{
		currentSectionId++;
	}
	if(currentSectionId < 0) {
		currentSectionId = 0;
		return false;
	}
	if(currentSectionId > totalSection-1) {
		currentSectionId = totalSection-1;
		return false;
	}	
	var yPos = $(sectionsAry[currentSectionId]).offset().top -52;
	if(currentSectionId == 1) yPos -=50;
	
	isSectionMovementBusy = true;

	$('body,html').stop(true, false).animate({'scrollTop':yPos+'px'},600, 'easeInOutExpo',function(){
		isSectionMovementBusy = false;
	})
	return false;
	
});

