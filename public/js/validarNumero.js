const numDocumento = document.getElementById("num_documento");
const numCelular = document.getElementById("num_celular");

numDocumento.onkeypress = function(event) {
    if (isNaN(this.value + String.fromCharCode(event.charCode))) return false;
};
numDocumento.onpaste = function(event) {
    event.preventDefault();
};

numCelular.onkeypress = function(event) {
    if (isNaN(this.value + String.fromCharCode(event.charCode))) return false;
};
numCelular.onpaste = function(event) {
    event.preventDefault();
};