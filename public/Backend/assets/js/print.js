function printReport(format=null) {
    var cardElement = document.querySelector("#printSection");
    var printContents = cardElement.outerHTML;

    var tempDiv = document.createElement("div");
    tempDiv.innerHTML = printContents;

    var printCardElement = tempDiv.querySelector(".card.shadow-sm");
    if (printCardElement) {
        printCardElement.className = "";
    }

    var newWindow = window.open("", "", "height=600,width=800");
    newWindow.document.write("<html><head><title>Print</title>");
    newWindow.document.write(
        '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">'
    );
    if(format){
        newWindow.document.write(
            "<style>.custom-list li{display:flex;gap:2px;padding-bottom:1rem}.detail{width:70%;height:100%;margin:0 auto;display:flex;justify-content:space-between;align-items:center;text-align:left;padding:0!important}.detail-box{width:80px;height:80px;display:flex;flex-direction:column;align-items:center;justify-content:center;border:1px solid black;box-sizing:border-box}.rotated{width:100vh;height:100%;overflow:hidden;margin-left:1rem;transform:rotate(-90deg);margin-bottom:20px;text-align:justify}@media print{.rotated{width:100%;height:80vh;margin-left:3rem}}</style>"  );
    }
    newWindow.document.write("</head><body >");
    newWindow.document.write(tempDiv.innerHTML);
    newWindow.document.write("</body></html>");
    newWindow.document.close();

    setTimeout(function () {
        newWindow.print();
    }, 500);
}

function printActiveTab() {
    var activeTab = document.querySelector('.tab-pane.active'); // Get the active tab content
    if (activeTab) {
        var tempDiv = document.createElement("div");
        tempDiv.innerHTML = activeTab.outerHTML; // Get the HTML of the active tab

        var newWindow = window.open("", "", "height=800,width=1100");
        newWindow.document.write("<html><head><title>Print Active Tab</title>");
        newWindow.document.write(
            '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">'
        );
        newWindow.document.write(`
            <style>
                .no-print { display: none !important; }
                
                @media print {
                    .col-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xl-1, .col-xxl-1,
                    .col-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xl-2, .col-xxl-2,
                    .col-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xl-3, .col-xxl-3,
                    .col-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xl-4, .col-xxl-4,
                    .col-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xl-5, .col-xxl-5,
                    .col-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xl-6, .col-xxl-6,
                    .col-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xl-7, .col-xxl-7,
                    .col-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xl-8, .col-xxl-8,
                    .col-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xl-9, .col-xxl-9,
                    .col-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xl-10, .col-xxl-10,
                    .col-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xl-11, .col-xxl-11,
                    .col-12, .col-sm-12, .col-md-12, .col-lg-12, .col-xl-12, .col-xxl-12 {
                        flex: none;
                        width: auto;
                    }
                    
                    .row {
                        display: flex !important;
                        flex-wrap: nowrap !important;
                        width: 100% !important;
                        margin: 0 !important;
                        align-items: flex-start !important;
                    }
                    
                    .g-1, .g-2, .g-3, .g-4, .g-5,
                    .gx-1, .gx-2, .gx-3, .gx-4, .gx-5,
                    .gy-1, .gy-2, .gy-3, .gy-4, .gy-5 {
                        --bs-gutter-x: 0.5rem !important;
                        --bs-gutter-y: 0.5rem !important;
                    }
                    
                    .col-lg-3, .col-md-3 {
                        width: 140px !important;
                        min-width: 140px !important;
                        max-width: 140px !important;
                        flex: 0 0 140px !important;
                        flex-shrink: 0 !important;
                    }
                    .col-lg-9, .col-md-9 {
                        width: calc(100% - 140px) !important;
                        flex: 1 1 auto !important;
                        padding-left: 15px !important;
                    }
                    
                    .col-lg-9 .row, .col-md-9 .row {
                        flex-wrap: wrap !important;
                    }
                    .col-md-6 {
                        width: 50% !important;
                        flex: 0 0 50% !important;
                    }
                    .col-12, .col-sm-12, .col-md-12, .col-lg-12 {
                        width: 100% !important;
                        flex: 0 0 100% !important;
                    }
                    
                    .col-lg-3 img, .col-md-3 img {
                        height: 150px !important;
                        width: 150px !important;
                        max-width: 150px !important;
                        max-height: 150px !important;
                        object-fit: cover !important;
                        display: block !important;
                        border: 1px solid #dee2e6 !important;
                    }
                    
                    .img-fluid {
                        max-width: none !important;
                        height: auto !important;
                    }
                    
                    .col-lg-3, .col-md-3 {
                        overflow: hidden !important;
                        text-align: center !important;
                    }
                    
                    .container, .container-fluid {
                        width: 100% !important;
                        max-width: none !important;
                        padding: 0 !important;
                        margin: 0 !important;
                    }
                    
                    .row {
                        page-break-inside: avoid;
                    }
                    
                    .card, .card-body, .card-header, .card-footer {
                        page-break-inside: avoid !important;
                        break-inside: avoid !important;
                    }
                    
                    .card {
                        page-break-before: auto !important;
                        break-before: auto !important;
                    }
                    
                    .form-group, .mb-3, .mb-4, .mb-5,
                    .mt-3, .mt-4, .mt-5, .p-3, .p-4, .p-5 {
                        page-break-inside: avoid !important;
                        break-inside: avoid !important;
                    }
                    
                    table {
                        page-break-inside: auto !important;
                        break-inside: auto !important;
                    }
                    
                    tr {
                        page-break-inside: avoid !important;
                        break-inside: avoid !important;
                    }
                    
                    h1, h2, h3, h4, h5, h6 {
                        page-break-after: avoid !important;
                        break-after: avoid !important;
                        page-break-inside: avoid !important;
                        break-inside: avoid !important;
                    }
                    
                    
                    .page-break-before {
                        page-break-before: always !important;
                        break-before: page !important;
                    }
                    
                    
                    .table-responsive {
                        overflow: visible !important;
                    }
                    
                    .d-print-none,
                    .btn,
                    .navbar,
                    .sidebar,
                    .no-print {
                        display: none !important;
                    }
                    
                    .d-print-block {
                        display: block !important;
                    }
                    
                    
                    @page {
                        margin: 0.5in;
                        size: A4;
                    }
                    
                    .card img, .row img {
                        page-break-inside: avoid !important;
                        break-inside: avoid !important;
                    }
                    
                    * {
                        box-shadow: none !important;
                        text-shadow: none !important;
                    }
                    
                    table, th, td {
                        border: 1px solid black !important;
                    }
                }
            </style>
        `);
        newWindow.document.write("</head><body>");
        newWindow.document.write(tempDiv.innerHTML);
        newWindow.document.write("</body></html>");
        newWindow.document.close();

        // Wait a bit longer for styles to load
        setTimeout(function () {
            newWindow.print();
        }, 1000);
    } else {
        alert("No active tab to print.");
    }
}