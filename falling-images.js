(()=>{

for(let i = 1; i <= 100; i++) {
    let img = new Image();
    img.src = 'images/Award_' + i + '.png';
}

// FALLING IMAGES

if( window.innerWidth > 750 ) {
    
    setInterval( () => {
    
        if( document.hasFocus() ) {
    
            document.body.classList.remove('no-focus');
    
            var image = document.createElement('img');
            image.src = 'images/Award_' + Math.round( Math.random() * (100 - 1) + 1 ) + '.png';
            image.classList.add('falling-award');
            image.style.left = Math.round( Math.random() * 100 ) + '%';
            if( Math.random() > 0.5 ) {
                image.style.zIndex = 100;
            }
            document.body.appendChild(image);
        
            setTimeout( () => {
                image.remove();
            }, 5100 )
    
        } else {
    
            document.body.classList.add('no-focus');
    
        }
     
    }, 500 )

}


})()