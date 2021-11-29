
// event listener for paper clips
let accordion_items = document.getElementsByClassName('accordion-header');

for (let i = 0; i < accordion_items.length; i++) {

    accordion_items[i].addEventListener('click', function(event) {
        // get the id
        let id = event.target.attributes['aria-controls'].value;
        id = id.substr(8, id.length);

        // navigator.clipboard.writeText('https://' + location.hostname + '/question.php?id=' + id); //////////////////////////// SWAP
        navigator.clipboard.writeText('localhost:8000/question.php?id=' + id);
    });
}
