// Disabling right mouse clicking
document.addEventListener("contextmenu", function(event) {
    event.preventDefault();
});

// Disable text selection on the page
document.addEventListener("selectstart", function(event) {
    event.preventDefault();
});

// Disabling text copying on the page
document.addEventListener("copy", function(event) {
    event.preventDefault();
});

// Disabling the break feature on the page
document.addEventListener("cut", function(event) {
    event.preventDefault();
});

// Disabling the Item inspector
document.addEventListener("keydown", function(event) {
    if (event.keyCode === 123) {
        event.preventDefault();
    }
});

// Disabling JavaScript console display
console.log = function() {};
console.error = function() {};
console.warn = function() {};
console.info = function() {};
