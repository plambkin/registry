<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mindquote</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

    <!-- Vue from CDN -->


    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


</head>

<body>


<div id="app">

    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
            email</label>
        <input v-model="email" type="email" id="email"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="name@flowbite.com" required="">
    </div>

    <button @click="getRegistry" type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Submit
    </button>

    <div v-if="feedback" class="mt-10 flex justify-center">
        <span style="color:red" v-text="feedback">
    </div>


    <div v-show="toggle" class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="border-b">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Student Name
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Course
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                WAMBA Membership
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Certificate date
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr class="border-b">
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                @{{ fname }} @{{ lname }}
                            </td>

                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                @{{ course1Text }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                @{{ wambastatus }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                @{{ completion }}
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>


<script>


    let app = {
        data() {
            return {
                info: null,
                fname: '',
                lname: '',
                course: '',
                course1Text: '',
                wambastatus: '',
                institute: 'AUSTRALIAN',
                completion: '',
                feedback: '',
                toggle: false
            }
        },

        methods: {

            getRegistry: function () {
                console.log('https://www.sportspatrons.com/api/record?email=' + this.email + '&institute=' + this.institute);
                axios.get('https://www.sportspatrons.com/api/record',
                    { params:
                            { email: this.email, institute: this.institute }})
                    .then(response => (this.info = response.data, this.fname = response.data.fName,
                        this.lname = response.data.lName,
                        this.course = response.data.course,
                        this.course1Text = response.data.course1Text,
                        this.wambastatus = response.data.wambastatus,
                        this.completion = response.data.completion))
                    .catch(error => {
                        this.feedback = error.response.data + " - Email the institute if you believe this" +
                            " was in error";
                        console.log('Entered Error Code');
                    });
                    this.toggle = true;
            },

        }
    };


    Vue.createApp(app).mount('#app');


</script>


</body>

</html>


