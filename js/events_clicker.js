const evts = document.querySelectorAll('.em-event.em-item');

for(const evt of evts)
{
    let href = evt.querySelectorAll('a')[0].getAttribute('href');
    evt.addEventListener('click', function() 
    {
        window.location = href;
    }, false);
}