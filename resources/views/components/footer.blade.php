<footer>
    <div id="footer-info" class="container-fluid container-lg">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col d-flex justify-content-center mb-3 mb-lg-0">
                <section class="footer-section">
                    <h4>{{ __("components/footer.links.label") }}</h4>
                    <hr />
                    <a class="footer-link" href="{{ route("home", [], false) }}">
                        {{ __("components/footer.links.home") }}
                    </a>
                    <a class="footer-link" href="{{ route("projects.index", [], false) }}">
                        {{ __("components/footer.links.projects") }}
                    </a>
                    <a class="footer-link" href="{{ route("experience.index", [], false) }}">
                        {{ __("components/footer.links.experience") }}
                    </a>
                    <a class="footer-link" href="{{ route("contact", [], false) }}">
                        {{ __("components/footer.links.contact") }}
                    </a>
                </section>
            </div>
            <div class="col d-flex justify-content-center">
                <section class="footer-section">
                    <section class="mb-4">
                        <h4>{{ __("components/footer.contact.label") }}</h4>
                        <hr />
                        <p>
                            {{ __("components/footer.contact.email") }}:
                            <a class="contact-info-link" href="mailto:{{ env("EMAIL_ADDRESS") }}">
                                {{ env("EMAIL_ADDRESS") }}
                            </a>
                        </p>
                        {{-- <p>
                            {{ __("components/footer.contact.phone-number") }}:
                            <a class="contact-info-link" href="tel:{{ env("PHONE_NUMBER") }}">
                                {{ env("PHONE_NUMBER") }}
                            </a>
                        </p> --}}
                    </section>
                    <section class="row">
                        <div class="col d-flex justify-content-center">
                            <a href="https://www.linkedin.com/in/jordi-keijzers" target="_Blank" alt="LinkedIn">
                                <i class="footer-social-media fa-brands fa-linkedin"></i>
                            </a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="https://github.com/jordike" target="_Blank" alt="GitHub">
                                <i class="footer-social-media fa-brands fa-github"></i>
                            </a>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </div>
    <div id="copyright">
        &copy; Jordi Keijzers 2022 - {{ now()->year }}
    </div>
</footer>
