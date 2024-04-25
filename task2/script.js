document.addEventListener("DOMContentLoaded", () => {
    const noteForm = document.getElementById("noteForm");
    const notesList = document.getElementById("notesList");
    function fetchAndDisplayNotes() {
        fetch("fetch_notes.php")
            .then(response => response.json())
            .then(notes => {
                notesList.innerHTML = "";
                notes.forEach(note => {
                    const noteElement = document.createElement("div");
                    noteElement.innerHTML = `
                        <h2>${note.title}</h2>
                        <p>${note.text}</p>
                        <button onclick="updateNote(${note.id})">Update</button>
                        <button onclick="deleteNote(${note.id})">Delete</button>
                    `;
                    notesList.appendChild(noteElement);
                });
            });
    }
    fetchAndDisplayNotes();
    noteForm.addEventListener("submit", event => {
        event.preventDefault();
        const title = document.getElementById("noteTitle").value;
        const text = document.getElementById("noteContent").value;
        fetch("add_note.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ title, text })
        })
            .then(response => {
                if (response.ok) {
                    fetchAndDisplayNotes();
                } else {
                    console.error("Failed to add note");
                }
            });
    });
    window.updateNote = id => {
        const newTitle = prompt("Enter the new title:");
        const newText = prompt("Enter the new text:");
        if (newTitle !== null && newText !== null) {
            fetch("update_note.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ id, title: newTitle, text: newText })
            })
                .then(response => {
                    if (response.ok) {
                        fetchAndDisplayNotes();
                    } else {
                        console.error("Failed to update note");
                    }
                });
        }
    };
    window.deleteNote = id => {
        if (confirm("Are you sure you want to delete this note?")) {
            fetch("delete_note.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ id })
            })
                .then(response => {
                    if (response.ok) {
                        fetchAndDisplayNotes();
                    } else {
                        console.error("Failed to delete note");
                    }
                });
        }
    };
});
