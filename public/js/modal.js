const deleteMedic = function(id) {
    const route = `/medicos/${id}`;

    let xhr = new XMLHttpRequest();
    xhr.open("DELETE", route, true);
    xhr.setRequestHeader(
        "X-CSRF-TOKEN",
        $('meta[name="csrf-token"]').attr("content")
    );
    xhr.send(null);

    xhr.onload = function() {
        location.reload();
    };
};

const deletePatient = function(id) {
    const route = `/pacientes/${id}`;

    let xhr = new XMLHttpRequest();
    xhr.open("DELETE", route, true);
    xhr.setRequestHeader(
        "X-CSRF-TOKEN",
        $('meta[name="csrf-token"]').attr("content")
    );
    xhr.send(null);

    xhr.onload = function() {
        location.reload();
    };
};

const deleteRoom = function(id) {
    const route = `/habitaciones/${id}`;

    let xhr = new XMLHttpRequest();
    xhr.open("DELETE", route, true);
    xhr.setRequestHeader(
        "X-CSRF-TOKEN",
        $('meta[name="csrf-token"]').attr("content")
    );
    xhr.send(null);

    xhr.onload = function() {
        location.reload();
    };
};
