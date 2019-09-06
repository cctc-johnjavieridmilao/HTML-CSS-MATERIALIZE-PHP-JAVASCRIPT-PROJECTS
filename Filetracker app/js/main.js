$(document).ready(function () {
    // global script

    // init
    $('.tabs').tabs({
        swipeable: true
    });
    $('.modal').modal();
    $('.collapsible').collapsible();
    $('.dropdown-trigger').dropdown();

    // change tabs classname
    document.querySelector('.tabs').className = "tabs tabs-fixed-width tab-demo green";

    // change a attribute
    let a_tag = document.body.getElementsByTagName('a');
    for (let i = 0; i < a_tag.length; i++) {
        if (a_tag[i].getAttribute('href') == '#') {
            a_tag[i].onclick = function (e) {
                e.preventDefault();
            }
        }
    }
});