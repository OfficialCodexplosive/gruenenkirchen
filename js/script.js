

var els = document.querySelector("a[href='#top']");


els.addEventListener("click", hochscrollen );

function hochscrollen( event ){
    event.preventDefault();
    var scrolling = setInterval(
        function(){ 
            window.scrollBy(0, -20);
            
            if( document.documentElement.scrollTop == 0 ){
                window.clearInterval( scrolling );
            }

        },
        10);
}