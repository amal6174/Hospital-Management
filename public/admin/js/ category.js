document.addEventListener("DOMContentLoaded", () => {

    const buttons = document.querySelectorAll(".status-btn");

    buttons.forEach(button => {

        button.addEventListener("click", async function () {

            const id = this.dataset.id;

            try {

                const response = await fetch(`/admin/category/status/${id}`, {

                    method: "PATCH",

                    headers: {
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),

                        "Accept": "application/json"
                    }

                });

                const result = await response.json();

                if (result.success) {

                    if (result.status == 1) {

                        this.classList.remove("btn-danger");
                        this.classList.add("btn-success");

                        this.innerHTML = "Active";

                    } else {

                        this.classList.remove("btn-success");
                        this.classList.add("btn-danger");

                        this.innerHTML = "Inactive";
                    }

                }

            } catch (error) {

                console.log(error);

                alert("Something went wrong");

            }

        });

    });

});
