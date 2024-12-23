// Manipulasi DOM: Tambahkan placeholder dinamis ke form
document.addEventListener("DOMContentLoaded", function () {
    const nameInput = document.getElementById("name");
    const messageInput = document.getElementById("message");
    const form = document.getElementById("guestForm");
    const button = form.querySelector("button");

    // Helper function: Validasi input
    function validateInput(input, errorMessage) {
        if (input.value.trim() === "") {
            alert(errorMessage);
            input.focus();
            return false;
        }
        return true;
    }

    // Event 1: Validasi form hanya saat submit
    form.addEventListener("submit", function (e) {
        // Validasi nama
        if (!validateInput(nameInput, "Nama tidak boleh kosong!")) {
            e.preventDefault(); // Batalkan submit
            return;
        }

        // Validasi pesan
        if (!validateInput(messageInput, "Pesan tidak boleh kosong!")) {
            e.preventDefault(); // Batalkan submit
            return;
        }

        // Konfirmasi pengiriman
        const confirmSubmit = confirm("Apakah Anda yakin ingin mengirim data ini?");
        if (!confirmSubmit) {
            e.preventDefault(); // Batalkan submit
        }
    });

    // Event 2: Manipulasi tambahan - Tambahkan efek hover pada tombol
    button.addEventListener("mouseover", function () {
        button.style.backgroundColor = "#4CAF50"; // Warna hijau saat hover
        button.style.color = "white";
    });

    button.addEventListener("mouseout", function () {
        button.style.backgroundColor = ""; // Kembalikan warna default
        button.style.color = "";
    });
});
