<!DOCTYPE html>
<html>
<head>

    <title>Add Task</title>

    <style>

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #14121a;
            color: white;
        }

        .navbar {
            background: #211d2b;
            padding: 18px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #302a3d;
        }

        .logo {
            color: #b895ff;
            font-size: 22px;
            font-weight: bold;
        }

        .back {
            color: #aaa;
            text-decoration: none;
        }

        .container {
            max-width: 700px;
            margin: 60px auto;
            padding: 0 25px;
        }

        h1 {
            color: #b895ff;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #999;
            margin-bottom: 35px;
        }

        .form-box {
            background: #211d2b;
            padding: 30px;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #ddd;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            box-sizing: border-box;
            padding: 12px;
            background: #14121a;
            color: white;
            border: 1px solid #40384f;
            border-radius: 6px;
            font-family: Arial, sans-serif;
            margin-bottom: 22px;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #b895ff;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .add-task {
            background: #4f9d70;
            color: white;
            border: none;
            padding: 11px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .cancel {
            background: transparent;
            color: #b895ff;
            border: 1px solid #b895ff;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
        }

    </style>

</head>

<body>

    <div class="navbar">

        <div class="logo">
            Task Manager
        </div>

        <a href="/tasks" class="back">
            My Tasks
        </a>

    </div>


    <div class="container">

        <h1>
            Add New Task
        </h1>

        <p class="subtitle">
            Create a new task and stay organized.
        </p>


        <div class="form-box">

            <form action="/tasks" method="POST">

                @csrf


                <label>
                    Task Name
                </label>

                <input
                    type="text"
                    name="task_name"
                    placeholder="Enter task name"
                    required
                >


                <label>
                    Description
                </label>

                <textarea
                    name="description"
                    placeholder="Enter task description"
                ></textarea>


                <label>
                    Status
                </label>

                <select name="status" required>

                    <option value="Pending">
                        Pending
                    </option>

                    <option value="Completed">
                        Completed
                    </option>

                </select>


                <label>
                    Due Date
                </label>

                <input
                    type="date"
                    name="due_date"
                >


                <div class="buttons">

                    <button
                        type="submit"
                        class="add-task"
                    >
                        Add Task
                    </button>

                    <a
                        href="/tasks"
                        class="cancel"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>
</html>