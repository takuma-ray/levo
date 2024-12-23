document.addEventListener("DOMContentLoaded", function () {
    const hamburgerButton = document.getElementById("hamburger-button");
    const menuModal = document.getElementById("menu-modal");

    // ボタンクリックでモーダルを表示・非表示
    hamburgerButton.addEventListener("click", function () {
        menuModal.classList.toggle("active"); // モーダルの表示を切り替え
        hamburgerButton.classList.toggle("close"); // ボタンのデザインを切り替え
    });

    // モーダル背景クリックで閉じる
    menuModal.addEventListener("click", function (e) {
        if (e.target === menuModal) {
            menuModal.classList.remove("active");
            hamburgerButton.classList.remove("close");
        }
    });
});



document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("social-modal");
    const closeModal = document.getElementById("close-modal");

    // 非アクティブSNSのリンク
    const inactiveLinks = document.querySelectorAll(".inactive-social");

    // 非アクティブリンクのクリックでモーダルを表示
    inactiveLinks.forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault(); // リンクの通常動作を無効化
            modal.style.display = "flex"; // モーダルを表示
        });
    });

    // モーダルの閉じるボタンの動作
    closeModal.addEventListener("click", function () {
        modal.style.display = "none"; // モーダルを非表示
    });

    // モーダル背景をクリックで閉じる
    modal.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});
