document.addEventListener("DOMContentLoaded", function () {
    // Define the Arabic to Nepali number mapping
    const arabicNumbers = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
    const nepaliNumbers = ["०", "१", "२", "३", "४", "५", "६", "७", "८", "९"];

    // Function to convert numbers to Nepali digits
    function convertToNepaliNumbers() {
        // Select only elements with the class 'npNum'
        const elements = document.querySelectorAll(".npNum");

        elements.forEach((element) => {
            if (element.childNodes.length) {
                element.childNodes.forEach((node) => {
                    if (node.nodeType === Node.TEXT_NODE) {
                        let text = node.nodeValue;
                        // Replace Arabic numbers with Nepali numbers
                        text = text.replace(
                            /\d+/g, // Match one or more digits
                            (match) => match.split('').map(digit => nepaliNumbers[parseInt(digit)]).join('') // Convert each digit to Nepali
                        );
                        node.nodeValue = text;
                    }
                });
            }
        });
    }

    // Run the conversion after 1 second
    setTimeout(convertToNepaliNumbers, 1000);
});
