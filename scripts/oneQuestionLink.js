/*
    Gr-Guilty-Gibbons FAQ
    Kevin, Conor, Pat
    SDEV 305 2021
    oneQuestionLink.js
*/
// event listener for paper clips
let accordion_items = document.getElementsByClassName('paperClips');

/*
* function removes anim after anim is played
*/
function removeAnim() {
    for (let i = 0; i < accordion_items.length; i++) {
        accordion_items[i].classList.remove('paperClipsAnim');
    }
}

// loop the paperclip elements and add event listeners
for (let i = 0; i < accordion_items.length; i++) {
    accordion_items[i].addEventListener('click', function(event) {

        // get the id
        let the_id = event.target.id;
        document.getElementById(the_id).classList.add('paperClipsAnim');
        setTimeout(removeAnim, 400);
        the_id = the_id.slice(18, the_id.length);

        // copy link to clipboard
        navigator.clipboard.writeText('https://' + location.hostname + '/question.php?id=' + the_id);
    });
}
