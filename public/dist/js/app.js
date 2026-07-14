document.addEventListener("DOMContentLoaded", function () {
    // Initialize review data if we're on the review tab
    if (document.querySelector("#review.active")) {
        updateReviewData();
    }

    // Handle tab change events
    document
        .querySelectorAll('button[data-bs-toggle="tab"]')
        .forEach(function (tab) {
            tab.addEventListener("shown.bs.tab", function (event) {
                // If the review tab is shown, update the review data
                if (event.target.id === "review-tab") {
                    updateReviewData();
                }
            });
        });

    // Handle next button clicks
    document.querySelectorAll(".next-tab").forEach((button) => {
        button.addEventListener("click", function () {
            const nextTabId = this.getAttribute("data-next");

            // Validate current tab
            const currentTab = this.closest(".tab-pane");
            const inputs = currentTab.querySelectorAll(
                "input[required], select[required], textarea[required]"
            );
            let isValid = true;

            inputs.forEach((input) => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add("is-invalid");

                    // Add custom validation message if none exists
                    let nextSibling = input.nextElementSibling;
                    if (
                        !nextSibling ||
                        !nextSibling.classList.contains("invalid-feedback")
                    ) {
                        const feedback = document.createElement("div");
                        feedback.className = "invalid-feedback";
                        feedback.textContent = "This field is required.";
                        input.parentNode.insertBefore(
                            feedback,
                            input.nextSibling
                        );
                    }
                } else {
                    input.classList.remove("is-invalid");

                    // Remove custom validation message if it exists
                    let nextSibling = input.nextElementSibling;
                    if (
                        nextSibling &&
                        nextSibling.classList.contains("invalid-feedback") &&
                        !nextSibling.hasAttribute("data-server-error")
                    ) {
                        nextSibling.remove();
                    }
                }
            });

            if (isValid) {
                // If validation passes, go to next tab
                const nextTab = document.getElementById(nextTabId);
                const tab = new bootstrap.Tab(nextTab);
                tab.show();
            }
        });
    });

    // Handle previous button clicks
    document.querySelectorAll(".prev-tab").forEach((button) => {
        button.addEventListener("click", function () {
            const prevTabId = this.getAttribute("data-prev");
            const prevTab = document.getElementById(prevTabId);
            const tab = new bootstrap.Tab(prevTab);
            tab.show();
        });
    });

    // Handle form inputs to remove validation styling when corrected
    document.querySelectorAll("input, select, textarea").forEach((input) => {
        input.addEventListener("input", function () {
            if (this.hasAttribute("required") && this.value.trim()) {
                this.classList.remove("is-invalid");

                // Remove custom validation message if it exists
                let nextSibling = this.nextElementSibling;
                if (
                    nextSibling &&
                    nextSibling.classList.contains("invalid-feedback") &&
                    !nextSibling.hasAttribute("data-server-error")
                ) {
                    nextSibling.remove();
                }
            }
        });
    });

    // Function to update review tab data
    function updateReviewData() {
        // Personal details
        const reviewPersonal = document.getElementById("review-personal");
        reviewPersonal.innerHTML =
            createReviewRow(
                "पूरा नाम (नेपाली):",
                document.getElementById("fullname_np").value
            ) +
            createReviewRow(
                "पूरा नाम (अंग्रेजी): ",
                document.getElementById("fullname_eng").value
            ) +
            createReviewRow(
                "हजुरबुबाको नाम: ",
                document.getElementById("grandfather_name").value
            ) +
            createReviewRow(
                "बाबुको नाम: ",
                document.getElementById("father_name").value
            ) +
            createReviewRow(
                "आमाको नाम: ",
                document.getElementById("mother_name").value
            ) +
            createReviewRow(
                "जन्म मिति (बि.सं.): ",
                document.getElementById("dob_bs").value
            ) +
            createReviewRow(
                "जन्म मिति (ई.सं.): ",
                document.getElementById("dob_ad").value
            ) +
            createReviewRow(
                "लिङ्ग: ",
                document.getElementById("gender").options[
                    document.getElementById("gender").selectedIndex
                ]?.text || ""
            ) +
            createReviewRow(
                "नागरिकता नं: ",
                document.getElementById("citizenship_no").value
            ) +
            createReviewRow(
                "नागरिकता जारी जिल्ला: ",
                document.getElementById("citizenship_district_id").options[
                    document.getElementById("citizenship_district_id")
                        .selectedIndex
                ]?.text || ""
            );
       


        // Contact information
        const reviewSthyayiThegana = document.getElementById(
            "review-sthyayi-thegana"
        );
        reviewSthyayiThegana.innerHTML =
            createReviewRow(
                "प्रदेश: ",
                document.getElementById("sthyayiProvince").options[
                    document.getElementById("sthyayiProvince").selectedIndex
                ]?.text || ""
            ) +
            createReviewRow(
                "जिल्ला: ",
                document.getElementById("sthyayiDistrict").options[
                    document.getElementById("sthyayiDistrict").selectedIndex
                ]?.text || ""
            ) +
            createReviewRow(
                "स्थानिय तह: ",
                document.getElementById("sthyayiArea").options[
                    document.getElementById("sthyayiArea").selectedIndex
                ]?.text || ""
            ) +
            createReviewRow(
                "वडा नम्बर: ",
                document.getElementById("sthyayiWard").options[
                    document.getElementById("sthyayiWard").selectedIndex
                ]?.text || ""
            ) +
            createReviewRow(
                "गाउँ/टोल: ",
                document.getElementById("sthyayiTole").value
            );

        const reviewAsthyayiThegana = document.getElementById(
            "review-asthyayi-thegana"
        );
        reviewAsthyayiThegana.innerHTML =
            createReviewRow(
                "प्रदेश: ",
                document.getElementById("asthyayiProvince").options[
                    document.getElementById("asthyayiProvince").selectedIndex
                ]?.text || ""
            ) +
            createReviewRow(
                "जिल्ला: ",
                document.getElementById("asthyayiDistrict").options[
                    document.getElementById("asthyayiDistrict").selectedIndex
                ]?.text || ""
            ) +
            createReviewRow(
                "स्थानिय तह: ",
                document.getElementById("asthyayiArea").options[
                    document.getElementById("asthyayiArea").selectedIndex
                ]?.text || ""
            ) +
            createReviewRow(
                "वडा नम्बर: ",
                document.getElementById("asthyayiWard").options[
                    document.getElementById("asthyayiWard").selectedIndex
                ]?.text || ""
            ) +
            createReviewRow(
                "गाउँ/टोल: ",
                document.getElementById("asthyayiTole").value
            );
        const addFileInput1 = document.getElementById("migration_certificate");
        const addfile1 = addFileInput1?.files[0];

        if (addfile1 && addfile1.type.startsWith("image/")) {
            const blobURL = URL.createObjectURL(addfile1);
            const imgTag = `
    <a href="${blobURL}" target="_blank" class="btn btn-sm btn-primary">
    <i class="fa fa-eye me-2"></i> पूर्वावलोकन गर्नुहोस् </a>`;
            reviewAsthyayiThegana.innerHTML += createReviewRow(
                "बसाइँ सराइ प्रमाणपत्र",
                imgTag
            );
        } else {
            reviewAsthyayiThegana.innerHTML += createReviewRow(
                "बसाइँ सराइ प्रमाणपत्र",
                "—"
            );
        }

        const reviewContact = document.getElementById("review-contact");
        reviewContact.innerHTML =
            createReviewRow("इमेल: ", document.getElementById("email").value) +
            createReviewRow(
                "सम्पर्क नं: ",
                document.getElementById("contact_no").value
            ) +
            createReviewRow(
                "मोबाइल नं: ",
                document.getElementById("mobile_no").value
            );

       

        // Helper function to create review rows
        function createReviewRow(label, value) {
            return `<div class="col-md-4 col-sm-12 review-item">
                <span class="review-label">${label}:</span>
                <span class="review-value">${value || "—"}</span>
            </div>`;
        }

        // Mark server-side validation errors
        document
            .querySelectorAll(".invalid-feedback")
            .forEach(function (element) {
                element.setAttribute("data-server-error", "true");
            });
    }
});
