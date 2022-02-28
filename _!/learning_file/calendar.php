<html>

<head>
    <title>My Evo Calendar</title>
    // evo-calendar.css, followed by [theme-name].css (optional)
    <link rel="stylesheet" type="text/css" href="./css/evo-calendar.css" />
    <link rel="stylesheet" type="text/css" href="./css/evo-calendar.midnight-blue.css" />
    <!-- Add the evo-calendar.css for styling -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.2/evo-calendar/css/evo-calendar.min.css" />

</head>

<body>

    // this is where your calendar goes.. :)
    <div id="calendar"></div>

    // evo-calendar.js, right after jQuery (required)
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./js/evo-calendar.js"></script>
    <!-- Add jQuery library (required) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>

    <!-- Add the evo-calendar.js for.. obviously, functionality! -->
    <script src="https://cdn.jsdelivr.net/npm/evo-calendar@1.1.2/evo-calendar/js/evo-calendar.min.js"></script>

    <script>
        // initialize your calendar, once the page's DOM is ready
        $(document).ready(function() {
            $('#calendar').evoCalendar({
                theme: 'Midnight Blue'
            })
            $('#calendar').evoCalendar('selectDate', 'February 15, 2020');
            $('#calendar').evoCalendar({
                settingName: settingValue
            })
        })
    </script>

</body>

</html>