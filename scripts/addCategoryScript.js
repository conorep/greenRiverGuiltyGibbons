// Conor O'Brien SDEV305 GRGG
// 2021


function chooseNewCat(val) {

    let catChoice = document.getElementById('catNew');

    if (val === true)
        catChoice.style.display = 'block';
    else
        catChoice.style.display = 'none';
}

function chooseNewEmail(val) {

    let emailChoice = document.getElementById('emailNew');

    if (val === true)
        emailChoice.style.display = 'block';
    else
        emailChoice.style.display = 'none';
}