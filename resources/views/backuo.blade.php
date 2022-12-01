<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lesson Planner</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

    <!-- Vue from CDN -->


    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


</head>

<body class="h-full grid place-items-center">

<div id="app">

    <section>
        <h2 class="font-bold mb-2">In Progress</h2>

        <ul>
            <li v-for="assignment in assignments.filter(a=>!a.complete)" :key="assignment.id">

                <label>

                    @{{ assignment.name}}

                    <input type="checkbox" v-model="assignment.complete">

                </label>
            </li>
        </ul>

    </section>

    <section class="mt-8" v-show="assignments.filter(a=>a.complete).length">
        <h2 class="font-bold mb-2">Completed Assignments</h2>

        <ul>
            <li v-for="assignment in assignments.filter(a=>a.complete)" :key="assignment.id">

                <label>

                    @{{ assignment.name}}

                    <input type="checkbox" v-model="assignment.complete">

                </label>
            </li>
        </ul>

    </section>

</div>


<script>


    let app = {
        data() {
            return {
                assignments: [
                    {name: 'Read chapter 4', complete: false, id: 1},
                    {name: 'Finish Study', complete: false, id: 2},
                    {name: 'Go to Bed', complete: false, id: 3},
                ]
            }
        }
    };


    Vue.createApp(app).mount('#app');

</script>

</body>

</html>


