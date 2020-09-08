(()=>{

// BUTTON LOADER

document.querySelector('.form').addEventListener('submit', () => {
    document.querySelector('.button').innerHTML = '<img class="loader" src="loader.svg">'
})

// TOOLTIP
var tooltip = document.querySelector('.tooltip');

if(tooltip) {
    var tooltipImage = tooltip.querySelector('img'),
        tooltipName = tooltip.querySelector('.award-name'),
        tooltipDescription = tooltip.querySelector('.award-description'),
        tooltipCost = tooltip.querySelector('.award-cost');

    window.addEventListener('mousemove', event => {
        tooltip.style.left = event.pageX + 'px';
        tooltip.style.top = event.pageY + 'px';

        if( event.target.classList.contains('award') ) {
            tooltip.classList.add('tooltip-shown');

            tooltipImage.src = event.target.src;
            tooltipName.innerText = event.target.dataset.name;
            tooltipDescription.innerText = event.target.dataset.description;
            tooltipCost.innerText = event.target.dataset.price + ' Coins';
        } else {
            tooltip.classList.remove('tooltip-shown');
        }
    })
}

})()