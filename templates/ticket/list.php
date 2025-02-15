<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List tickets</title>
    <link rel="stylesheet" href="/assets/css/output.css">
</head>
<body class="bg-slate-900">
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto" bis_skin_checked="1">
        <div class="flex flex-col text-center w-full mb-20" bis_skin_checked="1">
            <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1">All the tickets</h2>
            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-100">OPHPen Jira</h1>
        </div>
        <div class="flex justify-between">
            <div class="w-1/3">
                <h2 class="font-semibold text-gray-300">Add a new ticket</h2>
                <form method="post" action="/tickets" class="flex flex-col justify-center items-start">
                    <label class="block mb-1 text-sm font-medium text-gray-100" for="title">Title</label>
                    <input type="text" name="title" placeholder="Ticket Title" id="title" maxlength="500"
                           class="border border-gray-300 rounded w-full p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-200"/>
                    <label class="block mb-1 text-sm font-medium text-gray-100" for="description">Description</label>
                    <textarea
                            class="border border-gray-300 rounded w-full p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-200"
                            name="description" rows="3" maxlength="6000" placeholder="Put the description"></textarea>
                    <div class="flex-justify-between items-center">
                        <button type="reset"
                                class="bg-gray-200 text-gray-700 font-semibold py-2 px-4 mr-2 rounded hover:bg-gray-300">
                            Reset
                        </button>
                        <button type="submit"
                                class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">Send
                        </button>
                    </div>
                </form>
            </div>
            <div class="flex flex-wrap w-full p-3" bis_skin_checked="1">
                <?php
                foreach ($tickets as $ticket) {
                    ?>
                    <div class="p-4 md:w-1/4" bis_skin_checked="1">
                        <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col" bis_skin_checked="1">
                            <div class="flex items-center mb-3" bis_skin_checked="1">
                                <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0"
                                     bis_skin_checked="1">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                         stroke-linejoin="round"
                                         stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24"
                                         data-darkreader-inline-stroke=""
                                         style="--darkreader-inline-stroke: currentColor;">
                                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                    </svg>
                                </div>
                                <h2 class="text-gray-900 text-lg title-font font-medium">
                                    <?php echo $ticket->title ?>
                                </h2>
                            </div>
                            <div class="flex-grow" bis_skin_checked="1">
                                <p class="leading-relaxed text-base">
                                    <?php echo $ticket->description ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

</body>
</html>
