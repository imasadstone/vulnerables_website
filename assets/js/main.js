document.addEventListener('DOMContentLoaded', function () {
    const dropdown = document.querySelector('.dropdown');
    const dropdownBtn = dropdown.querySelector('.dropdown-btn');
    dropdownBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        dropdown.classList.toggle('show');
        const expanded = dropdown.classList.contains('show');
        dropdownBtn.setAttribute('aria-expanded', expanded ? 'true' : 'false');
    });
    document.body.addEventListener('click', function (e) {
        dropdown.classList.remove('show');
        dropdownBtn.setAttribute('aria-expanded', 'false');
    });
    dropdown.querySelector('.dropdown-content').addEventListener('click', function(e){
        e.stopPropagation();
    });
});
document.addEventListener('DOMContentLoaded', function() {
    var userIcon = document.querySelector('.user-icon');
    if (userIcon) {
        userIcon.addEventListener('click', function() {
            window.location.href = 'sign_in.php';
        });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    var btn = document.getElementById('userDropdownBtn');
    var menu = document.getElementById('userDropdownMenu');
    btn.onclick = function(e) {
        e.stopPropagation();
        menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    };
    document.addEventListener('click', function() {
        menu.style.display = 'none';
    });
    menu.onclick = function(e) { e.stopPropagation(); };
});