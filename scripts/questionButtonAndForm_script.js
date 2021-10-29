// Kevin Price for SDEV305 GreenRiverGuiltyGibbons
// Sprint 1 for GRTech FAQ
// October 14, 2021

/////////////////////////////////////////////////////////////////////////////////
// delay application of button transition style until after page loads so it does
// not "fade-in" upon page load / refresh
/////////////////////////////////////////////////////////////////////////////////
let all_buttons = document.getElementsByClassName('all-buttons');

// need this in the event listeners / functions later for fixing margin problems
let message_sent = document.getElementById('message-sent');
let form_question = document.getElementById('form-question');
let form_and_button_container = document.getElementById('kevin-container');
let button_question_container = document.getElementById('button-question');

/*
* function enables button :hover transitions for hover fade transitions
*/
function addButtonTransitionCSS()
{
    // iterate so that all-buttons.style.transition = '1s' to enable button :hover fade transitions
    for (let i = 0; i < all_buttons.length; i++)
    {
        all_buttons[i].style.transition = '0.25s';
        message_sent.style.transition = '0.25s';
    }
}
// // delay enabling the button :hover transitions by 100 milliseconds on page load so the fade does not fade in on page load
setTimeout(addButtonTransitionCSS, 100);

///////////////////////////////////////////////////////////////////////////////////////////////
// remove animation button, it can run thru both buttons when only 1 is clicked and still works
///////////////////////////////////////////////////////////////////////////////////////////////
// event listener and function for ASK A QUESTION button click animation
/*
* for removing the animation after use, required for allowing re-click
*/
function remove_animation()
{   // iterate all buttons
    for (let i = 0; i < all_buttons.length; i++)
    {   // remove the animation
        all_buttons[i].classList.remove('button-click');
    }
}

/////////////////////////////////////////////////////////////////////////
// add click event listener to all buttons
/////////////////////////////////////////////////////////////////////////
function runButtonScaleAnim(event)
{
    // get clicked id from event that works in Firefox and Chrome...
    // console.log(event.target.id);
    let clicked_button_id = event.target.id;
    // console.log(clicked_button_id," got clicked")
    // fire off the button clicked anim for only clicked button
    for (let i = 0; i < all_buttons.length; i++)
    {   // remove the animation
        if (all_buttons[i].id === clicked_button_id) {
            all_buttons[i].classList.add('button-click');

        }
    }
    // remove it slightly after the animation is done
    setTimeout(remove_animation, 350);
}

//////////////////////////////////////////////////
// click event listeners for button scale anim
for (let i = 0; i < all_buttons.length; i++)
{
    all_buttons[i].addEventListener('click', runButtonScaleAnim);
}
/////////////////////////////////////////////////
// enter button keypress for button scale anim
for (let i = 0; i < all_buttons.length; i++)
{
    all_buttons[i].addEventListener('keypress', runButtonScaleAnim);
}
///////////////////////////////////////////////////////////////////////
// ask a qustion rollout / rollin functions and listener
///////////////////////////////////////////////////////////////////////
let form_rolled_inout = 'in'; // will become 'out' later on

/*
* rolls in the form
*/
function rollin()
{
    // console.log('rolling in')
    form_question.classList.remove('rollout');
    // always gotta reset this one, this is rolled-in state
    message_sent.style.margin = '10px 0 7px 0';
    message_sent.classList.remove('remove_confirm'); // resetting hjust in case rolloud out after confirmed already
    form_and_button_container.style.margin = '0 0 -24px 0';
    form_question.classList.add('rollin');
    form_rolled_inout = 'in';
}

/*
* function scrolls scrollbar to bottom repeatedly for length of time in ms
* set in timeOut param
*/
function scrollDown(timeOut)
{
    /*
    * repeatedly set scrollbar to bottom via passing htis func into the setInterval below
    */
    function scrolling()
    {
        // console.log('is it still auto-scrolling?')
        // console.log(window.outerWidth, window.outerHeight)

        // inhibiting chrome and opera, because they can't scroll to a location and play an animation simultaneously
        let is_invalid_browser = navigator.userAgent.toLowerCase();
        // console.log(is_invalid_browser)
        if (is_invalid_browser.indexOf('chrome') >= 0 || is_invalid_browser.indexOf('opera') >= 0)
        {
            is_invalid_browser = true;
        } else {
            is_invalid_browser = false;
        }
        // console.log(is_invalid_browser);

        // if we have any other browser, run the scroll to form motion
        if (is_invalid_browser === false)
        {
            // scroll to target for wide monitors is the page bottom, for all others, it scrolls so taht top of page
            // aligns with the top of the question button
            if (window.innerWidth > 1199 && window.innerHeight > 800)
            {
                document.getElementsByTagName('footer')[0].scrollIntoView(); // goes to page bottom
                // console.log('auto scroll bigger')
                // console.log(window.innerWidth, window.outerWidth)
            }
            else
            {   // centers the form...
                // chrome and opera insert a delay before firinghtis one off, do not use this with an animation with them
                button_question_container.scrollIntoView();
            }
        }
    }

    // put the setInterval in a variable so we can shut it off later
    let scrollingIterator = setInterval(scrolling, 1); // action to do and frame rate in ms
    /*
    * function stops the setInterval iteration
    */
    function stopIt()
    {
        clearInterval(scrollingIterator);
    }
    // timer to stop the scrolling
    setTimeout(stopIt, timeOut);
}

////////////////////////////////////////////////////////////////////////////////////////////////
// add event listener to "ask a question" button for firing off the form rollout / rollin anims
////////////////////////////////////////////////////////////////////////////////////////////////
button_question_container.addEventListener('click', function(event)
{
    // one animation for the rollout
    if (form_rolled_inout === 'in')
    {
        // console.log('rollin out')
        // console.log(window.outerWidth)
        // start the scroll inhibiter if we are not in a mobile

        // hide the successful delivery message and set it's margins to just a bit less than what
        // it is on page load to compensate for the rollout taking more space
        message_sent.style.visibility = 'hidden';
        message_sent.style.margin = '1px 0 2px 0';
        form_and_button_container.style.margin = '0 0 19px 0';
        // form_question.style.margin = '0 0 0 15px'; bootstrap doesn't like this, even though it is needed
        scrollDown(650); // going just a bit longer than the animation cuttoff ensures it goes all the way down

        // remove rollin class for rollin anim
        form_question.classList.remove('rollin');
        // add rollout class for rollout anim
        form_question.classList.add('rollout');
        form_rolled_inout = 'out';
    } // different animation for the rollin
    else if (form_rolled_inout === 'out')
    {
        rollin();
    }
});

///////////////////////////////////////////////////////////////////////
// question form email validator
///////////////////////////////////////////////////////////////////////
function validate_email(email)
{
    let at = '@';
    let at_i = -1;
    let at_count = 0;
    let dot = '.';
    let dot_i = -1;
    let dot_count = 0;
    // find relationship between @ and . chars
    for (let i = 0; i < email.length; i++)
    {
        if (email[i] === at)
        {
            at_i = i;
            at_count++;
        }
        if (email[i] === dot)
        {
            dot_i = i;
            dot_count++;
        }
    }
    // console.log(email, email.length, email.indexOf('.') === email.length-1)
    // return false if either is still -1, or if the domain identifiers have . or @ at the end
    if (at_i === -1 || dot_i === -1 || email.indexOf('.') === email.length-1 || email.indexOf('@') === email.length-1)
    {
        return false;
    }
    // email addresses with 1 @ and 1 .
    if (at_count === 1 && dot_count === 1)
    {
        if (dot_i < at_i)
        {
            return false;
        } else { // 1 and 1, correct order
            return true;
        }
    }
    else
    { // multiple dots and ats mostly ok, except domain extensions have no special chars
        if (at_i < dot_i && (dot_i - at_i === 1))
        { // literally the bottom of the barrel here
            return false;
        }
        if (at_i < dot_i)
        { // domain extensions have no special chars
            return true;
        }
        else
        {
            return false;
        }
    }
}

////////////////////////////////////////////////////
// submit button validation
///////////////////////////////////////////////////
// will be using these later in multiple places
let error_messages = document.getElementsByClassName('error');

/*
* clear error messages on load / reload
*/
function clear_form_errors()
{
    // iterate all error messages and hide them
    for (let i = 0; i < error_messages.length; i++)
    {
        error_messages[i].style.visibility = 'hidden';
    }
}
clear_form_errors();

////////////////////////////////////////////////////////////
// mouse click and enter key triggering the submit button
////////////////////////////////////////////////////////////
let button_submit = document.getElementById('button-submit');
// adding validate on submit button
// button_submit.addEventListener('click', validate_on_submit);
// add keypress listener for getting enter
// document.getElementById('button-submit').addEventListener('keypress', function(event)
// {
//     //event.preventDefault();
//     // console.log(event.key)
//     // event.stopPropagation();
//     // if keypress was an enter, validate on submit
//     if (event.key === 'Enter')
//     {
//         validate_on_submit(event);
//     }
// });

///////////////////////////////////////////////////////
// only if not using submit function in html
// button_submit.addEventListener('click', validate_on_submit);


/*
* validate on submit function validates form for errors, fires off form rollin anim and displays
* success animation.
*/
function validate_on_submit()
{
    //event.preventDefault();
    // event.stopPropagation();
    // console.log('submit got clicked')
    // get email and message text
    let email = document.getElementById('email-entry').value;
    let lname = document.getElementById('lname-entry').value;
    let fname = document.getElementById('fname-entry').value;
    let question = document.getElementById('question-entry').value;
    // check for email formatting
    let email_is_valid = validate_email(email);
    // clear warning messages
    clear_form_errors();
    // picks up false if either field is invalid
    let submitFlag = true;

    ////////////////////////////////////
    // check for errors prior to submit
    // validate email
    if (email === '' || email_is_valid === false)
    {
        submitFlag = false;
        document.getElementById('error-email').style.visibility = 'visible';
    } // validate question
    if (lname === '')
    {
        submitFlag = false;
        document.getElementById('error-lname').style.visibility = 'visible';
    } // validate question
    if (fname === '')
    {
        submitFlag = false;
        document.getElementById('error-fname').style.visibility = 'visible';
    } // validate question
    if (question === '')
    {
        submitFlag = false;
        document.getElementById('error-question').style.visibility = 'visible';
    }

    if (submitFlag === true)
    {
        // do form rollin anim and show confirmation if all checks returned valid
        rollin();
        // show success message and reset it's margins to the closed form state
        message_sent.style.visibility = 'visible';
        message_sent.style.margin = '10px 0 7px 0';
        // console.log("returned true");
        // document.question_form_name.submit();
        return true;
    }
    else {
        // console.log("returned false");
        return false;
    }
}

/////////////////////////////////////////////////////////////////////////////////////////
// for removing the submission message upon click
message_sent.addEventListener('click', removeConfirmationMessage);
message_sent.addEventListener('keypress', removeConfirmationMessage);

/*
* function removes confirmation message upon click
*/
function removeConfirmationMessage(event)
{
    /* runs in settimeout
    */
    function removed()
    {
        message_sent.style.visibility = 'hidden';
    }

    // remove it after anim is played
    message_sent.classList.add('remove_confirm');
    setTimeout(removed, 400);
}



/////////////////////////////////////////
// for anything needed in debugging
// window.addEventListener('resize', function()
// {
//     console.log(window.innerWidth)
// });
