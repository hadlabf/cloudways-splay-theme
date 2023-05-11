</div>
<footer class="<?php echo $args['footer_style']; ?>">
    <!-- Data needed:
    - Footer section
        - *Section title 
        - Description 
        - *Links (repeator)
            - Link URL (href/url)
            - Link label 
    - Address
        - *Street
        - *Postal code
        - *City
        - *Country
    -->
    <div class="content">
        <div class="row">

            <div class="col col-sm-8">
                <!-- TODO: 
                - Add data for 3 rows (Follow us, Create with us, Work with us)
                - Loop optional footer sections
                -->
                <div class="row mb-4">
                    <div class="col">
                        <!-- TODO: Required section title -->
                        <p class="font-weight-bold">Follow us</p>
                    </div>
                    <div class="col d-flex flex-column">
                        <!-- TODO: Required loop links of social media (fields: link, label)-->
                        <a target="_blank" href="https://se.linkedin.com/company/splay-one" class="cta_link">LinkedIn</a>
                        <a target="_blank" href="https://www.instagram.com/splayone/" class="cta_link">Instagram</a>
                        <a target="_blank" class="cta_link">TikTok</a>
                        <a target="_blank" class="cta_link">YouTube</a>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <p class="font-weight-bold">Create with us</p>
                    </div>
                    <div class="col d-flex flex-column">
                        <p class="mb-0">For new business enquiries contact</p>
                        <a target="_blank" class="cta_link">Samin Krijestarac</a>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col">
                        <p class="font-weight-bold">Work with us</p>
                    </div>
                    <div class="col d-flex flex-column">
                        <p class="mb-0">For career opportunities, visit</p>
                        <a target="_blank" class="cta_link">Career</a>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col"></div>
                    <div class="col">
                        <a target="_blank" class="cta_link mb-5">Privacy policy</a>
                        <p>We are appart of <a target="_blank" href="https://caybon.com/" class="cta_link">Caybon</a><p>
                    </div>
                </div>


            </div>
            
            <div class="col col-sm-4">
              
                <!-- TODO: Loop addresses -->
                <p class="mb-0">Birger Jarlsgatan 43</p>
                <p class="mb-0">11356 Stockholm</p>
                <p class="mb-3">Sweden</p>

                <p class="mb-0">Karl Johans Gate 41A 0162</p>
                <p class="mb-0">Oslo</p>
                <p class="mb-3">Norway</p>

                <p class="mb-0">Mannerheimintie 18A</p>
                <p class="mb-0">00101 Helsinki</p>
                <p class="mb-3">Finland</p>

                <p class="mb-0">Bispevej 29</p>
                <p class="mb-0">11356 Copenhagen</p>
                <p class="mb-0">Denmark</p>
            </div>

        </div>
    </div>
</footer>
<!-- Bootstrap scripts -->
<?php
    wp_footer('splay_register_scripts')
?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>