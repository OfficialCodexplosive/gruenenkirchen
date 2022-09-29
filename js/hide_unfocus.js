var focus_alle = document.querySelector("a[href='#alle']");
var focus_vorstand = document.querySelector("a[href='#vorstand']");
var focus_ratsfraktion = document.querySelector("a[href='#ratsfraktion']");

focus_alle.addEventListener("click", focus);
focus_alle.focus = null;

focus_vorstand.addEventListener("click", focus);
focus_vorstand.focus = 'vorstand';

focus_ratsfraktion.addEventListener("click", focus);
focus_ratsfraktion.focus = 'ratsfraktion';

function focus( event )
{
    var focus_class = event.currentTarget.focus;

    const objs = document.querySelectorAll('.child-portrait');

    if (focus_class == null)
    {
        for (const obj of objs)
        {
            obj.classList.remove('hide-portrait');
        }
    }else
    {
        for (const obj of objs)
        {
            if(!obj.classList.contains(focus_class))
            {
                obj.classList.add('hide-portrait');
            }else
            {
                obj.classList.remove('hide-portrait');
            }
        }
    }
}