$(document).ready(function() {
    // Stuff to do as soon as the DOM is ready;
    $('.valor').maskMoney({prefix:'R$ ', allowNegative: true, thousands:',', decimal:'.', affixesStay: false});
});
