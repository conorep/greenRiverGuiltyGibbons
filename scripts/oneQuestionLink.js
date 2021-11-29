
// event listener for paper clips
let accordion_items = document.getElementsByClassName('paperClips');

for (let i = 0; i < accordion_items.length; i++) {
    accordion_items[i].addEventListener('click', function(event) {

        // get the id
        let the_id = event.target.id;
        the_id = the_id.slice(18, the_id.length)
        // console.log(the_id)
        // copy link to clipboard
        navigator.clipboard.writeText('https://' + location.hostname + '/question.php?id=' + the_id); //////////////////////////// SWAP
        // navigator.clipboard.writeText('localhost:8000/question.php?id=' + the_id);
        // event.preventDefault();
        // event.stopPropagation();
        // return false;
    });
}
