</main>
<footer>
    <p>&copy; <?= date('Y') ?> Albaxe Blog - Tous droits réservés.</p>
    <ul class="footer-links">
        <li><a href="/albaxe_blog/public/about">À propos</a></li>
        <li><a href="/albaxe_blog/public/contact">Contact</a></li>
        <li><a href="/albaxe_blog/public/privacy">Politique de confidentialité</a></li>
    </ul>
</footer>
<script src="/albaxe_blog/public/js/app.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuToggle = document.getElementById('menu-toggle');
        const dropdown = document.querySelector('.menu-left .dropdown');

        if (menuToggle && dropdown) {
            menuToggle.addEventListener('click', () => {
                dropdown.classList.toggle('show');
            });

            document.addEventListener('click', (e) => {
                if (!dropdown.contains(e.target) && e.target !== menuToggle) {
                    dropdown.classList.remove('show');
                }
            });
        }
    });
</script>
</body>
</html>
