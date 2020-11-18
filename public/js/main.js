//------------------------------------------------------------
// Button to go on TOP of the Document
//------------------------------------------------------------
window.onscroll = function () {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("scrollTopBtn").style.display = "block";
    } else {
        document.getElementById("scrollTopBtn").style.display = "none";
    }
};
// When the user clicks on the button, scroll to the top of the document
function scrollTopBtn() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}


//------------------------------------------------------------
// Contact Form
//------------------------------------------------------------
function contactFormAction() {
    const contact_result = document.getElementById("contact_result");
    const contactFormData = new FormData(document.getElementById("contactForm"));
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "", true);
    xhr.onload = () => {
        if (xhr.status >= 200 && xhr.status < 400) {
            xhr.addEventListener("loadend", () => {
                if (xhr.responseText.trim() == "success") {
                    document.getElementById("success").innerHTML = `
                        <div class='col mt-3 h-100'>
                        <h3 class='text-success text-center py-3'>Thank you for contacting us!</h3>
                        <p class='text-muted text-center'>Thank you very much for your interest and we will contact you as soon as possible.</p>
                        </div>`;
                    setTimeout(function () {
                        window.location.reload();
                    }, 3000);
                } else {
                    const result = xhr.response.split("<br>").filter(Boolean);
                    scrollTopBtn();
                    for (res of result) {
                        contact_result.innerHTML += `
                        <div class="alert alert-danger" role="alert">${res}</div>`;
                    }
                }
            });
        } else {
            console.log("error: ", xhr.response);
        }
    };
    xhr.send(contactFormData);
}


//------------------------------------------------------------
// Change Language
//------------------------------------------------------------
function changeLanguage() {
    const langDropDown = document.querySelectorAll('[data-lang]');
    let dataAttr = null;

    langDropDown.forEach(element => {
        element.addEventListener('click', (e) => {
            e.preventDefault();

            dataAttr = e.target.getAttribute("data-lang");
            const xhr = new XMLHttpRequest();

            xhr.open("POST", "ajax/language", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);

                    window.location.reload();
                }
            };
            xhr.send("lang=" + dataAttr);
        });
    });
}
// Init
changeLanguage();

//------------------------------------------------------------
// Image Preview Modal
//------------------------------------------------------------
function imagePreviewModal() {
    // Get the modal
    var modal = document.getElementById("myModal");
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.querySelectorAll(".galleryImg");
    var modalImg = document.getElementById("modalImg");
    var captionText = document.getElementById("captionTxt");

    img.forEach(el => {
        el.addEventListener("click", (e) => {
            // if the image is sorounded with anchor tag
            e.preventDefault();

            modal.style.display = "block";
            modalImg.src = el.src;
            captionText.innerHTML = el.alt;
        });
    });

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("closeModal")[0];
    // When the user clicks on <span> (x), close the modal
    span.addEventListener("click", () => {
        modal.style.display = "none";
    });
    // Close with ESC click
    document.addEventListener("keydown", (event) => {
        event = event || window.event;
        if (event.keyCode === 27) {
            modal.style.display = "none";
        }
    });
}
// Init
imagePreviewModal();