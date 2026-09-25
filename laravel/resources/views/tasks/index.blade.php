<!DOCTYPE html>
<html>
<head>

    <title>Personal Task Manager</title>

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

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-links a {
            color: #aaa;
            text-decoration: none;
        }

        .add-button {
            background: #4f9d70;
            color: white !important;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            max-width: 1100px;
            margin: 60px auto;
            padding: 0 25px;
        }

        .welcome-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            color: #b895ff;
            font-size: 32px;
            margin-bottom: 8px;
        }

        .welcome-section p {
            color: #999;
        }

        .main-add-button {
            background: #4f9d70;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        /* Recent Tasks */

        .task-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 55px;
            margin-bottom: 25px;
        }

        .task-header h2 {
            font-size: 25px;
        }

        .task-header a {
            color: #b895ff;
            text-decoration: none;
        }

        /* Two task boxes per row */

        .task-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .task-card {
            background: #211d2b;
            padding: 20px;
            border-radius: 8px;
            min-height: 180px;
            box-sizing: border-box;
        }

        .task-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .task-title h3 {
            margin: 0;
        }

        .description {
            color: #999;
            min-height: 40px;
        }

        .task-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 25px;
            gap: 10px;
        }

        .due-date {
            color: #999;
            font-size: 14px;
        }

        /* Status */

        .status {
            padding: 6px 12px;
            border-radius: 15px;
            font-size: 13px;
            font-weight: bold;
            white-space: nowrap;
        }

        .completed {
            background: #245b3d;
            color: #55c982;
        }

        .pending {
            background: #5a4b27;
            color: #e8c85b;
        }

        /* Buttons */

        .edit {
            background: transparent;
            color: #b895ff;
            border: 1px solid #b895ff;
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            margin-right: 5px;
        }

        .delete {
            background: #80404d;
            color: white;
            border: none;
            padding: 9px 14px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Empty */

        .empty {
            background: #211d2b;
            padding: 30px;
            text-align: center;
            border-radius: 8px;
        }

        .empty p {
            color: #999;
        }

        /* Smaller screen */

        @media (max-width: 700px) {

            .task-grid {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>

<body>

    <!-- Navigation -->

    <div class="navbar">

        <div class="logo">
            Task Manager
        </div>

        <div class="nav-links">

            <a href="/tasks">
                My Tasks
            </a>

            <a href="/tasks/create" class="add-button">
                + Add Task
            </a>

        </div>

    </div>


    <!-- Main Content -->

    <div class="container">

        <!-- Welcome -->

        <div class="welcome-section">

            <div>

                <h1>
                    My Tasks
                </h1>

                <p>
                    Stay organized and productive.
                </p>

            </div>

            <a href="/tasks/create" class="main-add-button">
                + Add Task
            </a>

        </div>


        <!-- Recent Tasks -->

        <div class="task-header">

            <h2>
                Recent Tasks
            </h2>

            <a href="/tasks/create">
                Add New
            </a>

        </div>


        @if ($tasks->count() == 0)

            <div class="empty">

                <h3>
                    No Tasks Yet
                </h3>

                <p>
                    Click "+ Add Task" to create your first task.
                </p>

            </div>

        @else

            <div class="task-grid">

                @foreach ($tasks as $task)

                    <div class="task-card">

                        <div class="task-title">

                            <h3>
                                {{ $task->task_name }}
                            </h3>

                            @if ($task->status == 'Completed')

                                <span class="status completed">
                                    Completed
                                </span>

                            @else

                                <span class="status pending">
                                    Pending
                                </span>

                            @endif

                        </div>


                        <p class="description">
                            {{ $task->description }}
                        </p>


                        <div class="task-bottom">

                            <div class="due-date">
                                Due: {{ $task->due_date ?? 'No due date' }}
                            </div>


                            <div>

                                <a
                                    href="/tasks/{{ $task->id }}/edit"
                                    class="edit"
                                >
                                    Edit
                                </a>


                                <form
                                    action="/tasks/{{ $task->id }}"
                                    method="POST"
                                    style="display: inline;"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="delete"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @endif

    </div>

</body>
</html>