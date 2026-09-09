
document.querySelectorAll(".status-btn").forEach(button => {

    button.addEventListener("click", async function () {

        let id = this.dataset.id;

        let response = await fetch(`/admin/category/status/${id}`, {
            method: "PATCH",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                "Accept": "application/json"
            }
        });

        let data = await response.json();

        if (data.status == 1) {
            this.innerHTML = "Active";
            this.classList.remove("btn-danger");
            this.classList.add("btn-success");
        } else {
            this.innerHTML = "Inactive";
            this.classList.remove("btn-success");
            this.classList.add("btn-danger");
        }

    });

});
