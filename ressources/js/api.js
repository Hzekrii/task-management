// api.js

// Function to fetch data from the server
function fetchDataAndRender() {
    fetch('.././api/data.php') // Adjust the path to data.php
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            renderTasks(data); // Call the function to render tasks
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}

// Function to render tasks
function renderTasks(tasks) {
    const taskList = document.getElementById('taskList');
    taskList.innerHTML = ''; // Clear previous content

    tasks.forEach(task => {
        const listItemContainer = createTaskListItem(task);
        taskList.appendChild(listItemContainer);
    });
}

// Function to create a task list item with delete form

function createTaskListItem(task) {
    const updateForm = document.createElement('form');
    updateForm.action = '.././controllers/TaskController.php'; // Replace with the correct endpoint for task update
    updateForm.method = 'POST';

    const taskInput = document.createElement('input');
    taskInput.setAttribute('type', 'text');
    taskInput.setAttribute('name', 'name');
    taskInput.setAttribute('value', task.name); // Adjust to match the task properties
    taskInput.setAttribute('disabled', 'true'); // Initially disabled

    const taskIdInput = document.createElement('input');
    taskIdInput.setAttribute('type', 'hidden');
    taskIdInput.setAttribute('name', 'task_id');
    taskIdInput.setAttribute('value', task.id);

    const saveBtn = document.createElement('button');
    saveBtn.setAttribute('type', 'submit');
    saveBtn.textContent = 'Save'; // Button text for saving

    const updateBtn = document.createElement('button');
    updateBtn.textContent = 'Update'; // Button text for updating

    // Event listener to toggle the disabled attribute and button text
    updateBtn.addEventListener('click', function (event) {
        event.preventDefault();
        taskInput.removeAttribute('disabled');
        updateForm.removeChild(updateBtn);
        updateForm.appendChild(saveBtn);
    });

    updateForm.appendChild(taskIdInput);
    updateForm.appendChild(taskInput);
    updateForm.appendChild(updateBtn);

    // Checkbox form
    const checkboxForm = document.createElement('form');
    checkboxForm.action = '.././controllers/TaskController.php'; // Replace with the correct endpoint for checkbox update
    checkboxForm.method = 'POST';

    const checkboxLabel = document.createElement('label');
    const checkbox = document.createElement('input');
    checkbox.setAttribute('type', 'checkbox');
    checkbox.setAttribute('name', 'achieved');
    checkbox.checked = task.achieved; // Check the checkbox if task.achieved is true

    const checkboxIdInput = document.createElement('input');
    checkboxIdInput.setAttribute('type', 'hidden');
    checkboxIdInput.setAttribute('name', 'task_id');
    checkboxIdInput.setAttribute('value', task.id);

    checkboxLabel.appendChild(checkbox);
    checkboxForm.appendChild(checkboxIdInput);
    checkboxForm.appendChild(checkboxLabel);

    // Event listener for checkbox change
    checkbox.addEventListener('change', function () {
        const newState = checkbox.checked ? 1 : 0; // Get the new state (1 for checked, 0 for unchecked)

        fetch('.././controllers/TaskController.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `task_id=${task.id}&achieved=${newState}`, // Sending taskId and updated achieved state
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                // No JSON parsing needed for this response
                console.log('Updated achieved state successfully');
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    });
    const deleteForm = document.createElement('form');
    deleteForm.action = '.././controllers/TaskController.php'; // Replace with the correct endpoint for task deletion
    deleteForm.method = 'POST';

    const deleteInput = document.createElement('input');
    deleteInput.setAttribute('type', 'hidden');
    deleteInput.setAttribute('name', 'task_id');
    deleteInput.setAttribute('value', task.id);

    const deleteBtn = document.createElement('button');
    deleteBtn.setAttribute('type', 'submit');
    deleteBtn.textContent = 'Delete'; // Button text for deletion

    deleteForm.appendChild(deleteInput);
    deleteForm.appendChild(deleteBtn);

    const listItemContainer = document.createElement('li');
    listItemContainer.appendChild(updateForm);
    listItemContainer.appendChild(checkboxForm);
    listItemContainer.appendChild(deleteForm);

    return listItemContainer;
}





