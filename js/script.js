document.addEventListener("contextmenu", function(event) {
    alert("Inspecting elements is disabled.");
    event.preventDefault();
});

document.addEventListener("keydown", function(event) {

    const forbiddenKeys = [
        { key: "F12" },
        { key: "I", ctrlKey: true, shiftKey: true },
        { key: "J", ctrlKey: true, shiftKey: true },
        { key: "U", ctrlKey: true },
        { key: "S", ctrlKey: true },
        { key: "C", ctrlKey: true, shiftKey: true }
    ];

    forbiddenKeys.forEach(combo => {
        if (event.key === combo.key &&
            (combo.ctrlKey === undefined || combo.ctrlKey === event.ctrlKey) &&
            (combo.shiftKey === undefined || combo.shiftKey === event.shiftKey)) {
            alert("Inspecting elements is disabled.");
            event.preventDefault();
        }
    });
});
