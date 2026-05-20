<?php include_once __DIR__ . '/../components/header.php'; ?>
<?php include_once __DIR__ . '/../components/sidebar.php'; ?>

<link rel="stylesheet" href="/css/search.css">

<main class="content search-page-bg">
    <div class="search-page-container">
        
        <div class="search-center-box">
            <input type="text" id="mainSearchInput" placeholder="Search..." autocomplete="off">
            <img src="/assets/images/search-abu.png" class="search-inside-icon" alt="Search Icon">
        </div>

        <div class="suggestions">
            <span onclick="fillSearch('Biola dasar')">Biola dasar</span>
            <span onclick="fillSearch('Matematika untuk kelas 10')">Matematika untuk kelas 10</span>
        </div>

        <img src="/assets/images/question.png" alt="search" class="search-illustration">
        
    </div>
</main>

<?php include_once __DIR__ . '/../components/footer.php'; ?>

<script>
function fillSearch(keyword) {
    const searchInput = document.getElementById('mainSearchInput');
    if(searchInput) {
        searchInput.value = keyword;
        searchInput.focus();
    }
}
</script>