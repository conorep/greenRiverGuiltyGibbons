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
let button_question_container = document.getElementById('button-question-container');

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
// delay enabling the button :hover transitions by 100 milliseconds on page load so the fade does not fade in on page load
setTimeout(addButtonTransitionCSS, 100);

///////////////////////////////////////////////////////////////////////////////////////////////
// remove animation button, it can run thru both buttons when only 1 is clicked and still works
///////////////////////////////////////////////////////////////////////////////////////////////
// event listener and function for ASK A QUESTION button click animation
let all_buttons_container = document.getElementsByClassName('all-buttons-container');
/*
* for removing the animation after use, required for allowing re-click
*/
function remove_animation()
{   // iterate all buttons
    for (let i = 0; i < all_buttons_container.length; i++)
    {   // remove the animation
        all_buttons_container[i].style.animationName = '';
        all_buttons_container[i].style.animationDuration = '';
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
    // fire off the button clicked anim for only clicked button
    for (let i = 0; i < all_buttons_container.length; i++)
    {
        // check string lengths before comparing,
        // just in case of bubbling / browser issues...
        let iterated_id = all_buttons_container[i].attributes.id.value;
        let match_true = false;
        // console.log(iterated_id)
        // console.log(clicked_button_id)
        // commencing with comparing string length of the ids to make sure
        // our "is this string inside this other string" check will always work
        if (iterated_id.length > clicked_button_id.length)
        {
            match_true = iterated_id.indexOf(clicked_button_id) >= 0;
        }
        else if (clicked_button_id.length > iterated_id.length)
        {
            match_true = clicked_button_id.indexOf(iterated_id) >= 0;
        } else
        {
            match_true = clicked_button_id === iterated_id;
        }
        // if the clicked button and the iterated button are a match, fire off the button scale-in-out anim
        if (match_true)
        {
            all_buttons_container[i].style.animationDuration = '0.3s';
            all_buttons_container[i].style.animationName = 'button_question_click';
        }
    }
    // remove it slightly after the animation is done
    setTimeout(remove_animation, 350);
}

//////////////////////////////////////////////////
// click event listeners for button scale anim
for (let i = 0; i < all_buttons_container.length; i++)
{
    all_buttons_container[i].addEventListener('click', runButtonScaleAnim);
}
/////////////////////////////////////////////////
// enter button keypress for button scale anim
for (let i = 0; i < all_buttons_container.length; i++)
{
    all_buttons_container[i].addEventListener('keypress', runButtonScaleAnim);
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
    let scrollingIterator = setInterval(scrolling, 10); // action to do and frame rate in ms
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
        scrollDown(500); // going just a bit longer than the animation cuttoff ensures it goes all the way down

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
button_submit.addEventListener('click', validate_on_submit);
// add keypress listener for getting enter
document.getElementById('button-submit-container').addEventListener('keypress', function(event)
{
    event.preventDefault();
    // console.log(event.key)
    // event.stopPropagation();
    // if keypress was an enter, validate on submit
    if (event.key === 'Enter')
    {
        validate_on_submit(event);
    }
});

/*
* validate on submit function validates form for errors, fires off form rollin anim and displays
* success animation.
*/
function validate_on_submit(event)
{
    event.preventDefault();
    // event.stopPropagation();
    // console.log('submit got clicked')
    // get email and message text
    let email = document.getElementById('email-entry').value;
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

///////////////////////////////////////////////////////////////////////////////////////
// will need these to inhibit jumpiness, checking prior to setting submit button sizing
let pageJustLoaded = true;
let priorWindowWidth = window.innerWidth;
let priorWindowHeight = window.innerHeight;
let priorRatio = window.innerWidth / window.innerHeight;

/*
* function is a custom media query for taking into consideration screen size ratio
* and window width in determining the sizing of the submit button and the margin above it
*/
function height_of_submit_and_margin()
{
    let windowWidth = window.innerWidth;
    let windowHeight = window.innerHeight;
    let ratio = windowWidth / windowHeight;
    let submit = document.getElementById('button-submit-container');
    let email = document.getElementById('email-entry');
    let submitOriginalHeight = 50;
    let emailOriginalHeight = 35;
    let emailOriginalmarginBottom = 25;
    // console.log('ratio ',ratio, 'windowWidth ', windowWidth, 'windowHeight: ',windowHeight);

    // multiplier for diminishing button and email margin height
    let mult = 1;

    // "did we really scale?" if-statement to ensure we aren't resizing the button upon merely resizing the width of window
    if ((ratio !== priorRatio && windowHeight !== priorWindowHeight) || pageJustLoaded === true)
    {
        // won't need this again until page is refreshed
        if (pageJustLoaded === true)
        {
            pageJustLoaded = false;
        }

        //////////////////////////////////////////////////////////////////////////////////////////////////////////
        // check for screen ratio change
        if (ratio >= 1.08)
        {
            // console.log('ffffffffffffffffffffffffffirst')
            if (windowWidth > 1400 && windowWidth <= 1800)
            {
                mult = 0.95;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * (mult * 0.7)).toString() + 'px';
                email.style.marginBottom = Math.floor(emailOriginalmarginBottom * (0.65)).toString() + 'px';
            }
            if (windowWidth > 1800 && windowWidth <= 2100)
            {
                mult = 0.95;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * mult).toString() + 'px';
                email.style.marginBottom = Math.floor(emailOriginalmarginBottom * (0.8)).toString() + 'px';
            }
            else if (windowWidth > 2100 && windowWidth <= 2500)
            {
                mult = 0.85;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * mult).toString() + 'px';
                email.style.marginBottom = Math.floor(emailOriginalmarginBottom * (0.8)).toString() + 'px';
            }
            else if (windowWidth > 2500 && windowWidth <= 3000)
            {
                mult = 0.77;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * mult).toString() + 'px';
                email.style.marginBottom = Math.floor(emailOriginalmarginBottom * (0.75)).toString() + 'px';
            }
            else if (windowWidth > 3000 && windowWidth <= 4000)
            {
                mult = 0.65;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * mult).toString() + 'px';
                email.style.marginBottom = Math.floor(emailOriginalmarginBottom * (mult + 0.05)).toString() + 'px';
            }
            else if (windowWidth > 4000 && windowWidth <= 5000)
            {
                mult = 0.55;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * mult).toString() + 'px';
                email.style.marginBottom = Math.floor(emailOriginalmarginBottom * (mult + 0.15)).toString() + 'px';
            }
            else if (windowWidth > 5000)
            {
                mult = 0.45;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * mult).toString() + 'px';
                email.style.marginBottom = Math.floor(emailOriginalmarginBottom * (mult + 0.15)).toString() + 'px';
            } else
            { // normal starting sizes
                submit.style.height = submitOriginalHeight.toString() + 'px';
                email.style.marginBottom = emailOriginalmarginBottom.toString() + 'px';
            }
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////
        // check for screen ratio change
        else if (ratio < 1.08 && ratio >= 0.7)
        {
            // console.log('mmmmmmmmmmmmmmmmmmmmmmmmid')
            // check for width of screen and alter button and margin sizes accordingly
            if (windowWidth > 600 && windowWidth <= 900)
            {
                mult = 0.95;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * mult).toString() + 'px';
            }
            else if (windowWidth > 900 && windowWidth <= 1300)
            {
                mult = 0.8;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * mult).toString() + 'px';
            }
            else if (windowWidth > 1300 && windowWidth <= 1700)
            {
                mult = 0.75;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * mult).toString() + 'px';
                email.style.marginBottom = emailOriginalmarginBottom.toString() + 'px';  /// always have to reset this one
            }
            else if (windowWidth > 1700 && windowWidth <= 2000)
            {
                mult = 0.65;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * mult).toString() + 'px';
                email.style.marginBottom = Math.floor(emailOriginalmarginBottom * 0.9).toString() + 'px';
            }
            else if (windowWidth > 2000)
            {
                mult = 0.55;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * mult).toString() + 'px';
                email.style.marginBottom = Math.floor(emailOriginalmarginBottom * (mult + 0.1)).toString() + 'px';
            } else
            { // normal starting sizes
                submit.style.height = submitOriginalHeight.toString() + 'px';
                email.style.marginBottom = emailOriginalmarginBottom.toString() + 'px';
            }
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////
        // check for screen ratio change
        else if (ratio < 0.7 && ratio >= 0)
        {
            // console.log('llllllllllllllllllllllllllllllast')
            // check for width of screen and alter button and margin sizes accordingly
            if (windowWidth > 600 && windowWidth <= 800)
            {
                mult = 0.9;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * mult).toString() + 'px';
                email.style.marginBottom = Math.floor(emailOriginalmarginBottom * (mult)).toString() + 'px';
            }
            else if (windowWidth > 800 && windowWidth <= 900)
            {
                mult = 0.8;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * mult).toString() + 'px';
                email.style.marginBottom = Math.floor(emailOriginalmarginBottom * (mult - 0.3)).toString() + 'px';
            }
            else if (windowWidth > 900 && windowWidth <= 1000)
            {
                mult = 0.7;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * mult).toString() + 'px';
                email.style.marginBottom = Math.floor(emailOriginalmarginBottom * (mult - 0.2)).toString() + 'px';
            }
            else if (windowWidth > 1000 && windowWidth <= 1100)
            {
                mult = 0.65;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * mult).toString() + 'px';
                email.style.marginBottom = Math.floor(emailOriginalmarginBottom * (mult - 0.2)).toString() + 'px';
            }
            else if (windowWidth > 1100 && windowWidth <= 1200)
            {
                mult = 0.55;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * mult).toString() + 'px';
                email.style.marginBottom = Math.floor(emailOriginalmarginBottom * (mult - 0.2)).toString() + 'px';
            }
            else if (windowWidth > 1200)
            {
                mult = 0.45;
                // console.log('mult',mult)
                submit.style.height = Math.floor(submitOriginalHeight * mult).toString() + 'px';
                email.style.marginBottom = Math.floor(emailOriginalmarginBottom * (mult + 0.25)).toString() + 'px';
            } else
            { // normal starting sizes
                submit.style.height = submitOriginalHeight.toString() + 'px';
                email.style.marginBottom = emailOriginalmarginBottom.toString() + 'px';
            }
        }
    }
    // update these for our "did we really scale?" if statement
    priorWindowWidth = window.innerWidth;
    priorWindowHeight = window.innerHeight;
    priorRatio = window.innerWidth / window.innerHeight;
}

// set the submit button sizing upon page load
height_of_submit_and_margin(window.innerWidth)

/////////////////////////////////////////
// event listener for every resize event
window.addEventListener('resize', function()
{
    // set the submit button sizing
    height_of_submit_and_margin();
});
