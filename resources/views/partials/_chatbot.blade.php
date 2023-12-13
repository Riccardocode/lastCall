
<link rel="stylesheet" type="text/css" href="{{ asset('css/Domain/chatbot.css') }}">
<script>
    
    var botmanWidget = {
        aboutText: 'Start the conversation with Hi',
        introMessage: "How can I help you today?",
        title: "David Bot",
        mainColor: "#F97316",
        bubbleBackground: "#fff",
        bubbleAvatarUrl: '/storage/chatbotImages/RobotBot3.png'
    };
    // botmanWidget.open();
    // console.log(botmanWidget);
    // botmanChatWidget.open();
    // window.botmanWidget.open();
</script>
<script src="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js"></script>
<script defer>
        // Get the iframe element
        
        // Access the contentDocument of the iframe
        // var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;

        // // Change the background color of the body inside the iframe
        // if (iframeDocument) {
        //     var body = iframeDocument.body;
        //     if (body) {
        //         body.style.backgroundColor = "#ffcc00"; // Set your desired background color
        //     }
        // }

        window.addEventListener('load', function () {
        // Your code to be executed after the page has fully loaded
        let iframe = document.querySelector("#chatBotManFrame");
        console.log(iframe);
        console.log('Page has fully loaded!');
    });
</script>