$(window).ready(function() {
    setTimeout(function(){
    },1000);
})
function selectTable(){
    let radio=$("input[name='dropDown']:checked")
    let radio2=$("input[name='dropDown']:not(:checked)")
    $(`#${radio.val()}`).show()
    $(`#${radio2.val()}`).hide()
}
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}