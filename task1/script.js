document.getElementById("registrationForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const formData = new FormData(event.target);

    if (!formData.get('name') || !formData.get('email') || !formData.get('password')) {
        alert('Будь ласка, заповніть всі поля');
        return;
    }

    fetch('register.php', {
        method: 'POST',
        body: formData
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            alert('Користувач успішно зареєстрований');
            event.target.reset();
            getUsers();
        })
        .catch(error => {
            console.error('There was a problem with your fetch operation:', error);
            alert('Помилка реєстрації користувача');
        });
});

function getUsers() {
    fetch('get_users.php')
        .then(response => response.json())
        .then(users => {
            const userList = document.getElementById("userList");
            userList.innerHTML = '';

            if (users.length > 0) {
                const table = document.createElement('table');
                table.innerHTML = `
                    <tr>
                        <th>Ім'я</th>
                        <th>Електронна адреса</th>
                        <th>Дії</th>
                    </tr>
                `;

                users.forEach(user => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td>
                            <button onclick="deleteUser(${user.id})">Видалити</button>
                            <button onclick="editUser(${user.id}, '${user.name}', '${user.email}', '${user.password}')">Редагувати</button>
                        </td>
                    `;
                    table.appendChild(row);
                });

                userList.appendChild(table);
            } else {
                userList.textContent = "Список користувачів порожній";
            }
        })
        .catch(error => {
            console.error('Помилка при отриманні списку користувачів:', error);
        });
}

function deleteUser(userId) {
    if (confirm("Ви впевнені, що хочете видалити цього користувача?")) {
        fetch('delete_user.php', {
            method: 'POST',
            body: JSON.stringify({ userId }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                alert(data.message);
                getUsers();
            })
            .catch(error => {
                console.error('Помилка видалення користувача:', error);
                alert('Помилка видалення користувача');
            });
    }
}

function editUser(userId) {
    if (!userId) {
        alert("Неможливо відредагувати користувача: невірний ідентифікатор користувача");
        return;
    }

    const newName = prompt("Введіть нове ім'я для користувача:");
    if (newName !== null) {
        const newEmail = prompt("Введіть нову електронну адресу для користувача:");
        const newPassword = prompt("Введіть новий пароль для користувача:");
        fetch('edit_user.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ userId, newName, newPassword, newEmail })
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                alert(data.message);
                getUsers();
            })
            .catch(error => {
                console.error('Помилка редагування користувача:', error);
                alert('Помилка редагування користувача');
            });
    }
}

function loginUser() {
    const loginEmail = document.getElementById("loginEmail").value;
    const loginPassword = document.getElementById("loginPassword").value;

    const userData = {
        email: loginEmail,
        password: loginPassword
    };

    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(userData)
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Ви успішно увійшли!');
                getUsers();
            } else {
                alert(data.error);
            }
        })
        .catch(error => {
            console.error('Помилка авторизації:', error);
            alert('Виникла помилка при авторизації. Будь ласка, спробуйте ще раз.');
        });
}


getUsers();
