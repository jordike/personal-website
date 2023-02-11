<footer>
    <div id="footer-info" class="container">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col">
                <ul>
                    <li><a href="{{ route("home") }}">Home</a></li>
                    <li><a href="{{ route("projects.index") }}">Projecten</a></li>
                    <li><a href="{{ route("experience.index") }}">Ervaring</a></li>
                    <li><a href="{{ route("contact") }}">Contact</a></li>
                </ul>
            </div>
            <div class="col">
                <h4>Contact</h4>
                {{-- <p>Lookveld 66, Veghel | 5467 KD</p> --}}
                <p>
                    E-mail:
                    <a class="contact-info-link" href="mailto:{{ env("EMAIL_ADDRESS") }}">
                        {{ env("EMAIL_ADDRESS") }}
                    </a>
                </p>
                <p>
                    Telefoonummer:
                    <a class="contact-info-link" href="tel:{{ env("PHONE_NUMBER") }}">
                        {{ env("PHONE_NUMBER") }}
                    </a>
                </p>
            </div>
        </div>
    </div>
    <section id="copyright">
        <p>&copy; Jordi Keijzers 2022 - {{ now()->year }}</p>
    </section>
</footer>
